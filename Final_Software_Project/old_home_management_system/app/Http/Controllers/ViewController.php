<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function registrationFormView(){
    $family_code = $this->generateCode();
    return view("registration_form",["family_code"=>$family_code]);
    }

    //Generates the family code
    public function generateCode(){
    $family_code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 10);
    if(DB::select("SELECT 'family_code' FROM Patients WHERE 'family_code' = '$family_code'")){
        return $this->generateCode();
    }
        return $family_code;
    }

    public function familyMember(){
    return view("FamilyMembers_home");
    }

    public function homeView(){
    return view("homePage");
    }

    public function loginView(){
    return view("login");
    }
  
    public function familyHomeView(Request $request){
    $request -> validate([
    'family_code'=>'required',
    'emergency_contact'=>'required',
    ]);
    $person = DB::select(
    'SELECT CONCAT(doctors.first_name, doctors.last_name) 
    AS doctors_name, CONCAT(appointments.scheduled_date,appointments.appointment_id) 
    AS doctors_appointments,
    CONCAT(caregivers.first_name, caregivers.last_name) AS caregivers_name,
    morning_medicine, afternoon_medicine, night_medicine, breakfast, lunch, dinner FROM patients
    JOIN appointments ON patients.appointment_id = appointments.appointment_id
    JOIN doctors ON appointments.doctor_id = doctors.doctor_id
    JOIN caregivers ON patients.caregiver_id = caregivers.caregiver_id; '
    );
    patient::create($person);
    $data = patient::all();
    return view('familyMembers_home',['a'=>$data]);
    }
}