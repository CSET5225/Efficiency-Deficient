<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medication extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "medicine_id",
        "medicine_name"
     ] ;
}
