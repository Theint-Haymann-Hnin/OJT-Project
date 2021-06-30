<?php

namespace App\Dao\Post;

use App\Models\Post;
use App\Contract\Dao\Post\PostDaoInterface;
use Auth;

class PostDao implements PostDaoInterface
{
  /**
   * get Post LIst
   * @return PostList
   */
  public function index()
  {
    if (auth()->check() && auth()->user()->type == 0) {
      $posts = Post::orderBy('id', 'desc')->paginate(5);
    } elseif (auth()->check() && auth()->user()->type == 1) {
      $posts = Post::where('created_user_id', auth()->user()->id)->paginate(5);
    } else {
      $posts = Post::where('status', '=', 1)->paginate(5);
    }
    return $posts;
  }

  /**
   * store collect data
   * @param $data
   */
  public function storeCollectData($data)
  {
    $data['created_user_id'] = auth()->user()->id;
    Post::create($data);
    request()->session()->forget('post');
  }

  /**
   * Find Post By Id
   * @param $id
   * @return Post $post
   */
  public function findPostById($id)
  {
    return $post = Post::find($id);
  }

  /**
   * updatePost
   * @param $id ,$post_data_to_update
   * @return Post $post
   */
  public function updatePost($post_data_to_update, $id)
  {
    if (isset($post_data_to_update['status'])) {
      $post_data_to_update['status'] = 1;
    } else {
      $post_data_to_update['status'] = 0;
    }
    Post::find($id)->update($post_data_to_update);
    request()->session()->forget('post');
  }

  /**
   * delete post
   * @param $id 
   * @return Post $post
   */
  public function delete($id)
  {
    Post::find($id)->delete();
  }

  /**
   * search post by title and description
   * @param $searchData
   * @return Post $post
   */
  public function search($searchData)
  {
    $posts = Post::where('title', 'like', "%" . $searchData . "%")->orWhere('description', 'like', "%" . $searchData . "%")->orWhereHas('user', function ($user) use ($searchData) {
      $user->where('name', 'like', "%" . $searchData . "%");
    })->paginate(5);
    return $posts;
  }
}
