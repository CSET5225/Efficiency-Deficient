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
use App\Models\Roster;

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
        ->orderBy('scheduled_date')
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
    ->orderBy('scheduled_date')
    ->get();
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
        ->orderBy('scheduled_date')
        ->get();
        return view("doctorsHome", compact('pastHistory', 'currentHistory'));
    }
    
    public function doctorsHomeView(){
        $pastHistory = $this->pastPatientAppointments();
        $currentHistory = $this->presentPatientAppointments();
        return view("doctorsHome", compact('pastHistory', 'currentHistory'));
    }

    public function doctorsDashboardView(){
        return view("doctorDashboard");
    }

    public function caregiversHomeView(){
        return view("caregiversHome");
    }

    public function doctorPatientsView(){
        // $data = DB::table('appointments AS a')
        // ->join('doctors AS d', 'd.doctor_id', '=', 'a.doctor_id')
        // ->join('patients AS p', 'p.patient_id', '=', 'a.patient_id')
        // ->join('patient_medications as pm', 'pm.patient_id', '=', 'p.patient_id')
        // ->join('medications as morning_meds', 'pm.morning_medicine', '=', 'morning_meds.medicine_id')
        // ->join('medications as afternoon_meds', 'pm.afternoon_medicine', '=', 'afternoon_meds.medicine_id')
        // ->join('medications as night_meds', 'pm.night_medicine', '=', 'night_meds.medicine_id')
        // ->select('scheduled_date', 'comment', 'morning_meds.medicine_name AS morning_medicine',
        // 'afternoon_meds.medicine_name AS afternoon_medicine',
        // 'night_meds.medicine_name AS night_medicine')
        // ->first();
        
        return view("doctorPatients");
    }

    public function getAdmins(){
        return DB::table('admins as a')
        ->join('roles as r', 'r.role_id', '=', 'a.role_id')
        ->select('admin_id', DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), 'role_name', 'salary')
        ->get();
    }

    public function getCaregivers(){
        return DB::table('caregivers as c')
        ->join('roles as r', 'r.role_id', '=', 'c.role_id')
        ->select('caregiver_id', DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), 'role_name', 'salary')
        ->get();
    }

    public function getSupervisors(){
        return DB::table('supervisors as s')
        ->join('roles as r', 'r.role_id', '=', 's.role_id')
        ->select('supervisor_id', DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), 'role_name', 'salary')
        ->get();
    }

    public function getDoctors(){
        return DB::table('doctors as d')
        ->join('roles as r', 'r.role_id', '=', 'd.role_id')
        ->select('doctor_id', DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), 'role_name', 'salary')
        ->get();
    }
    
    public function employeeListView(){
        $adminData = $this->getAdmins();
        $caregiverData = $this->getCaregivers();
        $supervisorData = $this->getSupervisors();
        $doctorData = $this->getDoctors();
        
        return view("employeeList",
        compact('adminData', 'caregiverData', 'supervisorData', 'doctorData'));
    }

    public function employeeSearch(Request $request){
        // DB::select('SELECT * FROM employee where employeeId = ? AND employeeName = ?', [$request->employeeID], [$request->employeeName]);

        return DB::select(
            "SELECT r.role_id, CONCAT(first_name, ' ', last_name) AS full_name, role_name, salary
            FROM roles as r
            JOIN admins a on r.role_id = a.role_id
            JOIN caregivers c ON r.role_id = c.role_id
            JOIN supervisors s ON r.role_id = s.role_id
            JOIN doctors d ON r.role_id = d.role_id
            WHERE id = ? AND full_name = ? AND role_name = ? AND salary = ?",
            [$request->emp_id],
            [$request->emp_name],
            [$request->emp_role],
            [$request->emp_salary]);
    }
    
    public function updateSalary(Request $request){
        $updateData = $request->validate([
            'empID' => 'required',
            'role_name' => 'required',
            'newSalary' => 'required'
        ]);

        if($updateData['role_name'] == 'Admin' || $updateData['role_name'] == 'admin'){
            $tableName = 'Admins';
            $id = 'admin_id';
        }
        elseif($updateData['role_name'] == 'Doctor' || $updateData['role_name'] == 'doctor'){
            $tableName = 'Doctors';
            $id = 'doctor_id';
        }
        elseif($updateData['role_name'] == 'Supervisor' || $updateData['role_name'] == 'supervisor'){
            $tableName = 'Supervisors';
            $id = 'supervisor_id';
        }
        elseif($updateData['role_name'] == 'Caregiver' || $updateData['role_name'] == 'caregiver'){
            $tableName = 'Caregivers';
            $id = 'caregiver_id';
        }
        else{
            $errorMessage = 'The role '. $updateData['role_name'] . ' does not exist.';
            return $this->employeeListView()->with('errorMessage', $errorMessage);
        }

        if($tableName){
            $dataCheck = DB::table($tableName)
            ->where($id, $updateData['empID'])
            ->exists();
            if($dataCheck){
                if(!empty($updateData['newSalary'])){

                    DB::table($tableName)
                    ->where($id, $updateData['empID'])
                    ->update(['salary' => $updateData['newSalary']]);
                    
                    $personData = DB::table($tableName)
                    ->where($id, $updateData['empID'])
                    ->select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), 'salary')
                    ->first();
                    
                    $successMessage = $personData->full_name. "'s salary has been updated to $". $personData->salary;
                    return $this->employeeListView()->with('successMessage', $successMessage);
                }
                else{
                    $errorMessage = 'The new salary is empty!';
                    return $this->employeeListView()->with('errorMessage', $errorMessage);
                }
            }
            else{
                $errorMessage = 'The employee id of '. $updateData['empID']. ' does not exist';
                return $this->employeeListView()->with('errorMessage', $errorMessage);
            }
        }
        if(isset($_POST['cancel_button'])){
            return $this->employeeListView();
        }
    }
    
    public function addNewMeds(){
        
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