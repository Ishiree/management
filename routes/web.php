<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('list-permohonan', [\App\Http\Controllers\PermohonanController::class, 'permohonanQuery']);
Route::get('list-divisi', [\App\Http\Controllers\DivisiController::class, 'divisiQuery']);
Route::get('list-cabang', [\App\Http\Controllers\CabangController::class, 'cabangQuery']);
Route::get('list-bank', [\App\Http\Controllers\BankController::class, 'bankQuery']);
Route::get('list-user', [\App\Http\Controllers\UserController::class, 'userQuery']);
Route::resources([
    'permohonans' => PermohonanController::class,
    'divisis' => DivisiController::class,
    'cabangs' => CabangController::class,
    'banks' => BankController::class,
    'users' => UserController::class,
]);
Route::get('permohonans/{id}/approve', [App\Http\Controllers\PermohonanController::class, 'approve'])->name('approve');
Route::get('permohonans/{id}/rilis', [App\Http\Controllers\PermohonanController::class, 'rilis'])->name('rilis');
Route::get('permohonans/{id}/delete', [App\Http\Controllers\DivisiController::class, 'delete'])->name('delete_divisi');