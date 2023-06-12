<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified','role:user'])->name('user.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified','role:admin'])->name('admin.dashboard');

Route::post('/admin/logout', [AdminController::class, 'AdminLogout'])->middleware(['auth','role:admin'])->name('admin.logout');
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware('guest')->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'AdminRegister'])->middleware('guest')->name('admin.register');
Route::get('/admin/logout/page', [AdminController::class, 'AdminLogoutPage'])->middleware('guest')->name('admin.logout.page');

Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->middleware(['auth','guest','role:admin'])->name('admin.profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
