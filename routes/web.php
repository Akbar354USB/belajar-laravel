<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StudentController;
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

Route::middleware('auth')->group(function(){



Route::get('/student/create', [StudentController::class, 'create'])->name("student-create");
Route::post('/student/school', [StudentController::class, 'store'])->name("student-school-store");
Route::get('/student/index', [StudentController::class, 'index'])->name("student-index");
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name("student-delete");
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name("student-edit");
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name("student-update");

Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Auth::routes();