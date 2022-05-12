<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\AboutPageHomeView;
use App\Http\Controllers\AdminContactForm;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRolesAttach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::get('/search', HomeController::class . '@search')->name('search');
Route::get('/', HomeController::class . '@index')->name('home');
Route::get('/post/{id}', PostController::class . '@show')->name('post');
Route::resource('/page/contact', ContactController::class);
Route::get('page/about', AboutPageHomeView::class . '@index')->name('page.about');

Route::middleware('auth')->group(function () {
  Route::get('/admin', AdminController::class . '@index')->name('admin');
  Route::resource('/admin/posts', AdminPostsController::class);
  Route::resource('/admin/profile', AdminProfileController::class);
  Route::resource('/comment', CommentController::class);
});

Route::middleware('role:admin', 'auth')->group(function () {
  Route::resource('/admin/user', UserController::class);
  Route::put('/admin/{role}/rolesattach', UserRolesAttach::class . '@attach')->name('rolesattach.attach');
  Route::delete('/admin/{role}/rolesdetach', UserRolesAttach::class . '@detach')->name('rolesdetach.detach');
  Route::put('/admin/{role}/rolesattachpermission', UserRolesAttach::class . '@attachPermission')->name('rolesattach.attachPermission');
  Route::delete('/admin/{role}/rolesdetachpermission', UserRolesAttach::class . '@detachPermission')->name('rolesdetach.detachPermission');
  // Authorization Routes
  Route::resource('admin/roles', RoleController::class);
  Route::resource('admin/permissions', PermissionController::class);
  // Categories Route 
  Route::resource('/admin/category', CategoryController::class);
  //Media Routes 
  // Add MediaCheckbox Route 
  Route::post('/admin/checkbox', MediaController::class . '@mediaCheckbox')->name('admin.checkbox');
  Route::resource('/admin/media', MediaController::class);

  //Admin Settings 
  Route::resource('admin/setting', SettingController::class);
  //Show Contact Form Messages
  Route::get('/admin/contact', AdminContactForm::class . '@index')->name('admin.contact');
  Route::delete('/admin/contact/{id}', AdminContactForm::class . '@destroy')->name('admin.contact.destroy');

  // About Us Routes For Admin
  Route::resource('/admin/about', AboutPageController::class);
});
