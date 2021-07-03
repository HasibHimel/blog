<?php

use App\Http\Controllers\CreatePostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TemplateController::class, 'index'])->name('home')->middleware('auth');
Route::get('/aboutus', [TemplateController::class, 'aboutUs'])->name('aboutUs')->middleware('auth');
Route::get('/blog', [TemplateController::class, 'blog'])->name('blog')->middleware('auth');
Route::get('/blogdetails/{post_id}', [TemplateController::class, 'blogDetails'])->name('blogDetails')->middleware('auth');
Route::get('/contact', [TemplateController::class, 'contact'])->name('contact')->middleware('auth');
Route::get('/team', [TemplateController::class, 'team'])->name('team')->middleware('auth');


Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// admin
Route::get('/admin/home', [HomeController::class, 'adminIndex'])->name('admin.home')->middleware('isAdmin');
