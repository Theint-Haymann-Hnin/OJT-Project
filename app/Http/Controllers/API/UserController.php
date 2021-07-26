<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contract\Service\User\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use File;

class UserController extends Controller
{
    /** $userService */
    private $userService;

    /**
     * construct
     * @param UserServiceInterface $user_service_interface
     */
    public function __construct(UserServiceInterface $user_service_interface)
    {
        $this->userService = $user_service_interface;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getUserList();
        $name = "";
        $email = "";
        $start_date = "";
        $end_date = "";
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->profile;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/profile-images', $imageName);
        $data['profile'] = $imageName;
        $this->userService->storeCollectData($data);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        Log::info($user);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        if ($user->profile != $request->profile) {
            $old_image = $user->profile;
            File::delete('storage/profile-images/' . $old_image);
            $image = $request->profile;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/profile-images', $imageName);
            $data['profile'] = $imageName;
        }
        $this->userService->updateUser($data, $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->delete($id);
        return response()->json($id);
    }

    /**
     * searching user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        Log::info($request);
        $name = $request->name;
        $email = $request->email;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $users = $this->userService->search($name, $email, $start_date, $end_date);
        Log::info(response()->json($users));
        return response()->json($users);
    }
}
