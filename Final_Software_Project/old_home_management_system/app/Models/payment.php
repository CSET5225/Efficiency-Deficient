<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "payment_id",
        "patient_id",
        "amount_owned"
     ] ;
}
