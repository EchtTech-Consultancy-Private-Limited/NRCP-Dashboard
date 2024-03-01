<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PFormController;
use App\Http\Controllers\SFormController;
use App\Http\Controllers\LFormController;
use App\Http\Controllers\authController;
use App\Http\Controllers\GeneralProfileController;
use App\Http\Controllers\QualityAssuranceController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\RabiesTestController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\ReportGenerateControllerController;


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
Route::middleware(['preventBackHistory'])->group(function () {
Route::get('/',[authController::class,'login']);
Route::post('/login',[authController::class,'loginSubmit']);
Route::get('refresh_captcha',[authController::class, 'refreshCaptcha'])->name('refresh_captcha');

Route::middleware(['Admin'])->group(function () {
        Route::get('/logout',[authController::class,'logout'])->name('logout');
        Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');

        /** Form Routes */
        Route::get('pform', [PFormController::class, 'index'])->name('pform');
        Route::get('sform', [SFormController::class, 'index'])->name('sform');
        Route::get('lform', [LFormController::class, 'index'])->name('lform');


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
        Route::get('p-form-high-chart',[MainController::class,'pFormHighChart']);

        /**  Use For laboratory*/
        Route::middleware(['AccessUrlPermission','preventBackHistory'])->group(function () {
            Route::get('general-laboratory',[GeneralProfileController::class,'create'])->name('general-laboratory');
            Route::get('general-profile',[GeneralProfileController::class,'index']);
            Route::post('general-save', [GeneralProfileController::class, 'store'])->name('general-save');
            Route::get('general-laboratory-profile/{id}', [GeneralProfileController::class, 'edit']);
            Route::get('general-edit/{id}', [GeneralProfileController::class, 'edit'])->name('general-edit');
            Route::post('general-update', [GeneralProfileController::class, 'update'])->name('general-update');
            Route::delete('general-laboratory-destroy/{id}', [GeneralProfileController::class, 'destroy'])->name('general-laboratory-destroy');

            Route::get('quality-assurance',[QualityAssuranceController::class,'create'])->name('quality-assurance');
            Route::post('quality-add', [QualityAssuranceController::class, 'store'])->name('quality-add');
            Route::get('quality-profile',[QualityAssuranceController::class,'index']);
            Route::get('quality-assurance-profile/{id}', [QualityAssuranceController::class, 'edit']);
            Route::get('quality-edit/{id}', [QualityAssuranceController::class, 'edit'])->name('quality-edit');
            Route::post('quality-update', [QualityAssuranceController::class, 'update'])->name('quality-update');
            Route::delete('quality-destroy/{id}', [QualityAssuranceController::class, 'destroy'])->name('quality-destroy');

            Route::get('equipment',[EquipmentsController::class,'create'])->name('equipment');
            Route::post('equipment-add', [EquipmentsController::class, 'store'])->name('equipment-add');
            Route::get('equipment-profile', [EquipmentsController::class, 'index']);
            Route::get('equipment-edit/{id}', [EquipmentsController::class, 'edit'])->name('equipment-edit');
            Route::post('equipment-update', [EquipmentsController::class, 'update'])->name('equipment-update');
            Route::delete('equipment-destroy/{id}', [EquipmentsController::class, 'destroy'])->name('equipment-destroy');

            Route::get('rabies-test',[RabiesTestController::class,'create'])->name('rabies-test');
            Route::post('rabies-test-carried', [RabiesTestController::class, 'store'])->name('rabies-test-carried');
            Route::get('rabies-test-carried-out', [RabiesTestController::class, 'index']);
            Route::get('rabies-test-edit/{id}', [RabiesTestController::class, 'edit'])->name('rabies-test-edit');
            Route::post('rabies-update', [RabiesTestController::class, 'update'])->name('rabies-update');
            Route::delete('rabies-test-destroy/{id}', [RabiesTestController::class, 'destroy'])->name('rabies-test-destroy');

            Route::get('expenditure',[ExpenditureController::class,'create'])->name('expenditure');
            Route::post('expenditure-add', [ExpenditureController::class, 'store'])->name('expenditure-add');
            Route::get('expenditure-profile', [ExpenditureController::class, 'index']);
            Route::get('expenditure-edit/{id}', [ExpenditureController::class, 'edit'])->name('expenditure-edit');
            Route::post('expenditure-update', [ExpenditureController::class, 'update'])->name('expenditure-update');
            Route::delete('expenditure-destroy/{id}', [ExpenditureController::class, 'destroy'])->name('expenditure-destroy');

            
            Route::get('report-list', [ReportGenerateControllerController::class, 'index'])->name('report-list');
            Route::post('report-export', [ReportGenerateControllerController::class, 'export'])->name('report-export');
            Route::post('generate-pdf', [ReportGenerateControllerController::class, 'generatePDF'])->name('generate-pdf');
        });
    });

});



