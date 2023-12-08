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

    public function patientSearch(Request $request){
        $data = DB::table('patients')
        ->join('patient_groups', 'patient_groups.group_id', '=', 'patients.group_id')
        ->select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"),
        "patient_id",
        "admission_date",
        "patient_groups.group_id")
        ->get();

        $id = $request->input('patientID');
        $firstName = DB::SELECT("SELECT first_name FROM patients WHERE patient_id = $id");
        $group = DB::SELECT("SELECT p.group_id FROM patients p JOIN patient_groups pg ON pg.group_id = p.group_id WHERE patient_id = $id");

        return view('patientAdditionalInfo', ['data' => $data], ['patientName' => $firstName],  ['group_id' => $group]);
    }

    public function adminHomeView(){
        return view("adminsHome");
    }

    public function pastPatientAppointments(){
        return DB::table('appointments')
        ->join('patients as p', 'p.patient_id', '=', 'appointments.patient_id')
        ->join('doctors as d', 'd.doctor_id', '=', 'appointments.doctor_id')
        ->join('patient_medications as pm', 'pm.patient_id', '=', 'p.patient_id')
        ->leftJoin('medications as morning_meds', 'pm.morning_medicine', '=', 'morning_meds.medicine_id')
        ->leftJoin('medications as afternoon_meds', 'pm.afternoon_medicine', '=', 'afternoon_meds.medicine_id')
        ->leftJoin('medications as night_meds', 'pm.night_medicine', '=', 'night_meds.medicine_id')
        ->select(
            DB::raw("CONCAT(p.first_name, ' ', p.last_name) AS patient_name"),
            'comment', 'scheduled_date',
            'morning_meds.medicine_name AS morning_medicine',
            'afternoon_meds.medicine_name AS afternoon_medicine',
            'night_meds.medicine_name AS night_medicine'
    )
        ->where('scheduled_date', '<', now())
        ->get();
    }

    public function presentPatientAppointments(){
        $current_date = Carbon::now()->format('Y-m-d');
        return DB::table('appointments')
        ->join('patients as p', 'p.patient_id', '=', 'appointments.patient_id')
        ->join('doctors as d', 'd.doctor_id', '=', 'appointments.doctor_id')
        ->join('patient_medications as pm', 'pm.patient_id', '=', 'p.patient_id')
        ->join('medications as morning_meds', 'pm.morning_medicine', '=', 'morning_meds.medicine_id')
        ->join('medications as afternoon_meds', 'pm.afternoon_medicine', '=', 'afternoon_meds.medicine_id')
        ->join('medications as night_meds', 'pm.night_medicine', '=', 'night_meds.medicine_id')
        ->select(
            DB::raw("CONCAT(p.first_name, ' ', p.last_name) AS patient_name"),
            'comment', 'scheduled_date',
            'morning_meds.medicine_name AS morning_medicine',
            'afternoon_meds.medicine_name AS afternoon_medicine',
            'night_meds.medicine_name AS night_medicine'
    )
    ->where('scheduled_date', '=', $current_date)
    ->get();
    }
    
    
    public function doctorsHomeView(){
        $pastHistory = $this->pastPatientAppointments();
        $currentHistory = $this->presentPatientAppointments();
        return view("doctorsHome", compact('pastHistory'), compact('currentHistory'));
    }

    public function appointmentFilter(Request $request){
        $pastHistory = $this->pastPatientAppointments();
        $current_date = Carbon::now()->format('Y-m-d');

        $appointmentDate = $request->input('date');
        
        $currentHistory = DB::table('appointments')
        ->join('patients as p', 'appointments.patient_id', '=', 'p.patient_id')
        ->select(DB::raw("CONCAT(p.first_name, ' ', p.last_name) AS patient_name"), 'scheduled_date')
        ->where('scheduled_date', '>=', $current_date)
        ->where('scheduled_date', '<', $appointmentDate)
        ->get();
        
        return view("doctorsHome", compact('pastHistory'), compact('currentHistory'));
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