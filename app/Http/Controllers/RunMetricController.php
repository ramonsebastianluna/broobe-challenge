<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Strategy;

class RunMetricController extends Controller
{
    public function index() {
        $categories = Category::all();
        $strategies = Strategy::all();

        return view('pages.run-metric', compact('categories', 'strategies'));
    }
}
