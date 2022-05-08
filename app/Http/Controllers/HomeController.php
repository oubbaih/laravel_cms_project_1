<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Posts::paginate(4);
        $categories = Category::all();
        // dd($categories[0]->name);
        return view('home', compact('posts', 'categories'));
    }
}
