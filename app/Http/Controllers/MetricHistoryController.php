<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetricHistoryController extends Controller
{
    public function index () 
    {
        return view('pages.metric-history');
    }
}
