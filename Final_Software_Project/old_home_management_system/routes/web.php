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

Route::get('/familyMembers_home', [ViewController::class, 'familyMemberView']);

Route::get('/patientAddInfo', [ViewController::class, 'patientAddInfoView']);

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
    return view('supervisorsHome');
});


Route::get('/caretakersHome', function () {
    return view('caretakersHome');
});

Route::post('/patientInfoSearch', [ViewController::class, 'patientSearch']);