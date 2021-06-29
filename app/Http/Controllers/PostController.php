<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Contract\Service\Post\PostServiceInterface;
use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;

class PostController extends Controller
{
    /** $postService*/
    private $postService;

    /**
     * construct
     * @param PostServiceInterface $post_service_interface
     */

    public function __construct(PostServiceInterface $post_service_interface)
    {
        $this->postService = $post_service_interface;
    }

    /**
     * Display post list
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = $this->postService->index();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the post create form
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('post.create');
    }

    /**
     * Show the post create confirm form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $this->validatePost(null);
        $request->session()->put('post', $data);
        return redirect('/posts/create/collectdataform');
    }

    /**
     * Show the post create confirm form
     *
     * @return \Illuminate\Http\Response
     */

    public function collectDataForm(Request $request)
    {

        return view('post.create-confirmation');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeCollectData(Request $request)
    {

        $this->postService->storeCollectData($request->all());
        return redirect('/posts')->with('successAlert', 'You have successfully created');
    }

    /**
     * Show the form for editing the post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $post = $this->postService->findPostById($id);
        return view('post.update', compact('post'));
    }

    /**
     * Show the post update form
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $post_update_data = $this->validatePost($id);
        $post_update_data['id'] = $id;
        $request->session()->put('post', $post_update_data);
        return redirect('posts/update/updatecollectdataform');
    }

    /**
     * Show the post update confirm form
     *
     * @return \Illuminate\Http\Response
     */

    public function updateCollectDataForm()
    {
        return view('post.update-confirmation');
    }

    /**
     * Update the post 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function  updatePost(Request $request, $id)
    {
        $post_update_data = $this->validatePost($id);
        $this->postService->updatePost($post_update_data, $id);
        return redirect('/posts')->with('successAlert', 'You have successfully updated');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->postService->delete($id);
        return redirect('/posts')->with('successAlert', 'You have successfully deleted');
    }

    /**
     * Show the upload post blade
     *
     */

    public function upload()
    {
        return view('post.upload-post');
    }

    /**
     * searching post 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $posts
     */

    public function search(Request $request)
    {
        $searchData = $request->search_data;
        $posts = $this->postService->search($searchData);
        return view('post.index', compact('posts'));
    }

    public function validatePost($id)
    {
        return request()->validate([
            'title' => "required|min:3|max:255|unique:posts,title," . $id,
            'description' => 'required| min:5',
            'status' => 'nullable'
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function exportExcel($type)
    {
        return \Excel::download(new TransactionsExport, 'posts.' . $type);
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
        $this->validate($request, [
            'import_file'  => 'required|max:2000|mimes:csv,txt'
        ]);
        \Excel::import(new TransactionsImport, $request->file('import_file'));
        return redirect('/posts')->with('successAlert', 'File uploaded  successfully ');
    }
}
