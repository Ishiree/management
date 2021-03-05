<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermohonanController;
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
Route::resources([
    'permohonans' => PermohonanController::class,
]);
Route::get('berkas/permohonans/{id}/approve', [App\Http\Controllers\PermohonanController::class, 'approve'])->name('approve');
Route::get('status/permohonans/{id}/approve', [App\Http\Controllers\PermohonanController::class, 'rilis'])->name('approve');