<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalysisController extends Controller
{
    public function list()
    {
        return view('admin.analysis.list');
    }
}
