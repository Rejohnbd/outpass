<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostelFloor extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(UserDetails::class);
    }
}
