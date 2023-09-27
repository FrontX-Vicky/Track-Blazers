<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement_system extends Model
{
    use HasFactory;
    protected $table = "measurement_system";
    protected $primaryKey = "id";
}
