<?php 
namespace App\Contract\Service\User;

interface UserServiceInterface 
{
    public function index();
    public function storeCollectData($data);
    public function delete($id);
    public function  updateConfirm($user_data_to_update, $id);
}