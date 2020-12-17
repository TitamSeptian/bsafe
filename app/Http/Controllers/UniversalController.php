<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversalController extends Controller
{
    public function dashboard()
    {
    	return view('pages.dashboard');
    }
}
