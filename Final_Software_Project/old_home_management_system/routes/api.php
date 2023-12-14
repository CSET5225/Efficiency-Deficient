<?php

use App\Http\Controllers\RegistrationControllerApi;
use App\Http\Controllers\RosterControllerAPI;
use App\Http\Controllers\RoleControllerAPI;
use App\Http\Controllers\appointmentControllerAPI;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('register', RegistrationControllerApi::class);

Route::resource('newRoster', RosterControllerAPI::class);

Route::resource('addRole', RoleControllerAPI::class);

Route::resource('addAppointment', appointmentControllerAPI::class);
