<?php

namespace App\Service\User;

use App\Dao\User\UserDao;
use App\Contract\Service\User\UserServiceInterface;

class userService implements UserServiceInterface
{
    /**$userDao*/
    private $userDao;

    /**
     * construct
     * @param PostDao UserDao $user_dao
     */

    public function __construct(UserDao $user_dao)
    {
        $this->userDao = $user_dao;
    }

    /**
     * Display user list
     *
     * @return \Illuminate\Http\Response
     */

    public function getUserList()
    {
        return $this->userDao->getUserList();
    }

    /**
     * store collect data
     * @param $data
     */

    public function storeCollectData($data)
    {
        $this->userDao->storeCollectData($data);
    }

    /**
     * Find Use By id
     * @param $id
     * @return User $users
     */

    public function findUserById($id)
    {
        return $users = $this->userDao->findUserById($id);
    }

    /**
     * updateUser
     * @param $user_data_to_update, $id
     * @return User $user
     */

    public function  updateUser($user_data_to_update, $id)
    {
        $this->userDao->updateUser($user_data_to_update, $id);
    }

    /**
     * delete user
     * @param $id 
     * @return User $user
     */

    public function delete($id)
    {
        $this->userDao->delete($id);
    }

    /**
     * searchuser by name , email , created from and created to
     * @param $name, $email,$start_date , $end_date
     * @return User $user
     */

    public function search($name, $email, $start_date, $end_date)
    {
        return  $this->userDao->search($name, $email, $start_date, $end_date);
    }

    /**
     * show user detail 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userProfile($id)
    {   
        return $users = $this->userDao->userProfile($id);;
    }
}
