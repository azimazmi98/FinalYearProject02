<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\ExtraController;


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


/*---------------------------- PATIENT AUTHENTICATION  --------------------------------*/

Route::get('/patient',[PatientController::class, 'display']);

Route::get('/patient2',function(){return view('patientHome2');});

Route::get('/patientForm',function(){return view('patientForm');});

Route::get('/patient_login', [PatientController::class, 'auth']);

Route::post('/add_patient',[PatientController::class, 'save']);


/*--------------------------- PATIENT INFORMATION ALTER -------------------------------*/

Route::get('/patientView',[PatientController::class, 'viewForm']);

Route::get('/patientView',[PatientController::class, 'index']);

Route::get('click_edit/{patient_icNum}',[PatientController::class, 'edit']);

Route::post('/update/{patient_icNum}',[PatientController::class, 'update']);

Route::get('click_delete/{patient_icNum}',[PatientController::class, 'delete']);

/*------------------------------ ADMIN AUTHENTICATION ----------------------------------*/

Route::get('/admin',[AdminController::class,'display']);

Route::get('/adminView',[AdminController::class, 'viewForm']);

Route::get('/adminForm',function(){return view('Admin/adminForm');});

Route::post('/add_admin',[AdminController::class, 'save']);

Route::get('/adminAuthentication',[AdminController::class, 'adminAuth']);

Route::get('/adminView',[AdminController::class, 'index']);

Route::get('/selectPage',function(){return view('Admin/pageSelection');});

Route::get('/edit_admin/{staffID}',[AdminController::class, 'edit']);

Route::get('/update_admin/{staffID}',[AdminController::class, 'update']);

Route::get('/delete_admin/{staffID}',[AdminController::class, 'delete']);

Route::get('/logout',[AdminController::class, 'logout']);


/*---------------------------- QUEUE MANAGEMENT ROUTES --------------------------------*/

Route::get('/queue',[QueueController::class, 'queue']);

Route::get('/add_queue',[QueueController::class, 'getQueue']);

Route::get('/patientQueue',[QueueController::class, 'displayQueue']);

Route::get('/reviewQueue',[QueueController::class, 'reviewQueue']);

Route::get('/manageQueue',[QueueController::class, 'index']);

Route::get('/remove_queue/{queueNum}',[QueueController::class, 'delete']);

Route::get('/notification',function(){return view('Queue/notification');});

Route::get('/removeAll', [QueueController::class, 'deleteAll']);

/*---------------------------- EXTRA PAGES ROUTES --------------------------------*/

Route::get('/tutorial',[ExtraController::class, 'tutorial']);

Route::get('/tutorial2',function(){return view('Extra/tutorial2');});

Route::get('/patientContact',function(){return view('Extra/patientContact');});



