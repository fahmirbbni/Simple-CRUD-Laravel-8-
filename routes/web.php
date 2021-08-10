<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\CetakController;



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

//mengambil data parkir berdasarkan id
Route::get('parkir/{id}/cetak', [CetakController::class, 'index'])->name('parkir.print');

//mengambil data yang dicari berdasarkan id
Route::get('search', [ParkirController::class, 'search'])->name('search');

// router untuk mengambil semua fungsi pada controller
// fungsi CRUD dapat dijalankan dan di aplikasikan pada view
Route::resource('parkir', ParkirController::class);

