<?php 
namespace App\Contract\Service\User;

interface UserServiceInterface 
{
    public function index();
    // public function store($data_to_store);
    public function storeCollectData($data);
    public function delete($id);
    // public function update($user_data_to_update, $id);
    // public function  updateConfirm($user_data_to_update, $id);
}