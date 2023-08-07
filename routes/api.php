<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::group(['middleware' => ['jwt.auth']], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);

    //School
    Route::prefix('school')->name('.school')->group(function(){
        Route::get('/', [SchoolController::class, 'index'])->name('.index');
        Route::post('/', [SchoolController::class, 'store'])->name('.store');
        Route::get('/{id}', [SchoolController::class, 'show'])->name('.show');
        Route::put('/{id}', [SchoolController::class, 'update'])->name('.update');
        Route::delete('/{id}', [SchoolController::class, 'destroy'])->name('.destroy');
    });

    //Student
    Route::prefix('student')->name('.student')->group(function(){
        Route::get('/', [StudentController::class, 'index'])->name('.index');
        Route::post('/', [StudentController::class, 'store'])->name('.store');
        Route::get('/{id}', [StudentController::class, 'show'])->name('.show');
        Route::put('/{id}', [StudentController::class, 'update'])->name('.update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('.destroy');
    });
});
