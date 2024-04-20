<?php
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::POST('register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('login',[SessionController::class,'create'])->middleware('guest');   
Route::POST('login',[SessionController::class,'store'])->middleware('guest');   
Route::POST('logout',[SessionController::class,'destroy'])->middleware('auth');

Route::get('admin/posts/create',[PostController::class,'create'])->middleware('admin');
Route::post('admin/posts',[PostController::class,'store'])->middleware('admin');