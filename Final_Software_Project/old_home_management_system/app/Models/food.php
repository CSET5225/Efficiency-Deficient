<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "food_id",
        "meal_name",
        "calories",
        "food_type",
        "allergens"
     ] ;
}
