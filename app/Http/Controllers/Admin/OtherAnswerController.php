<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherAnswer;
use Illuminate\Support\Facades\Auth;


class OtherAnswerController extends Controller
{
    public function show()
    {
        return view('admin.timeline.show');
    }
}
