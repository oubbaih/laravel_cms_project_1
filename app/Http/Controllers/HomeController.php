<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use App\Models\setting;
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
        $posts = Posts::with('media')->paginate(4);
        $setting = setting::all();
        // dd($setting);
        $categories = Category::all();
        return view('home', compact('posts', 'categories', 'setting'));
    }
    public function search(Request $request)
    {
        $request->validate(['query' => 'required']);
        $categories = Category::all();
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $posts = Posts::where('title', 'LIKE', '%' . $search_query . '%')->with('media')->paginate(4);
            $posts->appends($request->all());
            return view('search', compact('posts', 'categories'));
        } else {
            return view('search', compact('categories'));
        }
    }
}
