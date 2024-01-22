<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outpass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'hostel_id', 'hostel_floor_id', 'outpass_id', 'destination', 'outpass_type', 'purpose', 'start_date_time', 'end_date_time', 'parent_permission'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDurationAttribute()
    {
        $startDate = Carbon::parse(date('Y-m-d H:i:s', strtotime($this->start_date_time)));
        $endDate = Carbon::parse(date('Y-m-d H:i:s', strtotime($this->end_date_time)));

        $interval = $startDate->diff($endDate);

        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;
        $hours = $interval->h % 24;
        $minutes = $interval->i;

        $str = '';

        if ($years > 0) {
            $str .= $years . ' Years ';
        }
        if ($months > 0) {
            $str .= $months . ' Months ';
        }
        if ($days > 0) {
            $str .= $days . ' Days ';
        }
        if ($hours > 0) {
            $str .= $hours . ' Hours ';
        }
        if ($minutes > 0) {
            $str .= $minutes . ' Minutes';
        }

        return trim($str);
    }
}
