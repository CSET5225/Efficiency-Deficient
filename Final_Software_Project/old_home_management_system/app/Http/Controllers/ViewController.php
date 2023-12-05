<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

    public function patientAddInfoView(){
        return view("patientAdditionalInfo");
    }

    public function patientSearch(Request $request){
        if(isset($_POST['patientID'])){
            $patientID = $request->validate([
                'patientID' => ['required']
            ]);

            $data = DB::table('patients')
            ->join('patient_groups', 'patient_groups.group_id', '=', 'patients.group_id')
            ->select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), "admission_date", "patient_groups.group_id")
            ->where('patient_id', '=', $patientID)
            ->first();

            if($data){
                Carbon::parse($data->admission_date)->format('m/d/Y');
                return view("patientAdditionalInfo", compact('data'));
            }

        }
        if(isset($_POST['patient_add_info_cancel'])){
            return view("patientAdditionalInfo");
        }
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


    public function rosterview(){
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

        $role_id = DB::table('roles')
        ->join('admins', 'roles.role_id', '=', 'admins.role_id')
        ->join('caregivers', 'roles.role_id', '=', 'caregivers.role_id')
        ->join('patients', 'roles.role_id', '=', 'patients.role_id')
        ->join('doctors', 'roles.role_id', '=', 'doctors.role_id')
        ->join('supervisors', 'roles.role_id', '=', 'supervisors.role_id')
        ->select('roles.role_id')
        ->where('admins.email', '=', $credentials['email'])
        ->orWhere('caregivers.email', '=', $credentials['email'])
        ->orWhere('patients.email', '=', $credentials['email'])
        ->orWhere('doctors.email', '=', $credentials['email'])
        ->orWhere('supervisors.email', '=', $credentials['email'])
        ->first();

        if($this->$role_id = 1){
            
            return $this->patientHomeView();
        }
        elseif($this->$role_id = 2){
            return $this->caregiversHomeView();
        }
        elseif($this->$role_id = 3){
            return $this->doctorsHomeView();
        }
        elseif($this->$role_id = 4){
            // return $this->familyHomeView([DB::select('family_code')]);
        }
        elseif($this->$role_id = 5){
            return $this->adminHomeView();
        }
        return "Sorry, this account does not exist.";
    }
    
    
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

}