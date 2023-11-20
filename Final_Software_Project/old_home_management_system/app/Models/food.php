<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;

    protected $fillable = [
        "food_id",
        "meal-name",
        "calories",
        "food_type",
        "allergens"
     ] ;
}
