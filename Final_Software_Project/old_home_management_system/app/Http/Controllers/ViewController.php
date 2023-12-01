<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;

class ViewController extends Controller
{
    public function registrationFormView(){
        return view("registration_form");
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