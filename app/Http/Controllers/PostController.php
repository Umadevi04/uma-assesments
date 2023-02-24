<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\PostController;
// use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\DataTables\PostDataTable;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','store']]);
         $this->middleware('permission:post-create', ['only' => ['create','store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostDataTable $dataTable)
    {        
        return $dataTable->render('webadmin.posts.index');       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $users=User::all();    
        return view('webadmin.posts.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hi');
        $this->validate($request, [
            'postTitle' => 'required',            
        ]);
    //    dd($request);
        $post             = new Post();
        $post->user_id = $request->user_id;
        $post->postTitle       = $request->name;         
        $post->save();  
      
        return redirect()->route('webadmin.posts.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('webadmin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {             
        $users=User::all(); 
        $post = Post::find($id);
         $post['user']=User::all();
         return view('webadmin.posts.edit',compact('post','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request);
        $this->validate($request, [
            'postTitle' => 'required',            
        ]);
        $post             = new Post();
        $post->update($request->all());
        $post = Post::find($id);
        $input        = $request->all();        
        $post->update($input);      

        return redirect()->route('webadmin.posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('webadmin.posts.index')
                        ->with('success','Post deleted successfully');
    }
}

