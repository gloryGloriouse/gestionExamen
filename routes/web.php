<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\AuthController;
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
    return view('auth.login');
});

Route::get("login",[AuthController::class, 'loginForm'])->name("login");
Route::post("login",[AuthController::class, 'logIn'])->name('login.user');
Route::get("register",[AuthController::class, 'registration'])->name("register");
Route::post("register",[AuthController::class, 'userRegistration'])->name('register.user');
Route::get("logout",[AuthController::class, 'logOut'])->name('logout.user');
Route::get('/results/show',[ExamenController::class, 'showresult'])->name('examen.result.show');
    

Route::middleware("auth")->group(function(){

Route::prefix("filieres")->group(function(){
    Route::get('/', [FiliereController::class,'viewfiliere'])->name("filieres.view");
    Route::get('/create', [FiliereController::class,'createFil'])->name("filieres.create");
    Route::post('/', [FiliereController::class,'store'])->name('filiere.store');
    Route::get('/{filiere}',[FiliereController::class, 'edit'])->name('filiere.edit');
    Route::put('/{id}',[FiliereController::class, 'update'])->name('filiere.update');
    Route::delete('/{filiere}', [FiliereController::class, 'destroy'])->name('filiere.destroy');
});

Route::prefix("courses")->group(function(){
    Route::get('/', [CourseController::class,'viewCourse'])->name("course.view");
    Route::get('/create', [CourseController::class,'createCourse'])->name("course.create");
    Route::post('/', [CourseController::class,'store'])->name('course.store');
    Route::get('/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
});

Route::prefix("students")->group(function(){ 
    Route::get('/', [StudentController::class,'student'])->name("student.view");
    Route::get('/create', [StudentController::class,'create'])->name("student.create");
    Route::post('/', [StudentController::class,'store'])->name('student.store');
    Route::get('/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
});

Route::prefix("examens")->group(function(){ 
    Route::get('results',[ExamenController::class, 'createresult'])->name('examen.result.create');
    Route::post('results',[ExamenController::class, 'storeresult'])->name('examen.result.store');
    Route::get('/', [ExamenController::class,'examen'])->name("examen.view");
    Route::get('/create', [ExamenController::class,'create'])->name("examen.create");
    Route::post('/', [ExamenController::class,'store'])->name('examen.store');
    Route::get('/{examen}', [ExamenController::class, 'edit'])->name('examen.edit');
    Route::put('/{id}', [ExamenController::class, 'update'])->name('examen.update');
    Route::delete('/{examen}', [ExamenController::class, 'destroy'])->name('examen.destroy');
});

});


