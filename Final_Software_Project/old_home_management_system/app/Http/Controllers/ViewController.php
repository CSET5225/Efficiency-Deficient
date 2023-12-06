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


    public function supervisorHomeView(){
        return view("supervisorHome");
    }

    public function regOrLogin(){
        if(isset($_GET["home-login-button"])){
            return $this->loginView();
        }
        elseif(isset($_GET["home-register-button"])){
            return $this->registrationFormView();
        }
    }
    
    public function patientHomeView(){
        return view("patientsHome");
    }

    public function adminHomeView(){
        return view("adminsHome");
    }

    public function doctorsHomeView(){
        return view("doctorsHome");
    }

    public function doctorsDashboardView(){
        return view("doctorDashboard");
    }

    public function caregiversHomeView(){
        return view("caregiversHome");
    }

    public function doctorPatientsView(){
        return view("doctorPatients");
    }

    public function rosterView(){
        return view("roster");

}
    public function newRosterview(){
        return view("newRoster");
    }

    public function adminReport(){
        return view('adminReport');
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:12']
        ]);
>>>>>>>>> Temporary merge branch 2

    public function doctorPatientsView(){
        return view("doctorPatients");
    }

    public function rosterView(){
        return view("roster");
    }
    
<<<<<<<<< Temporary merge branch 1
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
=========
    

        
>>>>>>>>> Temporary merge branch 2
}