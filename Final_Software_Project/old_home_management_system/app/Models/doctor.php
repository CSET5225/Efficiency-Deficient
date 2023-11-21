<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
// class User extends Authenticatable
// {
// use HasApiTokens, HasFactory, Notifiable;
// }


class doctor extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "doctor_id",
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
