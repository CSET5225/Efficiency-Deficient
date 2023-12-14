<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\doctor;
use App\Models\patient;

use App\Models\caregiver;
use App\Models\supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

            if(DB::SELECT("SELECT * FROM patients WHERE email = '$email' AND password = '$password' AND approved = 1")){
                // $approved = DB::table('patients')
                // ->select('*')
                // ->where('password', $password)
                // ->where('email', $email)
                // ->get();

                // foreach($approved[0] as $key => $value){
                //     $_SESSION[$key] = $value;
                // }
                return view('patientsHome');
            }
            elseif(DB::SELECT("SELECT * FROM caregivers WHERE email = '$email' AND password = '$password' AND approved = 1")){
                // $_SESSION['role_id'] = 2;
                return view('caregiversHome');
            }
            elseif(DB::SELECT("SELECT * FROM doctors WHERE email = '$email' AND password = '$password' AND approved = 1")){
                // $_SESSION['role_id'] = 3;
                return view('doctorsHome');
            }
            elseif(DB::SELECT("SELECT * FROM admins WHERE email = '$email' AND password = '$password' AND approved = 1")){
                // $_SESSION['role_id'] = 5;
                return view('adminsHome');
            }
            elseif(DB::SELECT("SELECT * FROM supervisors WHERE email = '$email' AND password = '$password' AND approved = 1")){
                // $_SESSION['role_id'] = 4;
                return view('supervisorHome');
            }
            else{
                echo "<script>alert('Account does not exist with this information');</script>";
                return view('login');
            };
        }
    }

    public function logout(){
        session_destroy(); 
    return view('homePage'); 
    }
}
