<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Contract\Service\Post\PostServiceInterface;

class PostController extends Controller
{
    public $postService;
    public function __construct(PostServiceInterface $post_service_interface){
        $this->postService = $post_service_interface;
    }
    public function index()
    {    
        $posts = $this->postService ->index();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {  
        $data =$this->validatePost();
        $this->postService->store($data);
        return redirect('/posts')->with('successAlert','You have successfully created');
    }
    public function show($id)
    {
    
    //    return view('post.update');
   
    }
    public function edit($id)
    {   
        $post =Post::find($id);
        return view('post.update', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post_update_data =$this->validatePost();
        $this->postService->update($post_update_data , $id);
        return redirect('/posts')->with('successAlert','You have successfully updated');;
    }

    public function destroy($id)
    {
        $this->postService->delete($id);
        return redirect('/posts')->with('successAlert','You have successfully deleted');
    }
    public function upload()
    {
        return view('post.upload-post');
    }
    public function createPostConfirmation()
    {
        return view('post.create-confirmation');
    } 
     public function updatePostConfirmation()
     {
        return view('post.update-confirmation');
     }
     public function validatePost()
     {
         return request()-> validate([
             'title' => 'required',
             'description' => 'required',
             'status' => 'required',
             'created_user_id' => 'required',
             'updated_user_id' => 'required',
             'deleted_user_id' => 'required'
         ]);
     }
    

}
