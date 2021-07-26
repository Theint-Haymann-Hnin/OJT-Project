<?php

namespace App\Dao\User;

use App\Models\User;
use App\Contract\Dao\User\UserDaoInterface;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
    /**
     * get User List
     * @return UserList
     */
    public function getUserList()
    {
        return User::with('createdUser')->latest()->paginate(10);
    }

    /**
     * Find User By Id
     * @param $id
     * @return User $user
     */
    public function findUserById($id)
    {
        return User::find($id);
    }

    /**
     * store collect data
     * @param $data
     */
    public function storeCollectData($data)
    {
        if (!isset($data['created_user_id'])) {
            $data['created_user_id'] = auth()->user()->id;
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            request()->session()->forget('user');
        } else {
            User::create($data);
        }
    }

    /**
     * updateUser
     * @param $user_data_to_update, $id
     * @return User $user
     */
    public function updateUser($user_data_to_update, $id)
    {
        if (!isset($user_data_to_update['updated_user_id'])) {
            $user_data_to_update['updated_user_id'] = auth()->user()->id;
        }
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
     * search user by name, email, created from and created to
     * @param $name, $email, $start_date, $end_date
     * @return User $user
     */
    public function search($name, $email, $start_date, $end_date)
    {
        if ($name == null && $email == null && $start_date == null && $end_date == null) {
            return $this->getUserList();
        }
        if (isset($name) && !empty($name)) {
            $users = User::where('name', 'like', '%' . $name . '%')->paginate(5)->withQueryString();
        } elseif (isset($email) && !empty($email)) {
            $users = User::where('email', 'like', '%' . $email . '%')->paginate(5)->withQueryString();
        } elseif ($start_date && $end_date) {
            $users = User::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->paginate(5)->withQueryString();
        }
        return $users;
    }

    /**
     * show user detail 
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function userProfile($id)
    {
        return User::find($id);
    }
}
