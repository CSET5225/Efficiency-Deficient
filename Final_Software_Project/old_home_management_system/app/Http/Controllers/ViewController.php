<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
        'p.patient_id',
        'comment', 'scheduled_date',
        'morning_meds.medicine_name AS morning_medicine',
        'afternoon_meds.medicine_name AS afternoon_medicine',
        'night_meds.medicine_name AS night_medicine'
        )
        ->where('scheduled_date', '<', now())
        ->orderBy('p.patient_id')
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
            'p.patient_id', 'comment', 'scheduled_date',
            'morning_meds.medicine_name AS morning_medicine',
            'afternoon_meds.medicine_name AS afternoon_medicine',
            'night_meds.medicine_name AS night_medicine'
    )
    ->where('scheduled_date', '=', $current_date)
    ->orderBy('p.patient_id')
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
    
    public function doctorsDashboardView(){
        return view("doctorDashboard");
    }
    
    public function caregiversHomeView(){
        return view("caregiversHome");
    }
    
    public function doctorsHomeView(){
        $pastHistory = $this->pastPatientAppointments();
        $currentHistory = $this->presentPatientAppointments();
        return view("doctorsHome", compact('pastHistory', 'currentHistory'));
    }
    
    public function doctorPatientsView(Request $request){
        $data = DB::table('patient_medications as pm')
        ->leftJoin('patients as p', 'pm.patient_id', 'p.patient_id')
        ->leftJoin('medications as morning_meds', 'pm.morning_medicine', 'morning_meds.medicine_id')
        ->leftJoin('medications as afternoon_meds', 'pm.afternoon_medicine', 'afternoon_meds.medicine_id')
        ->leftJoin('medications as night_meds', 'pm.night_medicine', 'night_meds.medicine_id')
        ->select('p.patient_id', 'p.first_name', 'p.last_name', 'pm.medicine_date', 'pm.comment',
         'morning_meds.medicine_name AS morning_medicine',
         'afternoon_meds.medicine_name AS afternoon_medicine',
         'night_meds.medicine_name AS night_medicine')
         ->where('medicine_date', '<', now())
         ->where('p.patient_id', '=', $request->patient_id)
         ->get();

        //  $medicine = DB::table('patient_medications as pm')
        //  ->join('medications as m', 'm.medicine_name', 'medicine_name')

         return view("doctorPatients", compact('data'));
    }

    public function addMoreMeds(Request $request){
        $morning_medicine_name = $request->morningMedicine;
        $afternoon_medicine_name = $request->afternoonMedicine;
        $night_medicine_name = $request->nightMedicine;
        
        DB::table('patient_medications as pm')->insert([
            'medicine_date' => $request->comment,
            'comment' => $request->comment,
            'morning_medicine' => $request->comment,
            'afternoon_medicine' => $request->comment,
            'night_medicine' => $request->comment
        ]);
    }

    public function getAdmins(){
        return DB::table('admins as a')
        ->join('roles as r', 'r.role_id', '=', 'a.role_id')
        ->select('admin_id', 'first_name', 'last_name', 'role_name', 'salary')
        ->get();
    }

    public function getCaregivers(){
        return DB::table('caregivers as c')
        ->join('roles as r', 'r.role_id', '=', 'c.role_id')
        ->select('caregiver_id', 'first_name', 'last_name', 'role_name', 'salary')
        ->get();
    }

    public function getSupervisors(){
        return DB::table('supervisors as s')
        ->join('roles as r', 'r.role_id', '=', 's.role_id')
        ->select('supervisor_id', 'first_name', 'last_name', 'role_name', 'salary')
        ->get();
    }

    public function getDoctors(){
        return DB::table('doctors as d')
        ->join('roles as r', 'r.role_id', '=', 'd.role_id')
        ->select('doctor_id', 'first_name', 'last_name', 'role_name', 'salary')
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
            "SELECT employee_id, first_name, last_name, role_name, salary
            FROM roles as r
            JOIN admins a on r.role_id = a.role_id
            JOIN caregivers c ON r.role_id = c.role_id
            JOIN supervisors s ON r.role_id = s.role_id
            JOIN doctors d ON r.role_id = d.role_id
            WHERE id = ? AND full_name = ? AND role_name = ? AND salary = ?",
            [$request->emp_id],
            [$request->first_name],
            [$request->last_name],
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

    public function patientView(){
        $patients = DB::table('patients')
        ->select("patient_id", DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), "DOB", "emergency_contact", "admission_date")
        ->get();
        return view('Patients', ["patients"=>$patients]);
    }
    public function familyHomeView()
    {
        $a = [];
        return view('familyMembers_home', compact('a'));
}

