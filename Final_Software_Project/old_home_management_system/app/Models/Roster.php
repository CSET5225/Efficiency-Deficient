<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "scheduled_date",
        "group_id",
        "supervisor_id",
        "doctor_id",
        "caregiver1_id",
        "caregiver2_id",
        "caregiver3_id",
        "caregiver4_id"
    ];
}
