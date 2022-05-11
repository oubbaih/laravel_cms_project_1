<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Permission;
use App\Models\Posts;
use App\Models\Role;
use App\Models\setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userCount = User::count();
        $postsCount = Posts::count();
        $categoriesCount = Category::count();
        $permissionsCount = Permission::count();
        $rolesCount = Role::count();
        $mediaCount = Media::count();
        $commentCount = Comment::count();
        $setting = setting::all();
        return  view('admin.index', compact('userCount', 'setting', 'postsCount', 'categoriesCount', 'permissionsCount', 'rolesCount', 'mediaCount', 'commentCount'));
    }
}
