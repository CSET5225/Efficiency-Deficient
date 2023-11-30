<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $fillable = [
        "scheduled_date",
        "group_id",
        "supervisor_id",
        "doctor_id",
        "caregiver_id"
    ];
}
