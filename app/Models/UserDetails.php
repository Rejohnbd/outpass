<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'hostel_id'
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
