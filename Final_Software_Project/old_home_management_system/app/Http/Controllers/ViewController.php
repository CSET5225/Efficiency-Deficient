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

    public function rosterview(){
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
}