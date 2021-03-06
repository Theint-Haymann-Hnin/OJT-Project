<?php

namespace App\Contract\Service\Post;

interface PostServiceInterface
{
    // get post list
    public function getPostList();
    // post list for guest
    public function guestPost();
    // store post
    public function storeCollectData($data);
    // update post
    public function updatePost($post_data_to_update, $id);
    // delete post
    public function delete($id);
}
