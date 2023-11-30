<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\patient;
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

            //This is for all other roles since their columns are the same
            $data = request()->all();

            if($data['role_id']==1){
                patient::create($data);
                // echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
            }
            if($data['role_id']==2){
                caregiver::create($data);
                // echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
            }
            if($data['role_id']==3){
                doctor::create($data);
                // echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
            }
            if($data['role_id']==4){
                supervisor::create($data);
                // echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
            }
            if($data['role_id']==5){
                admin::create($data);
                // echo "<script>alert('Account Has Been Created And Is Now Awaiting Admin Approval');</script>";
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
