<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(static function(){
    Route::resource('roles', RoleController::class)->except('show');
    Route::resource('departments', DepartmentController::class)->except('show');
    Route::resource('criteria', CriteriaController::class)->except('show');
    Route::resource('users', UserController::class)->except('show');
    Route::resource('elections', ElectionController::class);
    Route::resource('nominees', NomineeController::class)->except('show');
    Route::resource('votes', VoteController::class)->except('destroy', 'update','edit', 'show');
    Route::get('thanks', [VoteController::class, 'thanks'])->name('thanks');
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Auth::routes();


