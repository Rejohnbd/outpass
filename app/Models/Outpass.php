<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outpass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'outpass_id', 'outpass_type', 'purpose', 'start_date_time', 'end_date_time', 'parent_permission'
    ];
}
