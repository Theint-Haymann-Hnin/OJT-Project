<?php
namespace App\Dao\Post;

use App\Models\Post;
use App\Contract\Dao\Post\PostDaoInterface;
class PostDao implements PostDaoInterface{
    public function index()
    {
        return Post::all();
    }
    public function store($data)
    {
        // Post::create($data);
    }
    // public function collectDataForm($data)
    // {
    //     Post::create($data);
    // }
    public function storeCollectData($data) {
        $data['created_user_id'] = 1;
        Post::create($data);
        request()->session()->forget('post');
    }
    public function update($post_data_to_update, $id){
        Post::find($id)->update($post_data_to_update);
    }
    public function delete($id)
    {
        Post::find($id)->delete();
    }
}