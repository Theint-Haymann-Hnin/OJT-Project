<?php 
namespace App\Contract\Service\Post;

interface PostServiceInterface 
{
    public function index();
    // public function store($data_to_store);
    // public function collectDataForm($data);
    public function storeCollectData($data);
    public function update($post_data_to_update, $id);
    public function delete($id);

}