<?php

namespace App\Contract\Service\User;

interface UserServiceInterface
{
    // get user list
    public function getUserList();
    // store user
    public function storeCollectData($data);
    // update user
    public function updateUser($user_data_to_update, $id);
    // delete post
    public function delete($id);
    // search user
    public function search($name, $email, $start_date, $end_date);
}
