<?php

use App\Http\Controllers\MahasiswaAdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => ['auth','prevent-back-history','role:admin']], function() {
    Route::resource('user','App\Http\Controllers\UserController');
    Route::resource('brand','App\Http\Controllers\BrandController');
});
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('/users', 'App\Http\Controllers\UserController');
Route::resource('/kampus', 'App\Http\Controllers\KampusController');
Route::resource('/program_studi', 'App\Http\Controllers\ProgramStudiController');
Route::get('/mahasiswa/admin',[MahasiswaAdminController::class,  'index'])->name('mahasiswa_admin');


Route::get('/mahasiswa',[MahasiswaController::class,  'index'])->name('mahasiswa');
route::get('/mahasiswa/create',[MahasiswaController::class, 'create'])->name('mahasiswa_create');
route::post('/mahasiswa/create/store/',[MahasiswaController::class, 'store'])->name('mahasiswa_store');
Route::get('/mahasiswa/profile/{email}', [ProfileController::class, 'show'])->name('show_mahasiswa');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'lihat'])->name('profile');
});