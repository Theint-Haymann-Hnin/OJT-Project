<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Contract\Service\Post\PostServiceInterface;
use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;

class PostController extends Controller
{
    public $postService;
    public function __construct(PostServiceInterface $post_service_interface){
        $this->postService = $post_service_interface;
    }
    public function index()
    {    
      $posts = $this->postService->index();
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {  
        $data =$this->validatePost(null);
        $request->session()->put('post', $data);
        return redirect('/posts/create/collectdataform');
    }
    public function collectDataForm(Request $request)
    {    
        
        return view('post.create-confirmation');
    } 
    public function storeCollectData(Request $request)
    {
        
        $this->postService->storeCollectData( $request->all() );
        return redirect('/posts')->with('successAlert','You have successfully created');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {      
        $post= $this->postService->edit($id);
        return view('post.update', compact('post'));
    }
    public function update(Request $request, $id)
    {   
        $post_update_data = $this->validatePost($id);
        $post_update_data['id'] = $id;
        $request->session()->put('post', $post_update_data);
        return redirect('posts/update/updatecollectdataform');
    }
    public function updateCollectDataForm( )
    {
        return view('post.update-confirmation');
    }
    public function  updateConfirm(Request $request, $id)
    {   
        $post_update_data = $this->validatePost($id);
        $this->postService->updateConfirm($post_update_data , $id);
        return redirect('/posts')->with('successAlert','You have successfully updated');
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
    public function search(Request $request)
    {   
       $searchData = $request->search_data;
       $posts = $this->postService->search($searchData);
        return view('post.index', compact('posts'));
    }
    public function validatePost($id)
    {
        return request()-> validate([
        'title' => "required|min:3|max:255|unique:posts,title, $id",
        'description' => 'required| min:5',
        'status' => 'nullable'
            ]);
    }
    public function exportExcel($type) 
    {
        return \Excel::download(new TransactionsExport, 'posts.'.$type);
    }
    public function importExportView()
    {
       return view('post.upload-post');
    }
    

    public function importExcel(Request $request) 
    {    
        $this->validate($request, [
            'import_file'  => 'required|max:2000|mimes:csv,txt'
           ]);
        \Excel::import(new TransactionsImport,$request->file('import_file'));

        return redirect('/posts')->with('successAlert','File uploaded  successfully ');
    }
}
        