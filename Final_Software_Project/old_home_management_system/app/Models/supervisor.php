<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisor extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "supervisor_id",
        "role_id",
        "first_name",
        "last_name",
        "DOB",
        "email",
        "password",
        "salary",
        "approved"
     ] ;
}