public function familyView()
{
    $a = [];
    return view('familyMember_home', compact('a'));
}


public function famlyMembers(Request $request){
    $familyCode = $request->input('family_code');
    $patientId = $request->input('patient_id');

    $a = DB::select("
        SELECT
            patients.patient_id,
            CONCAT(doctors.first_name, ' ', doctors.last_name) AS doctors_name,
            appointments.scheduled_date AS doctors_appointments,
            CONCAT(caregivers.first_name, ' ', caregivers.last_name) AS caregivers_name,
            patients_medications.morning_medicine,
            patients_medications.afternoon_medicine,
            patients_medications.night_medicine,
            food.food_id AS food
        FROM
            patients
            JOIN appointments ON patients.patient_id = appointments.patient_id
            JOIN doctors ON doctors.doctor_id = appointments.doctor_id
            JOIN caregivers ON caregivers.patient_id = patients.patient_id
            LEFT JOIN patients_medications ON patients.patient_id = patients_medications.patient_id
            LEFT JOIN food ON patients.food_id = food.food_id
        WHERE
            patients.patient_id = '$patientId' AND
            patients.family_code = '$familyCode'
    ");
    
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
                    'food_id' => $patient->food,
                ];
    }

    return view('familyMember_home', ['a' => $patientData, ]);
}
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:12']
        ]);
    }

    public function rosterInfoShow(){
        $doctor = DB::SELECT("SELECT doctor_id FROM doctors");
        $caregiver = DB::SELECT("SELECT caregiver_id FROM caregivers");
        $supervisor = DB::SELECT("SELECT supervisor_id FROM supervisors");
        $group = DB::SELECT("SELECT group_id FROM patient_groups");

        return view("newRoster",["doctor_id"=>$doctor, "caregiver_id"=>$caregiver, "supervisor_id"=>$supervisor, "group_id"=>$group]);
    }

    public function rosterViewInfo(Request $request){
        $data = DB::SELECT("SELECT * FROM rosters ORDER BY scheduled_date DESC");
        return view("roster", ["data"=>$data],["info"=>$data[0]]);
    }

    public function getRosterInfo(Request $request){
        $date = strtotime($request->scheduled_date);
        $date = date('Y-m-d', $date);
        $data = DB::SELECT("SELECT * FROM rosters WHERE scheduled_date = '$request->scheduled_date'");

        if($data != NULL){
            return view("roster", ["data"=>$data], ["info"=>$data[0]]);
        }
        else{
            $data = DB::SELECT("SELECT * FROM rosters ORDER BY scheduled_date DESC");
            return view("roster", ["data"=>$data],["info"=>$data[0]]);
        }
    }

    public function patientAddInfoView(Request $request){
        $data = DB::SELECT("SELECT * FROM patients");
        return view("patientAdditionalInfo", ["data"=>$data], ["info"=>$data[0]]);
    }

    public function getPatientInfo(Request $request){
        $data = DB::SELECT("SELECT * FROM patients WHERE patient_id = '$request->patientID'");
        return view("patientAdditionalInfo", ["data"=>$data], ["info"=>$data[0]]);
    }

    public function appointmentInfoView(Request $request){
        $patientData = DB::SELECT("SELECT * FROM patients");
        $doctorData = DB::SELECT("SELECT * FROM doctors");
        return view("doctorsAppointment", compact('patientData', 'doctorData'));
    }
}