<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Support\Facades\Auth;


class PortfolioController extends Controller
{
    public function list()
    {
        return view('admin.portfolio.list');
    }

    public function add()
    {
        return view('admin.portfolio.create');
    }
}
