<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UniversalController extends Controller
{
    public function dashboard()
    {
        $nilai = 0;
        if(Auth::user()->roles == "driver"){
            $nilai = \App\DriverAssignmentAttachment::where("driver_id", Auth::user()->id)->avg('score');
            // dd($nilai);
        }
        $data = [
            "nilai" => $nilai
        ];

    	return view('pages.dashboard', $data);
    }
}
