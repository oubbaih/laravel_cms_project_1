<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\setting;
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

        $post  =  Posts::with(['media', 'comments'])->findOrFail($id);
        $categories = Category::all();
        $settings = setting::all();
        return view('blog-post', ['post' => $post, 'categories' => $categories, 'settings' => $settings]);
    }
}
