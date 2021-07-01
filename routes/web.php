<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;

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

Route::get('/', [TemplateController::class, 'index']);
Route::get('/aboutus', [TemplateController::class, 'aboutUs']);
Route::get('/blog', [TemplateController::class, 'blog']);
Route::get('/blogdetails', [TemplateController::class, 'blogDetails']);
Route::get('/contact', [TemplateController::class, 'contact']);
Route::get('/team', [TemplateController::class, 'team']);
