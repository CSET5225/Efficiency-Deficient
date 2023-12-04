<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\patient;
use App\Models\caregiver;
use App\Models\doctor;
use App\Models\supervisor;
use App\Models\admin;

class loginApplicationController extends Controller
{
    public function loginCheck(Request $request){
        if(isset($_GET['login-ok'])){
            $data = [
                'email'=>$request['email'],
                'password'=>$request['password'],
            ];
            $email = $data['email'];
            $password = $data['password'];


            if(DB::SELECT("SELECT * FROM patients WHERE email = '$email' AND password = '$password'")){
                return view('patientsHome');
            }
            elseif(DB::SELECT("SELECT * FROM admins WHERE email = '$email' AND password = '$password'")){
                return view('adminsHome');
            }
            elseif(DB::SELECT("SELECT * FROM doctors WHERE email = '$email' AND password = '$password'")){
                return view('doctorsHome');
            }
            elseif(DB::SELECT("SELECT * FROM supervisors WHERE email = '$email' AND password = '$password'")){
                return view('supervisorsHome');
            }
            elseif(DB::SELECT("SELECT * FROM caregivers WHERE email = '$email' AND password = '$password'")){
                return view('caregiversHome');
            }
            else{
                echo "<script>alert('Account does not exist with this information');</script>";
                return view('login');
            };
        }
    }
}