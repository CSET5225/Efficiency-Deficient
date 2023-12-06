<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\ViewController;
use App\Http\Controllers\loginApplicationController;

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
Route::get('/rosterHome', [ViewController::class, 'rosterView']);
Route::get('/doctorsPatients', [ViewController::class, 'doctorPatientsView']);

Route::get('/loginCheck', [loginApplicationController::class, 'loginCheck']);

Route::get('/Patients', [ViewController::class, 'check']);

Route::get('/patientsHome', function () {
    return view('patientsHome');
});


Route::get('/adminsHome', function () {
    return view('adminsHome');
});


Route::get('/doctorsHome', function () {
    return view('doctorsHome');
});


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

Route::get('/familyMembers_home', [ViewController::class, 'familyHomeView']);

Route::get('/logout', [loginApplicationController::class, 'logout']);



