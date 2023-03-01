<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PostDataTable;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
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
        $users = User::all();
        return view('webadmin.posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //dd($request->all());
            $valid = $request->validate([
                'postTitle'  =>  'required',
                'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
            ]);

            $input = $request->all();
            if ($request->is_commentable == 'on') {
                $input['is_commentable'] = Post::ISCOMMENTABLE;
            } else {
                $input['is_commentable'] = Post::ISUNCOMMENTABLE;
            }
            $input['user_id'] = Auth::id();
            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }

            Post::create($input);

            return redirect()->route('webadmin.posts.index')
                ->with('success', 'Post created successfully.');
        } catch (Exception $e) {
            $message = $e->getMessage();
            Log::info(print_r($message, 1));
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            //var_dump('Exception Code: '. $code);

            $string = $e->__toString();
            //var_dump('Exception String: '. $string);

            return redirect()->route('webadmin.posts.index')
                ->with('error', 'Something went wrong');
        }

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        $comments = Comment::where('post_id',$post->id)->get();
        return view('webadmin.posts.show', compact('comments','post'));
        // return view('webadmin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $users = User::all();
        $post = Post::find($id);
        $post['user'] = User::all();
        return view('webadmin.posts.edit', compact('post', 'users'));
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
        // dd($request);
        $this->validate($request, [
            'postTitle' => 'required',
            'postDescription' => 'required',

        ]);
        $post             = new Post();
        $post->update($request->all());
        $post = Post::find($id);
        $input        = $request->all();
        $post->update($input);

        return redirect()->route('webadmin.posts.index')
            ->with('success', 'Post updated successfully');
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
            ->with('success', 'Post deleted successfully');
    }
}
