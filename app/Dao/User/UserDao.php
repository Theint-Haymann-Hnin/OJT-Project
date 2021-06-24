<?php
namespace App\Dao\User;

use App\Models\User;
use App\Contract\Dao\User\UserDaoInterface;
class UserDao implements UserDaoInterface{
    public function index()
    {   
        return User::orderBy('id','desc')->paginate(10);
    }
    public function edit($id)
    {      
         return $user =User::find($id);
    }
    public function storeCollectData($data) {

     $data['created_user_id'] = auth()->user()->id;
       User::create($data);
        request()->session()->forget('user');
    }
    public function delete($id){
        User::find($id)->delete();
    }
    public function updateConfirm($user_data_to_update, $id){
        User::find($id)->update($user_data_to_update);
    }
}