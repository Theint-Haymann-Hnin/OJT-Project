<?php 
namespace App\Contract\Dao\User;

interface UserDaoInterface 
{
    public function index();
    public function store($data_to_store);
    public function delete($id);
    public function update($user_data_to_update, $id);
   
}