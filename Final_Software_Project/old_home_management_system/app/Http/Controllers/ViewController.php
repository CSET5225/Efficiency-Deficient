<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\patient;
use App\Models\supervisor;
use App\Models\caretaker;
use App\Models\admin;
use App\Models\doctor;

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

    public function familyMemberView(){
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

    public function patientAddInfoView(){
        $data = DB::table('patients')
        ->join('patient_groups', 'patient_groups.group_id', '=', 'patients.group_id')
        ->select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),
        "patient_id",
        "admission_date",
        "patient_groups.group_id")
        ->get();
        // return $data;
        if($data){
            return view("patientAdditionalInfo", ['data' => $data]);
        }
    }

    public function patientInfoConfirmChange(Request $request){
        if($_POST['group']){
            $group_id = $request->validate([
                'patient_id' => ['required'],
                'group_id' => ['required']
            ]);
            DB::table('patient_groups')->insert([
                'group_id' => $group_id
            ]);
            DB::table('patients')
            ->where('group_id', '=', $group_id)
            ->update(['group_id' => $group_id]);

        }
        
        if($_POST['patientID'] = ""){
            return "Please select a field!";
        }
    }
    
    // public function patientInfoConfirmChange(Request $request){
    //     if(isset($_POST['patientID'])){
    //         $patientID = $request->validate([
    //             'patientID' => ['required']
    //         ]);

    //         $data = DB::table('patients')
    //         ->join('patient_groups', 'patient_groups.group_id', '=', 'patients.group_id')
    //         ->select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),
    //         "admission_date", 
    //         "patient_groups.group_id")
    //         ->where('patient_id', '=', $patientID)
    //         ->first();

    //         if($data){
    //             Carbon::parse($data->admission_date)->format('m/d/Y');
    //             return view("patientAdditionalInfo", compact('data'));
    //         }

    //     }
    // }

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
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:12']
        ]);

    public function doctorPatientsView(){
        return view("doctorPatients");
    }

    public function rosterView(){
        return view("roster");
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