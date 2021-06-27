<?php 
namespace App\Contract\Service\User;

interface UserServiceInterface 
{
    public function index();
    public function storeCollectData($data);
    public function delete($id);
    public function  updateUser($user_data_to_update, $id);
    public function search($name, $email,$start_date , $end_date);
}