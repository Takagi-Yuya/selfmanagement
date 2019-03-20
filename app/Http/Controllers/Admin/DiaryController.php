<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class DiaryController extends Controller
{
    public function list()
    {
        return view('admin.diary.list');
    }
}
