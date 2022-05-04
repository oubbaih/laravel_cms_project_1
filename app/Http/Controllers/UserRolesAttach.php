<?php

namespace App\Http\Controllers;


use App\Models\User;


class UserRolesAttach extends Controller
{
    //
    public function attach($id)
    {
        $user = User::FindOrFail($id);
        $user->roles()->attach(request('role_id'));
        return back();
    }
    public function detach($id)
    {
        $user = User::FindOrFail($id);
        $user->roles()->detach(request('role_id'));
        return back();
    }
    public function attachPermission($id)
    {
        $user = User::FindOrFail($id);
        $user->permissions()->attach(request('permission_id'));
        return back();
    }
    public function detachPermission($id)
    {
        $user = User::FindOrFail($id);
        $user->permissions()->detach(request('permission_id'));
        return back();
    }
}
