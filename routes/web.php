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
use App\Http\Controllers\LaboratoryDashboardController;
use App\Http\Controllers\NhmDashboardController;
use App\Http\Controllers\ReportGenerateControllerController;
use App\Http\Controllers\StateUser\InvestigationController;
use App\Http\Controllers\StateUser\StateController;
use App\Http\Controllers\StateUser\FormController;
use App\Http\Controllers\NationalStateListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;

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
Route::get('admin-login',[authController::class,'adminLogin']);
Route::post('/login',[authController::class,'loginSubmit'])->middleware('device');
Route::get('refresh_captcha',[authController::class, 'refreshCaptcha'])->name('refresh_captcha');

Route::middleware(['Admin','device'])->group(function () {
        //Profile Edit 
        Route::get('/profile/view/', [ProfileController::class, 'getUserProfile'])->name('profile.edit');
        Route::get('password/update/', [ProfileController::class, 'getUserPassword'])->name('password.update');
        Route::post('change-password/{id}', [ProfileController::class, 'changePassword'])->name('change-password');
        Route::get('/logout',[authController::class,'logout'])->name('logout');
        Route::get('/notifications', [NotificationController::class, 'getNotifications']);
        // Admin Dashboard
        Route::middleware(['preventBackHistory'])->group(function () {
            Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
                Route::get('dashboard', [AdminController::class, 'index'])->name('index');
                Route::get('users', [AdminController::class, 'userList'])->name('user');
                Route::post('save', [AdminController::class, 'userSave'])->name('save');
                Route::get('edit/{id}', [AdminController::class, 'userEdit'])->name('edit');
                Route::post('update/{id}', [AdminController::class, 'userUpdate'])->name('update');
                Route::get('delete/{id}', [AdminController::class, 'userDelete'])->name('delete');
            });
        });
        // End Admin Dasboard
        /** Form Routes */
        Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
        Route::get('mis-report-generate', [MainController::class, 'misReportGenerate'])->name('mis-report-generate');
        Route::get('laboratory-dashboard', [LaboratoryDashboardController::class, 'index'])->name('laboratory-dashboard');
        Route::get('get-filter-laboratory-data',[LaboratoryDashboardController::class,'getFilterLaboratoryData'])->name('get-filter-laboratory-data');
        Route::get('national-report', [LaboratoryDashboardController::class, 'nationalReport'])->name('national-report');
        Route::post('national-report-export', [LaboratoryDashboardController::class, 'nationalExport'])->name('national-report-export');
        Route::get('/get-city', [PFormController::class,'getCityByStateId'])->name('get-city');
        Route::get('/get-sub-district', [PFormController::class,'getSubDistrict'])->name('get-sub-district');
        Route::get('/get-institute-name', [PFormController::class,'getInstitute'])->name('get-get-institute');
        Route::get('/national-highchart', [MainController::class,'nationalHighchart'])->name('national-highchart');
        Route::get('/filter-national-highchart', [MainController::class,'filterNationalHighchart'])->name('filter-national-highchart');
        Route::post('national-mis-report-export', [MainController::class, 'nationalMisExport'])->name('national-mis-report-export');

        // National dashboard monthly report list
        Route::group(['prefix' => 'national', 'as' => 'national.'], function () {
            Route::get('/state-monthly-report', [NationalStateListController::class, 'stateMonthlyReport'])->name('state-monthly-report');
            Route::get('/state-monthly-view/{id}', [NationalStateListController::class, 'stateMonthlyView'])->name('state-monthly-view');
            Route::get('/state-monthly-edit/{id}', [NationalStateListController::class, 'stateMonthlyEdit'])->name('state-monthly-edit');
            Route::post('/state-monthly-update/{id}', [NationalStateListController::class, 'stateMonthlyUpdate'])->name('state-monthly-update');
            Route::delete('state-monthly-delete/{id}',[NationalStateListController::class, 'stateMonthlyDestroy'])->name('state-monthly-delete');
            // state user L Form
            Route::get('/l-form', [NationalStateListController::class, 'lForm'])->name('l-form');
            Route::get('/l-form-view/{id}', [NationalStateListController::class, 'lFormView'])->name('l-form-view');
            Route::get('/l-form-edit/{id}', [NationalStateListController::class, 'lFormEdit'])->name('l-form-edit');
            Route::post('/l-form-update/{id}', [NationalStateListController::class, 'lFormUpdate'])->name('l-form-update');
            Route::delete('l-form-delete/{id}',[NationalStateListController::class, 'lFormDestroy'])->name('l-form-delete');
            // state user P Form
            Route::get('/p-form', [NationalStateListController::class, 'pForm'])->name('p-form');
            Route::get('/p-form-view/{id}', [NationalStateListController::class, 'pFormView'])->name('p-form-view');
            Route::get('/p-form-edit/{id}', [NationalStateListController::class, 'pFormEdit'])->name('p-form-edit');
            Route::post('/p-form-update/{id}', [NationalStateListController::class, 'pFormUpdate'])->name('p-form-update');
            Route::delete('/p-form-delete/{id}',[NationalStateListController::class, 'pFormDestroy'])->name('p-form-delete');
            // Investigate Report
            Route::get('/investigate-report', [NationalStateListController::class, 'investigateReport'])->name('investigate-report');
            Route::get('/investigate-report-view/{id}', [NationalStateListController::class, 'investigateReportView'])->name('investigate-report-view');
            Route::get('/investigate-report-edit/{id}', [NationalStateListController::class, 'investigateReportEdit'])->name('investigate-report-edit');
            Route::post('/investigate-report-update/{id}', [NationalStateListController::class, 'investigateReportUpdate'])->name('investigate-report-update');
            Route::delete('/investigate-report-delete/{id}',[NationalStateListController::class, 'investigateReportDestroy'])->name('investigate-report-delete');
        });
        // End national dashboard monthly report list

        Route::group(['prefix' => 'pform', 'as' => 'pform.'], function(){
            Route::get('/', [PFormController::class, 'index'])->name('index');
            Route::post('store',[PFormController::class, 'store'])->name('store');
            Route::post('update/{id}',[PFormController::class, 'update'])->name('update');
            Route::get('delete/{id}',[PFormController::class, 'delete'])->name('delete');
        });
        Route::post('pform',[PFormController::class, 'pform'])->name('pform');
        Route::group(['prefix' => 'lform', 'as' => 'lform.'], function(){
            Route::get('/', [LFormController::class, 'index'])->name('index');
            Route::post('store',[LFormController::class, 'store'])->name('store');
            Route::post('update/{id}',[LFormController::class, 'update'])->name('update');
            Route::get('delete/{id}',[LFormController::class, 'delete'])->name('delete');
        });

        Route::get('sform', [SFormController::class, 'index'])->name('sform');
        // nhm dashboard
        Route::group(['prefix' => 'nhms', 'as' => 'nhm.'], function () {
            Route::get('/', [NhmDashboardController::class, 'index'])->name('index');
            Route::get('/create', [NhmDashboardController::class, 'create'])->name('create');
            Route::post('/store', [NhmDashboardController::class, 'store'])->name('store');
            Route::get('/view/{id}', [NhmDashboardController::class, 'view'])->name('view');
            Route::get('/edit/{id}', [NhmDashboardController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [NhmDashboardController::class, 'update'])->name('update');
            Route::delete('delete/{id}',[NhmDashboardController::class, 'destroy'])->name('delete');
        });
        // end nhm dashboard
        Route::get('Human-rabies-map', [MainController::class, 'HumanRabiesView'])->name('pform2');
         
        Route::get('patient_records_form',[MainController::class,'patientrecordsform']);

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
            Route::get('lab-dashboard',[MainController::class,'labDashboard'])->name('lab-dashboard');
            Route::get('general-laboratory',[GeneralProfileController::class,'create'])->name('general-laboratory');
            Route::get('general-profile',[GeneralProfileController::class,'index']);
            Route::post('general-save', [GeneralProfileController::class, 'store'])->name('general-save');
            Route::get('general-laboratory-profile/{id}', [GeneralProfileController::class, 'edit']);
            Route::get('general-edit/{id}', [GeneralProfileController::class, 'edit'])->name('general-edit');
            Route::post('general-update', [GeneralProfileController::class, 'update'])->name('general-update');
            Route::delete('general-laboratory-destroy/{id}', [GeneralProfileController::class, 'destroy'])->name('general-laboratory-destroy');

            Route::get('quality',[QualityAssuranceController::class,'create'])->name('quality');
            Route::post('quality-add', [QualityAssuranceController::class, 'store'])->name('quality-add');
            Route::get('quality-profile',[QualityAssuranceController::class,'index']);
            Route::get('quality-assurance-profile/{id}', [QualityAssuranceController::class, 'edit']);
            Route::get('quality-edit/{id}', [QualityAssuranceController::class, 'edit'])->name('quality-edit');
            Route::post('quality-update', [QualityAssuranceController::class, 'update'])->name('quality-update');
            Route::delete('quality-destroy/{id}', [QualityAssuranceController::class, 'destroy'])->name('quality-destroy');

            Route::get('equipments',[EquipmentsController::class,'create'])->name('equipments');
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

        Route::middleware(['StateUserPermission','preventBackHistory'])->group(function () {
            Route::group(['prefix' => 'states', 'as' => 'state.'], function () {
                Route::get('dashboard', [StateController::class, 'index'])->name('dashboard');
                Route::get('investigate-create',[InvestigationController::class,'create'])->name('investigate-create');
                Route::get('investigate-report-list',[InvestigationController::class,'list'])->name('investigate-report-list');
                Route::post('investigate-store',[InvestigationController::class,'store'])->name('investigate-store');
                Route::get('monthly-report-list',[StateController::class,'stateMonthlyList'])->name('monthly-report-list');
                Route::get('monthly-report',[StateController::class,'stateMonthlyCreate'])->name('monthly-report');
                Route::post('monthly-report-store',[StateController::class,'stateMonthlystore'])->name('monthly-report-store');
                Route::get('line-suspected-list',[StateController::class,'lineSuspectedList'])->name('line-suspected-list');
                Route::get('line-suspected-create',[StateController::class,'lineSuspectedCreate'])->name('line-suspected-create');
                Route::post('line-suspected-store',[StateController::class,'lineSuspectedstore'])->name('line-suspected-store');
                Route::get('excel-report', [StateController::class, 'excelReport'])->name('excel-report');
                Route::post('report-export',[StateController::class,'reportExport'])->name('report-export');
                Route::get('lform-list',[FormController::class,'lFormList'])->name('lform-list');
                Route::get('lform-create',[FormController::class,'lFormCreate'])->name('lform-create');
                Route::post('lform-store',[FormController::class,'lFormstore'])->name('lform-store');
                //  Yearly wise Monthly Report filter graph
                Route::get('/state-highchart', [StateController::class,'stateHighchart'])->name('state-highchart');
            });
        });
    });
});
