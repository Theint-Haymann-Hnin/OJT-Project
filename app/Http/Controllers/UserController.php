<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Contract\Service\User\UserServiceInterface;
use File;

class UserController extends Controller
{
    /** $userService*/
    private $userService;

    /**
     * construct
     * @param UserServiceInterface $user_service_interface
     */
    public function __construct(UserServiceInterface $user_service_interface)
    {
       
        $this->middleware('isadmin')->only('index');
        $this->userService = $user_service_interface;
    }

    /**
     * Display user list
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->index();
        return view('user.index', compact('users'));
    }

    /**
     * Show the user create form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Show the user create confirm form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateUser('required', null);
        $image = $request->profile;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/profile-images', $imageName);
        $data['profile'] = $imageName;
        $request->session()->put('user', $data);
        return redirect('/users/create/collectdataform');
    }

    /**
     * Show the user create confirm form
     *
     * @return \Illuminate\Http\Response
     */
    public function collectDataForm(Request $request)
    {

        return view('user.create-user-confirm');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCollectData(Request $request)
    {
        $this->userService->storeCollectData($request->all());
        return redirect('/users')->with('successAlert', 'You have successfully created');
    }

    /**
     * Show the form for editing the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->findUserById($id);
        return view('user.update', compact('user'));
    }

    /**
     * Show the user update  form
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user_update_data = $this->validateUser('nullable', $id);
        $user_update_data['id'] = $id;
        if ($request->profile) {
            $old_image = $user->profile;
            File::delete('storage/profile-images/' . $old_image);
            $image = $request->profile;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/profile-images', $imageName);
            $user_update_data['profile'] = $imageName;
        } else {
            $user_update_data['profile'] = $user->profile;
        }
        $request->session()->put('user', $user_update_data);
        return redirect('users/update/updatecollectdataform');
    }

    /**
     * Show the user update confirm form
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCollectDataForm()
    {
        return view('user.update-user-confirm');
    }

    /**
     * Update the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  updateUser(Request $request, $id)
    {

        $this->userService->updateUser($request->all(), $id);
        return redirect('/users')->with('successAlert', 'You have successfully updated');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect('/users')->with('successAlert', 'You have successfully deleted');
    }

    /**
     * show user detail 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userProfile($id)
    {
        $user = User::find($id);
        return view('user.userprofile', compact('user'));
    }

    /**
     * searching user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $posts
     */
    public function search(Request $request)
    {
        $users = $this->userService->search($request->name, $request->email, $request->start_date, $request->end_date);

        return view('user.index', compact('users'));
    }

    /**
     * @param $rule
     * @param $id
     * 
     */
    private function validateUser($rule, $id)
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $id,
            'password' => $rule . '|min:8|regex:/^(?:(?=.*\d)(?=.*[A-Z]).*)$/',
            'password_confirmation' => $rule . '|same:password',
            'type' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',
            'dob' => 'nullable',
            'profile' => $rule,
        ]);
       
    }
}
