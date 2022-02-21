<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
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
Route::get('/index', [App\Http\Controllers\pageController::class,'index'])->name('index');
Route::get('/', function () {
    return view('welcome');
});
//Admin


Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin');
Route::get('/login', [App\Http\Controllers\AdminController::class,'getLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AdminController::class,'postLogin']);
Route::get('/logout', [App\Http\Controllers\AdminController::class,'getLogout']);
Route::get('/register', [App\Http\Controllers\AdminController::class,'getRegister']);
Route::post('/register', [App\Http\Controllers\AdminController::class,'postRegister']);


Route::group(['prefix'=>'/admin', 'middleware'=>'auth'],function(){
    Route::resource('category', CategoryController::class);
    Route::resource('type', TypeController::class);
    Route::resource('post', PostController::class);
    Route::resource('account', AccountController::class);
    Route::resource('comment', CommentController::class);
    Route::get('/logout', [App\Http\Controllers\AdminController::class,'getLogout']);

});

//Languages
Route::get('lang/{locale}', function($locale){
    session()->put('locale', $locale);
    return redirect()->back();
});

//trang chu
Route::get('/index', [App\Http\Controllers\pageController::class,'getIndex'])->name('index');
Route::get('/post/{slug}', [App\Http\Controllers\pageController::class,'post'])->name('post');
Route::get('/type/{slug}', [App\Http\Controllers\pageController::class,'type'])->name('type');
Route::get('/featured', [App\Http\Controllers\pageController::class,'featured'])->name('featured');
Route::get('/hot', [App\Http\Controllers\pageController::class,'hot'])->name('hot');
Route::get('/popular', [App\Http\Controllers\pageController::class,'popular'])->name('popular');
Route::get('/trending', [App\Http\Controllers\pageController::class,'trending'])->name('trending');
Route::get('/watched', [App\Http\Controllers\pageController::class,'watched'])->name('watched');
Route::post('/search', [App\Http\Controllers\pageController::class,'getSearch']);
Route::get('/comment', [App\Http\Controllers\pageController::class,'comment']);
Route::get('/letter', [App\Http\Controllers\pageController::class,'letter']);
Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');

