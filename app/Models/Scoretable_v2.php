<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoretable_v2 extends Model
{
    use HasFactory;
    protected $table = "score_table_v2";
    protected $primaryKey = "id";
}
