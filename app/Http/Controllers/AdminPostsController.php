<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

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
        $posts = Posts::paginate(5);
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
        $categories = Category::get();
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
        // dd($request);

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'post_image' => 'file',
            'category_id' => 'required'
        ]);


        $input = [];
        if ($request->post_image) {
            $fileName = $request->file('post_image')->getClientOriginalName();
            $path = $request->file('post_image')->storeAs('images', $fileName, 'public');
            $input['post_image'] =  '/storage/' . $path;
        }

        $input['title'] = $request['title'];
        $input['category_id'] = $request['category_id'];


        $content = $request->body;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/uploads/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();



        $input['body'] = $content;


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
        // dd($post);
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
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'post_image' => 'file'
        ]);



        if ($request->post_image) {
            $fileName = $request->file('post_image')->getClientOriginalName();
            $path = $request->file('post_image')->storeAs('images', $fileName, 'public');
            $post->post_image = '/storage/' . $path;;
        }
        $post->title = $request->title;
        $post->category_id = $request->category_id;


        $content = $request->body;


        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        // dd($imageFile);


        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');

            // list($type, $data) = explode(';', $data);
            // list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/uploads/" . time() . $item . '.png';
            $path = public_path() . $image_name;;
            $image->removeAttribute('src');
            $image->setAttribute('src', file_put_contents($path, $imgeData));
        }

        $post->body = $dom->saveHTML();

        $post->save();
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
        $post->delete();
        Session::flash('delete-message', 'Post Was Deleted');
        return redirect(route('posts.index'));
    }
}
