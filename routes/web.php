<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('frontend.index');
// })->middleware(['auth']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [UserController::class,'UserHome'])->middleware(['guest'])->name('user.home');

Route::get('/user/dashboard', [UserController::class,'userDashboard'])->middleware(['auth','role:user'])->name('user.dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->middleware(['auth', 'verified','role:admin'])->name('admin.dashboard');

Route::post('/admin/logout', [AdminController::class, 'AdminLogout'])->middleware(['auth','role:admin'])->name('admin.logout');
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware('guest')->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'AdminRegister'])->middleware('guest')->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'store'])->middleware('guest')->name('admin.store');
Route::get('/admin/logout/page', [AdminController::class, 'AdminLogoutPage'])->middleware('guest')->name('admin.logout.page');

Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->middleware(['auth','role:admin'])->name('admin.profile');
Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->middleware(['auth','role:admin'])->name('admin.profile.update');
Route::get('/category/all', [CategoryController::class, 'CategoryAll'])->middleware(['auth','role:admin'])->name('category.all');
Route::get('/category/add/page', [CategoryController::class, 'CategoryAddPage'])->middleware(['auth','role:admin'])->name('category.add.page');
Route::post('/category/add', [CategoryController::class, 'CategoryAdd'])->middleware(['auth','role:admin'])->name('category.add');


Route::get('/subcategory/add/page', [SubCategoryController::class, 'SubCategoryAddPage'])->middleware(['auth','role:admin'])->name('subcategory.add.page');
Route::post('/subcategory/add', [SubCategoryController::class, 'SubCategoryAdd'])->middleware(['auth','role:admin'])->name('subcategory.add');
Route::get('/subcategory/all', [SubCategoryController::class, 'SubCategoryAll'])->middleware(['auth','role:admin'])->name('subcategory.all');


Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->middleware(['auth','role:user'])->name('user.profile.update');

Route::get('/admin/passwordChange/page', [AdminController::class, 'AdminPasswordChangePage'])->middleware(['auth','role:admin'])->name('admin.password.change.page');
Route::post('/admin/password/change', [AdminController::class, 'AdminPasswordChange'])->middleware(['auth','role:admin'])->name('admin.password.change');

Route::get('/user/login', [UserController::class, 'UserLogin'])->middleware('guest')->name('user.login');
Route::get('/user/register', [UserController::class, 'UserRegister'])->middleware('guest')->name('user.register');
Route::post('/user/register', [UserController::class, 'store'])->middleware('guest')->name('user.store');
Route::post('/user/logout', [UserController::class, 'UserLogout'])->middleware(['auth','role:user'])->name('user.logout');
Route::get('/user/passwordChange/page', [UserController::class, 'UserPasswordChangePage'])->middleware(['auth','role:user'])->name('user.password.change.page');
Route::post('/user/password/change', [UserController::class, 'UserPasswordChange'])->middleware(['auth','role:user'])->name('user.password.change');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
