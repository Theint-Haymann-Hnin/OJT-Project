<?php
namespace App\Dao\User;

use App\Models\User;
use App\Contract\Dao\User\UserDaoInterface;
class UserDao implements UserDaoInterface{
    public function index()
    {
        return User::all();
    }
    public function store($data){
        User::create($data);
    }
    public function delete($id){
        User::find($id)->delete();
    }
    public function update($user_data_to_update, $id){
        User::find($id)->update($user_data_to_update);
    }
}