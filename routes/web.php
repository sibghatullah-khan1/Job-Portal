<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\afterlogin\jobsController;
use App\Http\Controllers\afterlogin\pagesController as afterloginController;

//before login ..
Route::get('/', [pagesController::class, 'welcome'])->name('welcome');
Route::get('/about', [pagesController::class, 'about'])->name('about');
Route::get('/services', [pagesController::class, 'services'])->name('services');
Route::get('/contact', [pagesController::class, 'contact'])->name('contact');
Route::get('/companies', [pagesController::class, 'companies'])->name('companies');
Route::get('/available-jobs', [pagesController::class, 'jobs'])->name('jobs');
Route::get('/jobs', [pagesController::class, 'show'])->name('show');


Auth::routes();

//after login ..
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[afterloginController::class, 'dashboard'])->name('user.dashboard');
Route::get('/profile',[afterloginController::class, 'profile'])->name('user.profile');
Route::get('/setting',[afterloginController::class, 'setting'])->name('user.setting');
Route::get('/your-applied-jobs',[afterloginController::class, 'yaj'])->name('user.yaj');
Route::resource('/jobs', jobsController::class);