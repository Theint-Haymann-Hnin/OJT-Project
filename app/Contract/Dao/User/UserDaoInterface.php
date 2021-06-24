<?php 
namespace App\Contract\Dao\User;

interface UserDaoInterface 
{
    public function index();
    public function storeCollectData($data);
    public function delete($id);
    public function  updateConfirm($user_data_to_update, $id);
   
}