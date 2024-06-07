<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LandingPageController;

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

Route::get('/', [InformasiController::class, 'index'])->name('index');
Route::post('/create', [LandingPageController::class, 'store']);
Route::post('/create/surat', [SuratController::class, 'store']);
Route::get('/pdf/{id}', [SuratController::class, 'index'])->name('indexPdf');
Route::get('surat/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate.pdf');