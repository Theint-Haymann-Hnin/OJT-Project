<?php 
namespace App\Contract\Dao\Post;

interface PostDaoInterface 
{
    //comment add pay pr
    public function index();
    // store collect date (like this)
    public function storeCollectData($data);
    public function  updatePost($post_data_to_update, $id);
    public function delete($id);
}