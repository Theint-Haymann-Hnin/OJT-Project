<?php

namespace App\Service\Post;

use App\Dao\Post\PostDao;
use App\Contract\Service\Post\PostServiceInterface;

class postService implements PostServiceInterface
{
    /** $postDao*/
    private $postDao;

    /**
     * construct
     * @param PostDao $post_dao
     */

    public function __construct(PostDao $post_dao)
    {
        $this->postDao = $post_dao;
    }

    /**
     * Display post list
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return $this->postDao->index();
    }
    
    /**
     * Display post list for guest
     *
     * @return \Illuminate\Http\Response
     */

    public function guestPostIndex()
    {
        return $this->postDao->guestPostIndex();
    }

    /**
     * store collect data
     * @param $data
     */

    public function storeCollectData($data)
    {
        $this->postDao->storeCollectData($data);
    }

    /**
     * Find Post By Id
     * @param $id
     * @return Post $post
     */

    public function findPostById($id)
    {
        return $posts = $this->postDao->findPostById($id);
    }

    /**
     * updatePost
     * @param $id ,$post_data_to_update
     * @return Post $post
     */

    public function  updatePost($post_data_to_update, $id)
    {
        $this->postDao->updatePost($post_data_to_update, $id);
    }

    /**
     * delete post
     * @param $id 
     * @return Post $post
     */

    public function delete($id)
    {
        $this->postDao->delete($id);
    }

    /**
     * search post by title and description
     * @param $searchData
     * @return Post $post
     */

    public function search($searchData)
    {
        $posts = $this->postDao->search($searchData);
        return $posts;
    }
}
