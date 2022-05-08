<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $post  =  Posts::findOrFail($id);
        $categories = Category::all();
        return view('blog-post', ['post' => $post, 'categories' => $categories]);
    }
}
