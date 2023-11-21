<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "admin_id",
        "role_id",
        "first_name",
        "last_name",
        "DOB",
        "email",
        "salary",
        "approved"
     ] ;
}
