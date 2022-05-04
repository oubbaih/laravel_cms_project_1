<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Here We Will Explain How To Mke pagination 
        //

        $posts = auth()->user()->posts()->paginate(4);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $input = $request->validate([
            'title' => 'required',
            'post_image' => 'file',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->post_image) {
            $fileName = $request->file('post_image')->getClientOriginalName();
            $path = $request->file('post_image')->storeAs('images', $fileName, 'public');
            $input['post_image'] = '/storage/' . $path;
        }
        // dd($input['post_image']);
        auth()->user()->posts()->create($input);

        Session::flash('post-created', 'Post Is Created');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Posts::find($id);
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        //
        $input = $request->validate([
            'title' => 'required',
            'post_image' => 'file',
            'body' => 'required',
            'category_id' => 'required'
        ]);


        if ($request->post_image) {
            $fileName = $request->file('post_image')->getClientOriginalName();
            $path = $request->file('post_image')->storeAs('images', $fileName, 'public');
            $input['post_image'] = '/storage/' . $path;
            $post->post_image = $input['post_image'];
        }
        $post->update($input);
        Session::flash('update-message', 'Post Is Updated');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Posts::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();
        Session::flash('delete-message', 'Post Was Deleted');
        return redirect(route('posts.index'));
    }
}
