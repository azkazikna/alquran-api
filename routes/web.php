<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/quran', function() {
    return view('quran');
});

Route::get('/surah/{nomor}', function($nomor) {
    return view('surah', ['nomor' => $nomor]);
});

Route::get('/doa', function() {
    return view('doa');
});