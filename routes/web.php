<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
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

Route::get('/', [HomeController::class, 'home']);

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admind
Route::get('/dashboard/admin', [HomeController::class, 'index'])->name('home');

// Background Snapshot CRUD 
Route::get('/background', [BackgroundController::class, 'index'])->name('list-background');
Route::get('/background/create', [BackgroundController::class, 'create'])->name('create');
Route::post('/background/create', [BackgroundController::class, 'store'])->name('store');
Route::get('/background/update/{id}', [BackgroundController::class, 'edit'])->name('edit');
Route::put('/background/update/{id}', [BackgroundController::class, 'update'])->name('update');
Route::delete('/background/delete/{id}', [BackgroundController::class, 'delete'])->name('delete');

// Team Snapshot CRUD
Route::get('/team', [TeamController::class, 'index'])->name('list-team');
Route::get('/team/create', [TeamController::class, 'create'])->name('create.team');
Route::post('/team/create', [TeamController::class, 'store'])->name('store.team');
Route::get('/team/update/{id}', [TeamController::class, 'edit'])->name('edit.team');
Route::put('/team/update/{id}', [TeamController::class, 'update'])->name('update.team');
Route::delete('/team/delete/{id}', [TeamController::class, 'delete'])->name('delete.team');

// Gallery Snapshot CRUD
Route::get('/gallery', [GalleryController::class, 'index'])->name('list-gallery');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('create.gallery');
Route::post('/gallery/create', [GalleryController::class, 'store'])->name('store.gallery');
Route::get('/gallery/update/{id}', [GalleryController::class, 'edit'])->name('edit.gallery');
Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('update.gallery');
Route::delete('/gallery/delete/{id}', [GalleryController::class, 'delete'])->name('delete.gallery');

// News Profil
Route::get('/news', [NewsController::class, 'index'])->name('list-news');
Route::get('/news/create', [NewsController::class, 'create'])->name('create-news');
Route::post('/news/store', [NewsController::class, 'store'])->name('store-news');
Route::get('/news/update/{id}', [NewsController::class, 'edit'])->name('edit-news');
Route::put('/news/update{id}', [NewsController::class, 'update'])->name('update-news');
Route::delete('/news/delete/{id}', [NewsController::class, 'delete'])->name('delete-news');

// Jurusan Profile
Route::get('/jurusan', [JurusanController::class, 'index'])->name('list-jurusan');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('create-jurusan');
Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('store-jurusan');
Route::get('/jurusan/update/{id}', [JurusanController::class, 'edit'])->name('edit-jurusan');
Route::put('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('update-jurusan');
Route::delete('/jurusan/delete/{id}', [JurusanController::class, 'delete'])->name('delete-jurusan');
