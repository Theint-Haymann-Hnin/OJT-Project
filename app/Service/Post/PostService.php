<?php 
namespace App\Service\Post;
use App\Dao\Post\PostDao;
use App\Contract\Service\Post\PostServiceInterface;
class postService implements PostServiceInterface 
    {

    private $postDao;
    public function __construct (PostDao $post_dao)
    {
        $this->postDao = $post_dao;
    } 
    public function index(){
        return $this->postDao->index();
    }
    public function storeCollectData($data)
    {
        $this->postDao->storeCollectData($data);
    }
    public function findPostById($id)
    {      
        return $posts= $this->postDao ->findPostById($id);
    }

    public function  updatePost($post_data_to_update , $id)
    {
        $this->postDao->updatePost($post_data_to_update, $id);
    }
    public function delete($id){
        $this->postDao->delete($id);
    }
    public function search($searchData)
    {
        $posts = $this->postDao->search($searchData);
        return $posts;
    }
} 
