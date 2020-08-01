<?php

use Illuminate\Support\Facades\Log;

function sessionData()
{
    try {
        $sessionUserData = DB::table('managements')
            ->where('id', session()->get('user_id'))
            ->get()
            ->first();
        return $sessionUserData;
    } catch (\Exception $e) {
        Log::error($e);
    }
}