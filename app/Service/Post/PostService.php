<?php 
namespace App\Service\Post;
use App\Models\Post;
use App\Dao\Post\PostDao;
use App\Contract\Service\Post\PostServiceInterface;
class postService implements PostServiceInterface {
    public $postDao;
    public function __construct (PostDao $post_dao)
    {
        $this->postDao = $post_dao;
    } 
    public function index(){
        return $this->postDao->index();
    } 
    // public function store($data)
    // {
    //     $this->postDao->store($data);
    // }
    
    public function storeCollectData($data)
    {
        $this->postDao-> storeCollectData($data);
    }

    public function update($post_data_to_update , $id){
        $this->postDao->update($post_data_to_update, $id);
    }
    public function delete($id){
        $this->postDao->delete($id);
    }
} 
