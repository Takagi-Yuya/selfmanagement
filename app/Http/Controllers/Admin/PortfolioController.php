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
        $user = Auth::user();
        $portfolio = Portfolio::find($user->id);

        return view('admin.portfolio.list', ['portfolio' => $portfolio]);
    }

    public function add()
    {
        return view('admin.portfolio.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Portfolio::$rules);

        $portfolio = new Portfolio;
        $user = Auth::user();
        $portfolio->user_id = $user->id;
        $form = $request->all();

        unset($form['_token']);

        $portfolio->fill($form)->save();

        return redirect('admin\portfolio\list');
    }
}
