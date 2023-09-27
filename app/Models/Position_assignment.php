<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position_assignment extends Model
{
    use HasFactory;
    protected $table = "position_assignments";
    protected $primaryKey = "id";
}
