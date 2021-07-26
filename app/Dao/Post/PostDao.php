<?php

namespace App\Dao\Post;

use App\Models\Post;
use App\Contract\Dao\Post\PostDaoInterface;

class PostDao implements PostDaoInterface
{
  /**
   * get Post List
   * @return PostList
   */
  public function getPostList()
  {
    if (auth()->check() && auth()->user()->type == 0) {
      $posts = Post::orderBy('id', 'desc')->paginate(5);
    } else {
      $posts = Post::where('created_user_id', auth()->user()->id)->paginate(5);
    }
    return $posts;
  }

  /**
   * get Post List for guest
   * @return PostList
   */
  public function guestPost()
  {
    return Post::where('status', '=', 1)->paginate(20);
  }

  /**
   * store collect data
   * @param $data
   */
  public function storeCollectData($data)
  {
    if (!isset($data['created_user_id'])) {
      $data['created_user_id'] = auth()->user()->id;
      Post::create($data);
      request()->session()->forget('post');
    } else {
      Post::create($data);
    }
  }

  /**
   * Find Post By Id
   * @param $id
   * @return Post $post
   */
  public function findPostById($id)
  {
    return Post::find($id);
  }

  /**
   * updatePost
   * @param $post_data_to_update, $id
   * @return Post $post
   */
  public function updatePost($post_data_to_update, $id)
  {
    if (!isset($post_data_to_update['updated_user_id'])) {
      if (isset($post_data_to_update['status'])) {
        $post_data_to_update['status'] = 1;
      } else {
        $post_data_to_update['status'] = 0;
      }
      $post_data_to_update['updated_user_id'] = auth()->user()->id;
      Post::find($id)->update($post_data_to_update);
      request()->session()->forget('post');
    } else {
      Post::find($id)->update($post_data_to_update);
    }
  }

  /**
   * delete post
   * @param $id 
   */
  public function delete($id)
  {
    Post::find($id)->delete();
  }

  /**
   * search post by title and description
   * @param $searchData
   * @return Post $posts
   */
  public function search($searchData)
  {
    return Post::where('title', 'like', "%" . $searchData . "%")->orWhere('description', 'like', "%" . $searchData . "%")->orWhereHas('user', function ($user) use ($searchData) {
      $user->where('name', 'like', "%" . $searchData . "%");
    })->paginate(5)->withQueryString();
  }
}
