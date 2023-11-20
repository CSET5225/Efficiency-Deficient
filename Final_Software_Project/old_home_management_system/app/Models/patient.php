<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        "patient_id",
        "role_id",
        "first_name",
        "last_name",
        "D.O.B",
        "emergency_contact",
        "email",
        "addmission_date",
        "group_id",
        "family_code",
        "approved"
     ] ;
}
