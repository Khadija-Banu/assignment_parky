<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SearchController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//backend route
Route::get('/search',[SearchController::class,'search'])->name('search');
Route::get('/f_home',[FrontendController::class,'home'])->name('f_home');
Route::get('/user_list',[ProfileController::class,'userList'])->name('user_list');

Route::get('/index',[PostController::class,'index'])->name('post_index');
Route::get('/create',[PostController::class,'create'])->name('post_create');
Route::post('/store',[PostController::class,'store'])->name('post_store');
Route::get('/edit/{id}',[PostController::class,'edit'])->name('post_edit');
Route::post('/update/{id}',[PostController::class,'update'])->name('post_update');
Route::get('/delete/{id}',[PostController::class,'delete'])->name('post_delete');



//authentication
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

