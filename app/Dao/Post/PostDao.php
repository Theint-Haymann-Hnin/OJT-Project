<?php
namespace App\Dao\Post;

use App\Models\Post;
use App\Contract\Dao\Post\PostDaoInterface;
use Auth;
class PostDao implements PostDaoInterface{
    public function index()
    {   

      if(auth()->check() && auth()->user()->type == 0 ){
         $posts = Post::paginate(5);
      } elseif(auth()->check() && auth()->user()->type == 1 ) {
        $posts = Post::where('created_user_id', auth()->user()->id)->paginate(5);
      } else {
        $posts = Post::where('status','=', 1)->paginate(5);
      }
      return $posts;
      
      
        
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
        $data['created_user_id'] = auth()->user()->id;
        Post::create($data);
        request()->session()->forget('post');
    }
    // public function update($post_data_to_update, $id){
    //     Post::find($id)->update($post_data_to_update);
    // }
   
    public function  updateConfirm($post_data_to_update, $id){
       if(isset($post_data_to_update['status'])){
        $post_data_to_update['status'] = 1;
       }else{
        $post_data_to_update['status'] = 0;
       }
        Post::find($id)->update($post_data_to_update);
        request()->session()->forget('post');
    }
    public function delete($id)
    {
        Post::find($id)->delete();
    }
    // public function search()
    // {     

    //     $searchData = request()->search_data;
    //     $posts = Post::where('title','like',"%".$searchData."%")->orWhere('description','like',"%".$searchData."%")->
    //     orWhereHas('user',function($user)use($searchData){
    //     $user->where('name','like',"%".$searchData."%");
    //     })->paginate(5);
    // }
}