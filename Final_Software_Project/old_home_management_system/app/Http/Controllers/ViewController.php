<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function registrationFormView(){
        return view("registration_form");
    }

    public function homeView(){
        return view("homePage");
    }
    
    public function loginView(){
        return view("login");
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
