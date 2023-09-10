<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meets extends Model
{
    use HasFactory;
    protected $table = "meets";
    protected $primaryKey = "id";
}
