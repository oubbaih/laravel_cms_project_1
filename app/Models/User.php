<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return  $this->hasMany(Posts::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function userHasRole($role_name)
    {
        foreach ($this->roles as $role) {
            if (strtolower($role_name) == strtolower($role->name)) {
                return true;
            }
        }
        return false;
    }
    public function userHasPermission($permission_name)
    {
        foreach ($this->permissions as $permission) {
            if (strtolower($permission_name) == strtolower($permission->slug)) {
                return true;
            }
        }
        return false;
    }
    public function setPasswordAttribute($pass)
    {
        return $this->attributes['password'] = bcrypt($pass);
    }
}
