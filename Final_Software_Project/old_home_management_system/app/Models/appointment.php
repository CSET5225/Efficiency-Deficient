<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "appointment_id",
        "patient_id",
        "doctor_id",
        "scheduled_date"
     ] ;
}
