<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight_order extends Model
{
    use HasFactory;
    protected $table = "flight_orders";
    protected $primaryKey = "id";
}
