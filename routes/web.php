<?php

use App\Http\Controllers\NamazTimingController;
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

//user data import export 
Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');


// namaz timing import export namaz-timing-convert
Route::get('namaz-timing-import-export', [NamazTimingController::class, 'NamazTimingImportExport']);
Route::post('namaz-timing-import', [NamazTimingController::class, 'fileImport'])->name('namaz-timing-import');
Route::get('namaz-timing-export', [NamazTimingController::class, 'fileExport'])->name('namaz-timing-export');
Route::get('namaz-timing-convert', [NamazTimingController::class, 'TimeConvertion'])->name('namaz-timing-convert');
