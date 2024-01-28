<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function hostelFloor()
    {
        return $this->belongsTo(HostelFloor::class);
    }

    public function getAvatar()
    {
        return Storage::disk('s3')->url('uploads/' . auth()->user()->userDetails->picture);
    }

    public function getAvaterUrl($imagePatch)
    {
        return Storage::disk('s3')->url('uploads/' . $imagePatch);
    }
}
