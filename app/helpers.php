<?php

use App\Models\Outpass;

if (!function_exists('count_nofications')) {
    function count_nofications()
    {
        if (auth()->user()->user_type == 'client') {
            return Outpass::where('user_id', auth()->user()->id)->whereIn('status', [1, 2])->where('notification_status', '!=', 2)->count();
        } else if ((auth()->user()->user_type == 'incharge')) {
            return Outpass::where('hostel_id', auth()->user()->incharge->hostel_id)->where('hostel_floor_id', auth()->user()->incharge->hostel_floor_id)->where('status', 0)->count();
        } else if ((auth()->user()->user_type == 'subadmin')) {
            return Outpass::where('hostel_id', auth()->user()->subadmin->hostel_id)->where('status', 0)->count();
        } else {
            return Outpass::where('status', 0)->count();
        }
    }
}

if (!function_exists('nofications_list')) {
    function nofications_list()
    {
        if (auth()->user()->user_type == 'client') {
            $notifications = Outpass::where('user_id', auth()->user()->id)->whereIn('status', [1, 2])->where('notification_status', '!=', 2)->get();
            $listNotification = "";
            foreach ($notifications as $notification) {
                if ($notification->status == 1) {
                    $status = '<b class="text-success">Approved</b>';
                } else {
                    $status = '<b class="text-danger">Rejected</b>';
                }
                $listNotification .= '<div class="media new clearNotifi" data-id="' . $notification->id . '"><div class="media-body"><p>Dear <strong>' . auth()->user()->name . '</strong> your <strong>' . $notification->outpass_id . '</strong> outpass has been ' . $status . '</p></div></div>';
            }
            return $listNotification;
        } else if ((auth()->user()->user_type == 'incharge')) {
            $notifications = Outpass::where('hostel_id', auth()->user()->incharge->hostel_id)->where('hostel_floor_id', auth()->user()->incharge->hostel_floor_id)->where('status', 0)->get();
            $listNotification = "";
            foreach ($notifications as $notification) {
                $listNotification .= '<div class="media new reLoad"><div class="media-body"><p><strong>' . $notification->user->name . '</strong> requested <strong>' . $notification->outpass_id . '</strong> outpass is <b class="text-warning">Pending</b> status.</p></div></div>';
            }
            return $listNotification;
        } else if ((auth()->user()->user_type == 'subadmin')) {
            $notifications =  Outpass::where('hostel_id', auth()->user()->subadmin->hostel_id)->where('status', 0)->get();
            $listNotification = "";
            foreach ($notifications as $notification) {
                $listNotification .= '<div class="media new reLoad"><div class="media-body"><p><strong>' . $notification->user->name . '</strong> requested <strong>' . $notification->outpass_id . '</strong> outpass is <b class="text-warning">Pending</b> status.</p></div></div>';
            }
            return $listNotification;
        } else {
            $notifications = Outpass::where('status', 0)->whereDate('created_at', '=', date('Y-m-d'))->get();
            $listNotification = "";
            foreach ($notifications as $notification) {
                $listNotification .= '<div class="media new reLoad"><div class="media-body"><p><strong>' . $notification->user->name . '</strong> requested <strong>' . $notification->outpass_id . '</strong> outpass is <b class="text-warning">Pending</b> status.</p></div></div>';
            }
            return $listNotification;
        }
    }
}
