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

    
    public function familyHomeView(Request $request)
    {
        $userInputPatientId = $request->input('patient_id');

        $a = DB::select("
            SELECT
                patients.patient_id,
                CONCAT(doctors.first_name, ' ', doctors.last_name) AS doctors_name,
                appointments.scheduled_date AS doctors_appointments,
                CONCAT(caregivers.first_name, ' ', caregivers.last_name) AS caregivers_name,
                patients_medications.morning_medicine,
                patients_medications.afternoon_medicine,
                patients_medications.night_medicine,
                food.food_id AS breakfast,
                food.food_id AS lunch,
                food.food_id AS dinner
            FROM
                patients
                JOIN appointments ON patients.patient_id = appointments.patient_id
                JOIN doctors ON doctors.doctor_id = appointments.doctor_id
                JOIN caregivers ON caregivers.patient_id = patients.patient_id
                LEFT JOIN patients_medications ON patients.patient_id = patients_medications.patient_id
                LEFT JOIN food ON patients.food_id = food.food_id
            WHERE
                patients.patient_id = $userInputPatientId
        "
    );
        
        $patientData = [];
        
        foreach ($a as $patient) {
            $patientData[] = [
                'patient_id' => $patient->patient_id,
                'doctors_name' => $patient->doctors_name,
                'doctors_appointments' => $patient->doctors_appointments,
                'caregivers_name' => $patient->caregivers_name,
                'morning_medicine' => $patient->morning_medicine,
                'afternoon_medicine' => $patient->afternoon_medicine,
                'night_medicine' => $patient->night_medicine,
                'breakfast' => $patient->breakfast,
                'lunch' => $patient->lunch,
                'dinner' => $patient->dinner,
            ];
        }
        
        return view('familyMembers_home', ['a' => $patientData]);
    }
        
        
    }
