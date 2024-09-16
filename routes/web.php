<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\blogs;
use App\Models\User;

//non-user
Route::get('/', function () {
    $blogs = blogs::orderBy('created_at', 'desc')->get();

    // Pass the blogs to the 'welcome' view
    return view('welcome', ['blogs' => $blogs]);
});

Route::get('/blog/{id}', [BlogsController::class, 'show'])->name('blog.show');
Route::get('/search', [BlogsController::class, 'searchView'])->name('blog.search');
Route::get('/search-reuslt', [BlogsController::class, 'search'])->name('search');

//category

Route::get('/website', [CategoryController::class, 'website'])->name('category.website');
Route::get('/mobile', [CategoryController::class, 'mobile'])->name('category.mobile');
Route::get('/technology', [CategoryController::class, 'technology'])->name('category.technology');
Route::get('/study', [CategoryController::class, 'study'])->name('category.study');
Route::get('/career', [CategoryController::class, 'career'])->name('category.career');
Route::get('/other', [CategoryController::class, 'other'])->name('category.other');


//admin
Route::get('/dashboard', function () {
    $users = User::count();
    $Blogs = blogs::count();
    return view('dashboard', compact('users', 'Blogs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/manageusers', [UserController::class, 'index'])->name('users.show');
    Route::get('/manageusers/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/manageusers/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/manageusers/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/manageblogs', [BlogsController::class, 'index'])->name('blogs.show');
    Route::put('/manageblogs/{id}', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/manageblogs/{id}', [BlogsController::class, 'destroy'])->name('blogs.destroy');
    Route::get('/manageblogs/{id}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::get('/addblog', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogsController::class, 'store'])->name('blogs.store');



});

require __DIR__ . '/auth.php';
