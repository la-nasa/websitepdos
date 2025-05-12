<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    PageController,
    ServiceController,
    ArticleController,
    ContactController
};

// Auth (login seulement ; plus d'enregistrement public)
Auth::routes(['register' => false]);

// Public
Route::get('/',                     [PageController::class,'home'])->name('home');
Route::get('/services',            [ServiceController::class,'index'])->name('services.index');
Route::view('/about','about')->name('about');
Route::get('/contact',             [ContactController::class,'show'])->name('contact');
Route::post('/contact',            [ContactController::class,'send'])->name('contact.send');
Route::get('/blog',                [ArticleController::class,'index'])->name('blog.index');
Route::get('/blog/{article}',      [ArticleController::class,'show'])->name('blog.show');

// Authenticated routes (admin)
Route::middleware('auth')->group(function(){
    Route::get('/blog/create',         [ArticleController::class,'create'])->name('blog.create');
    Route::post('/blog',               [ArticleController::class,'store'])->name('blog.store');
    Route::get('/blog/{article}/edit', [ArticleController::class,'edit'])->name('blog.edit');
    Route::put('/blog/{article}',      [ArticleController::class,'update'])->name('blog.update');
    Route::delete('/blog/{article}',   [ArticleController::class,'destroy'])->name('blog.destroy');
});
