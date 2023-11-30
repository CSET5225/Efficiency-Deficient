<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\ViewController;

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
Route::get('/loginOrRegister', [ViewController::class, 'regOrLogin']);
Route::get('/familyMembers_home', [ViewController::class, 'familyHomeView']);
Route::get('/patientHome', [ViewController::class, 'patientHomeView']);
Route::get('/adminHome', [ViewController::class, 'adminsHomeView']);
Route::get('/doctorsHome', [ViewController::class, 'doctorsHomeView']);


Route::post('/login', [ViewController::class, 'login']);