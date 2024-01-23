<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'hostel_id', 'hostel_floor_id'
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    public function hostelFloor()
    {
        return $this->belongsTo(HostelFloor::class);
    }
}
