<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginRegistrationController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/LoginCallback', [LoginRegistrationController::class,'GithubCallBack']);
Route::get('/callgithub', [LoginRegistrationController::class,'callGithubAuth']);
Route::get('/logout', [LoginRegistrationController::class,'logOut']);
Route::get('/dashboard', [DashboardController::class,'dashboardPage'])->middleware('check');