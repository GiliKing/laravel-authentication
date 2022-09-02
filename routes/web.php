<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TaskController;
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
Route::get('/admin', [UserController::class, 'adminindex'])->middleware('auth');

// view for five most recent user
Route::get('/admin/pag', [UserController::class, 'adminindexpag'])->middleware('auth');


// for double log
Route::get('/page', [UserController::class, 'page'])->middleware('auth');

// activate the user
Route::get('/admin/{user}/activate', [UserController::class, 'edit'])->middleware('auth');

// activate the user
Route::put('/admin/activate/{user}', [UserController::class, 'activate'])->middleware('auth');

// admin route for message
Route::get('/admin/user', [MessageController::class, 'showadmin'])->middleware('auth');

// navigate to creating new category
Route::get('/admin/newcategory', [CategoryController::class, 'indexcategory'])->middleware('auth');

// store the new category in the database
Route::post('/admin/category', [CategoryController::class, 'store'])->middleware('auth');

// show all the category in the database
Route::get('/admin/category/all', [CategoryController::class, 'show'])->middleware('auth');

// show one category in the database
Route::get('/admin/{category}/edit', [CategoryController::class, 'edit'])->middleware('auth');

// update one category in the database
Route::put('/admin/{category}', [CategoryController::class, 'update'])->middleware('auth');

// delete one category in the database
Route::get('/admin/{category}', [CategoryController::class, 'destroy'])->middleware('auth');



// navigate to sendmessage view
Route::get('/user/sendmessage', [MessageController::class, 'index'])->middleware('auth');

// route to send messages
Route::post('/user/message', [MessageController::class, 'store'])->middleware('auth');

// route for showing messages
Route::get('/user/message/all', [MessageController::class, 'show'])->middleware('auth');


// navigate to sendtask view form
Route::get('/user/sendtask', [TaskController::class, 'index'])->middleware('auth');

// route to send task
Route::post('/user/task', [TaskController::class, 'store'])->middleware('auth');    

// Route to view all task sent
Route::get('/user/task/all', [TaskController::class, 'show'])->middleware('auth');

// Route to view 5 task sent
Route::get('/user/task/all/pag', [TaskController::class, 'showfive'])->middleware('auth');

// Route to edit task form
Route::get('/user/{task}/edit', [TaskController::class, 'edit'])->middleware('auth');

// Route to update task
Route::put('/user/{task}', [TaskController::class, 'update'])->middleware('auth');

// Route to delete a task
Route::get('/user/{task}', [TaskController::class, 'destroy'])->middleware('auth');

// Route to edit task form
Route::get('/admin/{task}/edit', [TaskController::class, 'edittaskadmin'])->middleware('auth');

// Route to update task
Route::put('/admin/{task}', [TaskController::class, 'updatetaskadmin'])->middleware('auth');

// Route to delete a task
Route::get('/admin/{task}', [TaskController::class, 'destroytaskadmin'])->middleware('auth');

// show all the category in the database
Route::get('/admin/task/all', [TaskController::class, 'showadmin'])->middleware('auth');

// Route to view 5 recent task sent to admin
Route::get('/admin/task/all/pag', [TaskController::class, 'showadminfive'])->middleware('auth');


