<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $user = Auth::user();
        $roles = Role::all();
        $role_admin = '';
        $role_subscrib = '';
        if (isset($roles) && count($user->roles) <= 0) {

            foreach ($roles as $role) {

                if ($role->name == 'admin') {
                    $role_admin = $role;
                } else if ($role->name == 'subscrib') {
                    $role_subscrib = $role;
                }
            }
            if ($_ENV['ADMIN_EMAIL'] == $user->email) {
                $user->roles()->attach($role_admin);
            } else {
                $user->roles()->attach($role_subscrib->id);
            }
        }
        return  view('admin.index', ['user' => $user]);
    }
}
