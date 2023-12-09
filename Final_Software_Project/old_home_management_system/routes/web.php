<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\ViewController;
use App\Http\Controllers\loginApplicationController;
use App\Http\Controllers\RosterControllerAPI;

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

Route::get('/', [ViewController::class, 'homeView']);

Route::get('/registration', [ViewController::class,  'registrationFormView']);

Route::get('/login', [ViewController::class, 'loginView']);

Route::get('/doctorsDashboard', [ViewController::class, 'doctorsDashboardView']);

Route::post('/appointmentSearch', [ViewController::class, 'appointmentSearch']);

Route::get('/newRoster', [ViewController::class, 'rosterInfoShow']);

Route::get('/rosterView', [ViewController::class,'rosterViewInfo']);

Route::get('/getRosterInfo', [ViewController::class,'getRosterInfo']);

Route::post('/doctorPatients', [ViewController::class, 'doctorPatientsView']);

Route::get('/loginCheck', [loginApplicationController::class, 'loginCheck']);

Route::get('/patientAddInfo', [ViewController::class, 'patientAddInfoView']);

Route::get('/registrationApproval', [viewController::class, 'registrationApprovalShow']);

Route::get('/Patients', [ViewController::class, 'check']);

Route::post('/patientSearch', [ViewController::class, 'patientSearch']);

Route::get('/patientsHome', function () {
    return view('patientsHome');
});

Route::get('/newRoleForm', function () {
    return view('roleAddForm');
});

Route::get('/adminsHome', function () {
    return view('adminsHome');
});

Route::get('/doctorsHome', [ViewController::class, 'doctorsHomeView']);

Route::get('/supervisorsHome', function () {
    return view('supervisorHome');
});

Route::get('/caretakersHome', function () {
    return view('caretakersHome');
});

Route::get('/adminReport', function () {
    return view('adminreport');
});

Route::get('/doctorsAppointment', function () {
    return view('doctorsAppointment');
});


Route::post('/appointmentFilter', [ViewController::class, 'appointmentFilter']);

Route::post('/familyMembers_home', [ViewController::class, 'familyHomeView']);

Route::get('/logout', [loginApplicationController::class, 'logout']);

