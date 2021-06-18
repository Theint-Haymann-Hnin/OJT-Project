<?php 
namespace App\Contract\Dao\Post;

interface PostDaoInterface 
{
    public function index();
    // public function store($data_to_store);
    // public function collectDataForm($data);
    public function storeCollectData($data);
    // public function update($post_data_to_update, $id);
    public function  updateConfirm($post_data_to_update, $id);
    public function delete($id);
}