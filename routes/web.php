<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

Route::get('/',function (){
   return redirect()->route('posts.index');
});

Route::resource('posts',PostController::class);

Route::get('posts/category/{category}',[PostController::class,'postByCategory'])->name('posts.category');
//Route::get('/posts',[PostController::class,'index'])->name('posts.index');
//Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
//Route::post('/posts',[PostController::class,'store'])->name('posts.store');
//Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
