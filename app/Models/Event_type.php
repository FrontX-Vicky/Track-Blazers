<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_type extends Model
{
    use HasFactory;
    protected $table = "event_types";
    protected $primaryKey = "id";
}
