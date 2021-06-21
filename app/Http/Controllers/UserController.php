<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Contract\Service\User\UserServiceInterface;
use File;

class UserController extends Controller
{
    public $userService;
    public function __construct(UserServiceInterface $user_service_interface){
        $this->userService = $user_service_interface;
    }
    
    public function index()
    {
        $users= $this->userService ->index();
        return view('user.index', compact('users'));
    }
    public function create()
    {   
       
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateUser();
        $image =$request->profile;
        $imageName=uniqid().'_'.$image->getClientOriginalName();
        $image->storeAs('public/profile-images',$imageName);
        $data['profile'] = $imageName;
        $request->session()->put('user', $data);
        return redirect('/users/create/collectdataform');
    }
    public function collectDataForm(Request $request)
    {    
        
        return view('user.create-user-confirm');
    }
    public function storeCollectData(Request $request)
    {
        
        $this->userService->storeCollectData( $request->all() );
        return redirect('/users')->with('successAlert','You have successfully created');;
    } 
    
    public function show($id)
    {
        // return view('user.update');
    }
    
    
    public function edit($id)
    {
        $user =User::find($id);
        return view('user.update', compact('user'));
    }
    public function update(Request $request, $id)
    { 
            $post_update_data = $this->validateUpdateUser();
            $post_update_data['id'] = $id;
            $request->session()->put('post', $post_update_data);
            if($request->profile){
            $old_image = $user->profile;
            File::delete('storage/profile-images/'.$old_image);
            $image =$request->profile;
            $imageName=uniqid().'_'.$image->getClientOriginalName();
            $image->storeAs('public/profile-images',$imageName);
            $user_update_data['profile']= $imageName;
            } else {
                    $user_update_data['profile']= $user->profile;
                }
                return redirect('users/update/updatecollectdataform');
    }
        public function updateCollectDataForm( )
        {
            return view('user.update-user-confirm');
        }
    public function  updateConfirm(Request $request, $id)
    {   
        
    }



    // right update function


    // public function update(Request $request, $id)
    // {     
    //     $user_update_data = $this->validateUpdateUser();

    //      $user = User::find($id);
    //      if($request->profile){
    //         $old_image = $user->profile;
    //        File::delete('storage/profile-images/'.$old_image);
    //         $image =$request->profile;
    //         $imageName=uniqid().'_'.$image->getClientOriginalName();
    //         $image->storeAs('public/profile-images',$imageName);
    //         $user_update_data['profile']= $imageName;
    //     } else {
    //         $user_update_data['profile']= $user->profile;
    //     }
    //     $this->userService->update($user_update_data, $id);
    //     return redirect('/users')->with('successAlert','You have successfully updated');
    // }

       // right update function
    
    
    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect('/users')->with('successAlert','You have successfully deleted');
    }
    public function changePassword()
    {
        return view('user.change-password');
    }
    public function createUserConfirmation()
    {
        return view('user.create-user-confirm');
    }
    public function userProfile($id)
    {   
         $user = User::find($id);
        return view('user.userprofile', compact('user'));
    }
    public function updateUserConfirmation()
    {
        return view('user.update-user-confirm');
    }

    public function search(Request $request)
    {   
       
        // $this->postService->search();
        $searchData = request()->search_data;
        $users = User::where('name','like',"%".$searchData."%")->orWhere('email','like',"%".$searchData."%")
        ->paginate(5);
        return view('user.index', compact('users'));
    }
    
    private function validateUser()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'profile' => 'required',
            ]);
        }
        private function validateUpdateUser()
        {
            return request()->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'dob' => 'required',
                'profile' => 'nullable',
                ]);
            }
    }
    