<?php

namespace App\Dao\User;

use App\Models\User;
use App\Contract\Dao\User\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    /**
     * 
     */
    public function index()
    {
        return User::orderBy('id', 'desc')->paginate(10);
    }
    public function findUserById($id)
    {
        return $user = User::find($id);
    }
    public function storeCollectData($data)
    {
        $data['created_user_id'] = auth()->user()->id;
        User::create($data);
        request()->session()->forget('user');
    }
    public function delete($id)
    {
        User::find($id)->delete();
    }
    public function updateUser($user_data_to_update, $id)
    {
        User::find($id)->update($user_data_to_update);
    }
    public function search($name, $email,$start_date , $end_date)
    {

        if(isset($name) && !empty($name)) {
            $users = User::where('name', 'like', '%' . $name . '%')->paginate(5)->withQueryString();
           }
        if(isset( $email) && !empty( $email)) {
              $users = User::where('email', 'like', '%' .$email . '%')->paginate(5)->withQueryString();
            }
        if($start_date && $end_date) {
              $users = User::whereDate('created_at', '>=', $start_date)->whereDate('created_at','<=',$end_date)->paginate(5)->withQueryString();
            }
            return $users;
    }
    
}
