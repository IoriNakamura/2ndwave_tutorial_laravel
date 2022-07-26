<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('blogs', function() {
    return view('blogs');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('blogs', App\Http\Controllers\BlogController::class);

Route::resource('comments', App\Http\Controllers\CommentController::class);

Route::resource('nices', App\Http\Controllers\NiceController::class);

Route::get('/reply/nice/{blog}', 'App\Http\Controllers\NiceController@nice')->name('nice');

Route::get('/reply/unnice/{blog}', 'App\Http\Controllers\NiceController@unnice')->name('unnice');

Route::resource('mypages', App\Http\Controllers\MyPageController::class);

// Route::get('/', [App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcement.index');

//Route::get('/list', [App\Http\Controllers\AnnouncementController::class, 'list'])->name('announcement.list');

// Route::get('/{announcement}', [App\Http\Controllers\AnnouncementController::class, 'show'])->name('announcement.show');

Route::resource('users', App\Http\Controllers\UserController::class);