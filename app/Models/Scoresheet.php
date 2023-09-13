<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoresheet extends Model
{
    use HasFactory;
    protected $table = "score_sheet";
    protected $primaryKey = "id";
}
