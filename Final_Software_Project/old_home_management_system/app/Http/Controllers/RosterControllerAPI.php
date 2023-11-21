<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use App\Models\Doctor;
use App\Models\Caregiver;


class RosterControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { //Work in progress, need to implement the ability to create a roster first
        //  $users = DB::table('supervisors') 
        //  ->join('appointments', 'role_id', '=', 'supervisors.role_id')
        //  ->select("CONCAT('first_name', ' ', 'last_name') AS name")
        //  ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
