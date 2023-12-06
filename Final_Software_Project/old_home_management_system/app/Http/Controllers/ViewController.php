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
        $patients = Patient::join('appointments', 'appointments.appointment_id', '=', 'appointments.appointment_id')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.doctor_id')
            ->join('caregivers', 'caregivers.caregiver_id', '=', 'caregivers.caregiver_id')
            ->select(
                'patients.patient_id',
                DB::raw('CONCAT(doctors.first_name, " ", doctors.last_name) AS doctors_name'),
                DB::raw('CONCAT(appointments.scheduled_date, appointments.appointment_id) AS doctors_appointments'),
                DB::raw('CONCAT(caregivers.first_name, " ", caregivers.last_name) AS caregivers_name'),
            )
            ->get();

        foreach ($patients as $patient) {
            Patient::create([
                'patient_id' => $patient->patient_id,
                'full_name' => $patient->doctors_name,
                'doctors_appointments' => $patient->doctors_appointments,
                'caregivers_name' => $patient->caregivers_name,
                'morning_medicine' => $patient->morning_medicine,
                'afternoon_medicine' => $patient->afternoon_medicine,
                'night_medicine' => $patient->night_medicine,
                'breakfast' => $patient->breakfast,
                'lunch' => $patient->lunch,
                'dinner' => $patient->dinner,
            ]);
        }
      
        $data = Patient::all();
        return view('familyMembers_home', ['a' => $data]);
    }
        
        
}