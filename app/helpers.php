<?php

use App\Models\Outpass;

if (!function_exists('count_nofications')) {
    function count_nofications()
    {
        if (auth()->user()->user_type == 'client') {
            return Outpass::where('user_id', auth()->user()->id)->where('status', 1)->whereDate('created_at', '=', date('Y-m-d'))->count();
        } else {
            return Outpass::where('status', 0)->whereDate('created_at', '=', date('Y-m-d'))->count();
        }
    }
}

if (!function_exists('nofications_list')) {
    function nofications_list()
    {
        if (auth()->user()->user_type == 'client') {
            return Outpass::where('user_id', auth()->user()->id)->where('status', 1)->whereDate('created_at', '=', date('Y-m-d'))->get();
        } else {
            return Outpass::where('status', 0)->whereDate('created_at', '=', date('Y-m-d'))->get();
        }
    }
}
