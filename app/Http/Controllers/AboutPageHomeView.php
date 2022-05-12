<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutPage;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutPageHomeView extends Controller
{
    // :categories=$categories
    public function index()
    {
        $categories = Category::all();
        $aboutData = About::with('media')->get();
        return  view('pages.about',  compact('aboutData', 'categories'));
    }
}
