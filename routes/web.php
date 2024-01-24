<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'ShowFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login_post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('dasbor', [MainController::class, 'dasbor'])->name('dasbor');

    //Action
    Route::post('upload_profile', [MainController::class, 'upload_profile'])->name('upload_profile');
    Route::post('actionshowdata', [MainController::class, 'actionshowdata'])->name('actionshowdata');
    Route::post('actionshowdatawmulti', [MainController::class, 'actionshowdatawmulti'])->name('actionshowdatawmulti');
    Route::post('actionlistdata', [MainController::class, 'actionlistdata'])->name('actionlistdata');
    Route::post('actionedit', [MainController::class, 'actionedit'])->name('actionedit');
    Route::post('actioneditwmulti', [MainController::class, 'actioneditwmulti'])->name('actioneditwmulti');
    Route::post('actiondelete', [MainController::class, 'actiondelete'])->name('actiondelete');
    Route::post('actionadd', [MainController::class, 'actionadd'])->name('actionadd');
    // End Action

    // Manage Data
    Route::get('managerole', [MainController::class, 'managerole'])->name('managerole');
    Route::get('manageusers', [MainController::class, 'manageusers'])->name('manageusers');
    Route::get('managelocation', [MainController::class, 'managelocation'])->name('managelocation');
    Route::get('managesection', [MainController::class, 'managesection'])->name('managesection');
    Route::get('qrgeneratemachine', [MainController::class, 'qrgeneratemachine'])->name('qrgeneratemachine');
    Route::get('managemachine', [MainController::class, 'managemachine'])->name('managemachine');
    // End Manage

    // Production
    Route::get('createcorrective', [MainController::class, 'createcorrective'])->name('createcorrective');

    // End  Production

    // Maintenance
    Route::get('actioncorrective', [MainController::class, 'actioncorrective'])->name('actioncorrective');

    // End Maintenance

    // Deptman
    Route::get('finishedcorrective', [MainController::class, 'finishedcorrective'])->name('finishedcorrective');

    // End Deptman
    
});
