<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transactions');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/transactions', [App\Http\Controllers\TransactionController::class, 'transfer'])->name('transfer');

Route::get('dashboard', [App\Http\Controllers\TransactionController::class,'show'])->name('dashboard');

Route::get('admin.index', [App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
Route::get('admin.edit', [App\Http\Controllers\AdminController::class,'edit'])->name('admin.edit');
Route::GET('admin.create', [App\Http\Controllers\AdminController::class,'create'])->name('admin.create');
Route::POST('admin.create', [App\Http\Controllers\AdminController::class,'createUser'])->name('createUser');
Route::GET('deleteUser/{id}', [App\Http\Controllers\AdminController::class,'deleteUser'])->name('deleteUser');
