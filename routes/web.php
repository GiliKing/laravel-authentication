<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//for the landing page
Route::get('/', [UserController::class, 'index']);

// for registration page
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// for getting the info
Route::post('/create', [UserController::class, 'store']);

//for logout of user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// login in user
Route::post('/authenticate', [UserController::class, 'authenticate']);

// show login form for admin
Route::get('/admin/login', [UserController::class, 'adminLogin'])->name('login')->middleware('guest');

// login in admin
Route::post('/admin/authenticate', [UserController::class, 'adminAuthenticate']);

//for logout of admin
Route::post('/admin/logout', [UserController::class, 'adminLogout'])->middleware('auth');

// viw for admin
Route::get('/admin', [UserController::class, 'adminIndex'])->middleware('auth');


// for double log
Route::get('/page', [UserController::class, 'page'])->middleware('auth');

// activate the user
Route::get('/admin/{user}/activate', [UserController::class, 'edit'])->middleware('auth');

// activate the user
Route::put('/admin/activate/{user}', [UserController::class, 'activate'])->middleware('auth');

// admin route for message
Route::get('/admin/user', [MessageController::class, 'show'])->middleware('auth');


// route to send messages
Route::post('/user/message', [MessageController::class, 'store'])->middleware('auth');

// route for showing messages
Route::get('/user/message/all', [MessageController::class, 'show'])->middleware('auth');

