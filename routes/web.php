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
Route::get('/logout',[authController::class,'logout'])->name('logout');

Route::middleware(['Admin','preventBackHistory'])->group(function () {

//Admin Routes Start
Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
Route::get('pform', [MainController::class, 'pformview'])->name('pform');
Route::get('sform', [MainController::class, 'sformview']);

Route::get('sform', [MainController::class, 'sformview'])->name('sform');
Route::get('Human-rabies-map', [MainController::class, 'HumanRabiesView'])->name('pform2');

//Route::get('login', [MainController::class, 'login'])->name('login');

Route::post('patient-Record',[MainController::class,'patientAdd']);


//human rabies

Route::get('human-rabies-new',[MainController::class,'humanRabiesMapNew']);


Route::get('human-rabies',[MainController::class,'humanRabiesMap']);
Route::get('human-rabies-death',[MainController::class,'humanRabiesDeath']);
Route::get('human-rabies-death-default',[MainController::class,'humanRabiesDeathdefault']);


Route::get('human-rabies-state',[MainController::class,'humanRabiesStateWise']);
Route::get('human-rabies-state-between',[MainController::class,'humanRabiesStateBetween']);


//record-filter
Route::get('human-rabies-state-year',[MainController::class,'humanRabiesStateYear']);
Route::get('test',[MainController::class,'testFilter']);
Route::get('set-session',[MainController::class,'setSession']);


//monu
Route::get('google-chart-case', [MainController::class, 'googleLineChart']);
Route::get('horizontalBarChart', [MainController::class, 'horizontalBarChart']);

Route::get('get-district',[MainController::class,'getDistrict']);
});



