<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caregiver extends Model
{
    use HasFactory;

    protected $fillable = [
        "caregiver_id",
        "role_id",
        "first_name",
        "last_name",
        "DOB",
        "email",
        "salary",
        "approved"
     ] ;
}
