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
        
        // dd($value);
        $data =$this->validatePost();
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
        return redirect('/posts')->with('successAlert','You have successfully created');;
    }
    public function show($id)
    {
        
        //    return view('post.update');
        
    }
    public function edit($id)
    {   
        $post = Post::find($id);  
        return view('post.update', compact('post'));
    }
    
    public function update(Request $request, $id)
    {   
        $post_update_data = $this->validatePost();
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
        $post_update_data = $this->validatePost();
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
        
        // $this->postService->search();
        $searchData = request()->search_data;
        $posts = Post::where('title','like',"%".$searchData."%")->orWhere('description','like',"%".$searchData."%")->
        orWhereHas('user',function($user)use($searchData){
            $user->where('name','like',"%".$searchData."%");
        })->paginate(5);
        return view('post.index', compact('posts'));
    }
    
    
    public function validatePost()
    {
        return request()-> validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required',
            'status' => 'nullable'
            // 'created_user_id' => 'required',
            // 'updated_user_id' => 'required',
            // 'deleted_user_id' => 'required'
            ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcel($type) 
    {
        return \Excel::download(new TransactionsExport, 'posts.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('post.upload-post');
    }
   
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcel(Request $request) 
    {
        
        \Excel::import(new TransactionsImport,$request->file('import_file'));

        return view('post.upload-post');
    }
}
        