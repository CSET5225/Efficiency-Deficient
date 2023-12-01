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
        
}