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

Route::get('/', [ApiController::class, 'index']);

Route::get('/quran', function() {
    return view('quran');
});

Route::get('/surah/{id_surah}', function($id_surah) {
    return view('surah', ['id_surah' => $id_surah]);
});

Route::get('/doa', function() {
    return view('doa');
});