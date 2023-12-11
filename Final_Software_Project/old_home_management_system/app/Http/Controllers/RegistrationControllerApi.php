<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\patient;
use Illuminate\Support\Facades\DB;
use App\Models\caregiver;
use App\Models\doctor;
use App\Models\supervisor;
use App\Models\admin;

class RegistrationControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(isset($_POST['register_button'])){

            $data = request()->all();

            if ($this->emailExists($data['email'])) {
                echo "<script>alert('Email already exists. Please use a different email address.');</script>";
                return view("homePage"); 

            if($data['role_id']==1){
                patient::create($data);
                echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
                return view("/login");
            }
            if($data['role_id']==2){
                caregiver::create($data);
                echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
                return view("/login");
            }
            if($data['role_id']==3){
                doctor::create($data);
                echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
                return view("/login");
            }
            if($data['role_id']==4){
                supervisor::create($data);
                echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
                return view("/login");
            }
            if($data['role_id']==5){
                admin::create($data);
                echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
                return view("/login");
            }
            
        }
    }
    }
    public function emailExists($email)
{
    $user = DB::table('patients')->where('email', $email)->first();
    return $user !== null;
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(isset($_POST['accountApprove'])){ 
            $data = $request->all();
            if($data['role_id']==1){
                //DB::table('table_name')->select('column_name')->where('column name','=',value)->get();
                $account = DB::table('patients')->where('email', $data['email'])->update(['approved' => 1]);
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==2){
                $account = DB::table('caregivers')->where('email', $data['email'])->update(['approved' => 1]);
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==3){
                $account = DB::table('doctors')->where('email', $data['email'])->update(['approved' => 1]);
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==4){
                $account = DB::table('supervisors')->where('email', $data['email'])->update(['approved' => 1]);
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==5){
                $account = DB::table('admins')->where('email', $data['email'])->update(['approved' => 1]);
                return redirect()->back()->with('Account has been approved successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if(isset($_POST['accountDelete'])){
            $data = $request->all();
            if($data['role_id']==1){
                $account = patient::where('email', $data['email'])->delete();;
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==2){
                $account = caregiver::where('email', $data['email'])->delete();;
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==3){
                $account = doctor::where('email', $data['email'])->delete();;
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==4){
                $account = supervisor::where('email', $data['email'])->delete();;
                return redirect()->back()->with('Account has been approved successfully!');
            }
            if($data['role_id']==5){
                $account = admin::where('email', $data['email'])->delete();;
                return redirect()->back()->with('Account has been approved successfully!');
            }
        }
    }
}
