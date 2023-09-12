<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athletes extends Model
{
    use HasFactory;

    protected $table = "athletes";
    protected $primaryKey = "id";

}
