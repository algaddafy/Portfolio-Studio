<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PortfolioController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PagesController::class,'index'])->name('home');

Route::get('/admin/dashboard', [PagesController::class,'dashboard'])->name('admin.dashboard');

//main section
Route::get('/admin/main', [MainController::class,'index'])->name('admin.main');
Route::put('/admin/main/{id}', [MainController::class,'update']);

//portfolio section
Route::get('/portfolios/create', [PortfolioController::class,'create'])->name('admin.portfolios.create');
Route::put('/portfolios/create', [PortfolioController::class,'store'])->name('admin.portfolios.store');
Route::get('/portfolios/list', [PortfolioController::class,'list'])->name('admin.portfolios.list');
Route::get('/portfolios/edit/{id}', [PortfolioController::class,'edit'])->name('admin.portfolios.edit');
Route::post('/portfolios/update/{id}', [PortfolioController::class,'update'])->name('admin.portfolios.update');
Route::delete('/portfolios/destroy/{id}', [PortfolioController::class,'destroy'])->name('admin.portfolios.destroy');

Route::get('/admin/services', [PagesController::class,'services'])->name('admin.services');
Route::get('/admin/portfolio', [PagesController::class,'portfolio'])->name('admin.portfolio');
Route::get('/admin/about', [PagesController::class,'about'])->name('admin.about');
Route::get('/admin/contact', [PagesController::class,'contact'])->name('admin.contact');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
