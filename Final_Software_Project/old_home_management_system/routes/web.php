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

Route::get('/registration', [ViewController::class,  'registrationFormView']);
Route::get('/familyMembers_home', [ViewController::class,  'familyMember']);

