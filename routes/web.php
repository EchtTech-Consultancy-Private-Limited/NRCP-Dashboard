<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\authController;


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

//login
Route::get('/',[authController::class,'login']);
Route::post('/login',[authController::class,'loginSubmit']);
Route::get('refresh_captcha',[authController::class, 'refreshCaptcha'])->name('refresh_captcha');

Route::middleware(['Admin','preventBackHistory'])->group(function () {

Route::get('/logout',[authController::class,'logout'])->name('logout');
//Admin Routes Start
Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
Route::get('pform', [MainController::class, 'pformview'])->name('pform');
Route::get('sform', [MainController::class, 'sformview']);

Route::get('sform', [MainController::class, 'sformview'])->name('sform');
Route::get('Human-rabies-map', [MainController::class, 'HumanRabiesView'])->name('pform2');
Route::post('patient-Record',[MainController::class,'patientAdd']);

//human rabies

Route::get('human-rabies',[MainController::class,'humanRabiesMap']);
Route::get('human-rabies-death',[MainController::class,'humanRabiesDeath']);

//record-filter
Route::get('get-filter-data',[MainController::class,'getFilterData']);
Route::get('set-session',[MainController::class,'setSession']);
Route::get('p-form-horizontal-barchart',[MainController::class, 'pFormHorizontalBarChart']);
Route::get('get-district',[MainController::class,'getDistrict']);
Route::get('pform-horizontal-barchart-death',[MainController::class,'pFormHorizontalBarChartDeath']);

Route::get('age_group',[MainController::class,'getFilterData']);
});





