<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $primaryKey = "id";

    // public function advancement()
    // {
    //     return $this->belongsTo(Advancement::class);
    // }

    // public function eventType()
    // {
    //     return $this->belongsTo(EventType::class);
    // }

    // public function flightOrder()
    // {
    //     return $this->belongsTo(FlightOrder::class);
    // }

    // public function meet()
    // {
    //     return $this->belongsTo(Meet::class, 'meet_id');
    // }

    // public function positionAssignment()
    // {
    //     return $this->belongsTo(PositionAssignment::class);
    // }

    // public function flightAssignment()
    // {
    //     return $this->belongsTo(FlightAssignment::class);
    // }
}
