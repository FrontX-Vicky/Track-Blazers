<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoretable extends Model
{
    use HasFactory;
    protected $table = "score_table_v1";
    protected $primaryKey = "id";
}
