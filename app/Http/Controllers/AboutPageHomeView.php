<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageHomeView extends Controller
{
    //
    public function index()
    {
        $aboutData = About::with('media')->get();
        return  view('pages.about',  compact('aboutData'));
    }
}
