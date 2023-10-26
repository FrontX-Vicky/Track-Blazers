<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreTableGridV2 extends Model
{
    use HasFactory;
    protected $table = "score_table_grid_v2";
    protected $primaryKey = "id";
    public $timestamps = false;
}
