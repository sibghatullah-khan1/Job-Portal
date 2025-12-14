<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\pagesController;

Route::get('/', [pagesController::class, 'welcome'])->name('welcome');
Route::get('/about', [pagesController::class, 'about'])->name('about');
Route::get('/services', [pagesController::class, 'services'])->name('services');
Route::get('/contact', [pagesController::class, 'contact'])->name('contact');
Route::get('/companies', [pagesController::class, 'companies'])->name('companies');
Route::get('/available-jobs', [pagesController::class, 'jobs'])->name('jobs');
Route::get('/jobs', [pagesController::class, 'show'])->name('show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
