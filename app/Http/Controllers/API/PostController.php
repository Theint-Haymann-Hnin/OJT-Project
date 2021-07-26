<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Contract\Service\Post\PostServiceInterface;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;

class PostController extends Controller
{
    /** $postService */
    private $postService;

    /**
     * construct
     * @param PostServiceInterface $post_service_interface
     */
    public function __construct(PostServiceInterface $post_service_interface)
    {
        // $this->middleware('cors');
        $this->postService = $post_service_interface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postService->guestPost();
        return response()->json($posts);
    }


    /**
     * Store a newly created post in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->postService->storeCollectData([
            'title' => $request->title,
            'description' =>  $request->description,
            'created_user_id' =>  $request->created_user_id
        ]);
        return response()->json('success');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postService->findPostById($id);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info($id);
        $post_update_data = $this->validatePost($id);
        $this->postService->updatePost($request->all(), $id);
        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info(request());
        Log::info('success' . $id);
        $this->postService->delete($id);
        return response()->json($id);
    }

    /**
     * searching post
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search_data = $request->search_data;
        $posts = $this->postService->search($search_data);
        return response()->json($posts);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportExcel()
    {
        return \Excel::download(new TransactionsExport, 'posts.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExcel(Request $request)
    {
        $path =  $request->file('import_file')->getRealPath();
        \Excel::import(new TransactionsImport, $path);
        return response()->json('success');
    }

    /**
     * @param $id
     * 
     */
    public function validatePost($id)
    {
        return request()->validate([
            'title' => 'required|min:3|max:255|unique:posts,title,' . $id,
            'description' => 'required| min:5|max:255',
            'status' => 'nullable'
        ]);
    }
}
