<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::name('posts.')->group(function () {

    // Route::get('posts', [PostController::class, "index"])->name('index');
    // Route::get('/create', [PostController::class, "create"])->name("create");
    // Route::post('posts', [PostController::class, "store"])->name("store");
    // Route::get('posts/edit/{id}', [PostController::class, "edit"])->name("edit");

    // Route::get('posts/delete/{id}', [PostController::class, "delete"])->name("delete"); //  Send delete request from a button ????????
    // Route::put('posts/update/{id}', [PostController::class, "update"])->name("update");
    // Route::get('posts/{post}', [PostController::class, "show"])->name("show");

// });

Route::resource('posts', PostController::class)->parameters([ 'posts' => 'id' ])->middleware(['auth','can:view,post']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::fallback(function () {
//     return "COCO";
// });
