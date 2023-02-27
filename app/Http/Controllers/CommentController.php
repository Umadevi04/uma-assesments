<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\DataTables\CommentsDataTable;

class CommentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:comment-list|comment-create|comment-edit|comment-delete', ['only' => ['index','store']]);
         $this->middleware('permission:comment-create', ['only' => ['create','store']]);
         $this->middleware('permission:comment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:comment-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentsDataTable $dataTable)
    {        
        return $dataTable->render('webadmin.comments.index');       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        // $comments=Comment::all();    
        return view('webadmin.comments.create');
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
            'name' => 'required',            
        ]);
 //dd($request);
        $comment              = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->name        = $request->name;         
        $comment->save();  
      
        return redirect()->route('webadmin.comments.index')
                        ->with('success','Comment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('webadmin.comments.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {             
        // $categories=Category::all(); 
        $comment = Comment::find($id);
        //  $subcategory['category']=Category::all();
         return view('webadmin.contents.edit');
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
            'name' => 'required',            
        ]);
        $comment             = new Comment();
        $comment->update($request->all());
        $comment = Comment::find($id);
        $input        = $request->all();        
        $comment->update($input);      

        return redirect()->route('webadmin.comments.index')
                        ->with('success','Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('webadmin.comments.index')
                        ->with('success','Comment deleted successfully');
    }
}
