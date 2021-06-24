<?php 
namespace App\Contract\Service\Post;

interface PostServiceInterface 
{
    public function index();
    public function storeCollectData($data);
    public function  updateConfirm($post_data_to_update, $id);
    public function delete($id);

}