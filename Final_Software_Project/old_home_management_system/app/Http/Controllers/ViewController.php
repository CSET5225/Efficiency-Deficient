<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\patient;
use App\Models\supervisor;
use App\Models\caretaker;
use App\Models\admin;
use App\Models\doctor;
use App\Models\Roster;

class ViewController extends Controller
{
    public function registrationFormView(){
    $family_code = $this->generateCode();
    return view("registration_form",["family_code"=>$family_code]);
    }

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

    public function registrationApprovalShow(){
        $query = DB::select("SELECT first_name, last_name, email , role_id, approved
                             FROM patients
                             WHERE approved IS NULL
                             UNION
                             SELECT first_name, last_name, email, role_id, approved
                             FROM admins
                             WHERE approved IS NULL
                             UNION
                             SELECT first_name, last_name, email,  role_id, approved
                             FROM caregivers
                             WHERE approved IS NULL
                             UNION
                             SELECT first_name, last_name, email, role_id, approved
                             FROM doctors
                             WHERE approved IS NULL
                             UNION
                             SELECT first_name, last_name, email,  role_id, approved
                             FROM supervisors
                             WHERE approved IS NULL");
        return view("registrationApproval",["query"=>$query]);
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:12']
        ]);
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

    public function rosterInfoShow(){
        $doctor = DB::SELECT("SELECT doctor_id FROM doctors");
        $caregiver = DB::SELECT("SELECT caregiver_id FROM caregivers");
        $supervisor = DB::SELECT("SELECT supervisor_id FROM supervisors");
        $group = DB::SELECT("SELECT group_id FROM patient_groups");

        return view("newRoster",["doctor_id"=>$doctor, "caregiver_id"=>$caregiver, "supervisor_id"=>$supervisor, "group_id"=>$group]);
    }

    public function rosterViewInfo(Request $request){
        $data = DB::SELECT("SELECT * FROM rosters ORDER BY scheduled_date DESC");
        return view("roster", ["data"=>$data],["info"=>$data[0]]);
    }

    public function getRosterInfo(Request $request){
        $date = strtotime($request->scheduled_date);
        $date = date('Y-m-d', $date);
        $data = DB::SELECT("SELECT * FROM rosters WHERE scheduled_date = '$request->scheduled_date'");

        if($data != NULL){
            return view("roster", ["data"=>$data], ["info"=>$data[0]]);
        }
        else{
            $data = DB::SELECT("SELECT * FROM rosters ORDER BY scheduled_date DESC");
            return view("roster", ["data"=>$data],["info"=>$data[0]]);
        }
    }
}