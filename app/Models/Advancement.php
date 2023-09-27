<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advancement extends Model
{
    use HasFactory;
    protected $table = "advancement";
    protected $primaryKey = "id";
}
