<?php

namespace App\Dao\User;

use App\Models\User;
use App\Contract\Dao\User\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    /**
     * get User List
     * @return UserList
     */

    public function index()
    {
        return User::orderBy('id', 'desc')->paginate(10);
    }

    /**
     * Find User By Id
     * @param $id
     * @return User $user
     */

    public function findUserById($id)
    {
        return $user = User::find($id);
    }

    /**
     * store collect data
     * @param $data
     */

    public function storeCollectData($data)
    {
        $data['created_user_id'] = auth()->user()->id;
        User::create($data);
        request()->session()->forget('user');
    }

    /**
     * updateUser
     * @param $user_data_to_update, $id
     * @return User $user
     */

    public function updateUser($user_data_to_update, $id)
    {
        User::find($id)->update($user_data_to_update);
    }

    /**
     * delete user
     * @param $id 
     * @return User $user
     */

    public function delete($id)
    {
        User::find($id)->delete();
    }

    /**
     * search user by name , email, created from and created to
     * @param $name, $email, $start_date, $end_date
     * @return User $user
     */

    public function search($name, $email, $start_date, $end_date)
    {
        $user = User::leftJoin('users as u', 'u.id', '=', 'users.created_user_id');
        if (isset($name) && !empty($name)) {
            $user = $user->where('users.name', 'like', '%' . $name . '%');
        }
        if (isset($email) && !empty($email)) {
            $user = $user->where('users.email', 'like', '%' . $email . '%');
        }
        if (isset($start_date) && !empty($start_date)) {
            $user = $user->where('users.created_at', '>=', $start_date);
        }
        if (isset($end_date) && !empty($end_date)) {
            $user = $user->where('users.created_at', '<=', $end_date);
        }
        return $user->paginate(10, array('users.*', 'u.name as c_name'));
    }
}
