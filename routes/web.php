<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
    return view('login');
});

//Admin Routes Start
Route::get('dashboard', [MainController::class, 'dashboard']);
Route::get('pform', [MainController::class, 'pformview']);

//Route::get('login', [MainController::class, 'login'])->name('login');

Route::post('patient-Record',[MainController::class,'patient_recordAdd']);
