<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Middleware\ChekRoleMiddleware;
use App\Models\student;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

//khusus untuk akses admin

Route::middleware('auth', 'ChekRole:admin')->group(function(){

Route::get('/student/create', [StudentController::class, 'create'])->name("student-create");
Route::post('/student/school', [StudentController::class, 'store'])->name("student-school-store");
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name("student-delete");
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name("student-edit");
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name("student-update");
});

//khusus untuk akses admin dan user

Route::middleware('auth', 'ChekRole:admin,user')->group(function(){

Route::get('/student/index', [StudentController::class, 'index'])->name("student-index");
Route::get('/student/show/{id}', [StudentController::class, 'show'])->name("student-show");
    
Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Auth::routes();