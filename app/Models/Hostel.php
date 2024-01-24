<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

    public function floors()
    {
        return $this->hasMany(HostelFloor::class);
    }

    public function outpass()
    {
        return $this->hasMany(Outpass::class);
    }
}
