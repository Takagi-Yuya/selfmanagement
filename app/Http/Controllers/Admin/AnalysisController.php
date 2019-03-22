<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Analysis;
use Illuminate\Support\Facades\Auth;


class AnalysisController extends Controller
{
    public function list()
    {
        $analyses = Analysis::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();

        return view('admin.analysis.list', ['analyses' => $analyses]);
    }

    public function add()
    {
        return view('admin.analysis.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Analysis::$rules);

        $analyses = new Analysis;
        $user = Auth::user();
        $analyses->user_id = $user->id;
        $form = $request->all();

        unset($form['_token']);

        $analyses->fill($form);
        $analyses->save();

        return redirect('admin\analysis\list');
    }

    public function edit(Request $request)
    {
        $analysis = Analysis::where('id', $request->id)->first();

        return view('admin.analysis.edit', ['analysis_form' => $analysis]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Analysis::$rules);

        $analysis = Analysis::where('id', $request->id)->first();
        $analysis_form = $request->all();

        unset($analysis_form['_token']);

        $analysis->fill($analysis_form);
        $analysis->save();

        return redirect('admin\analysis\list');
    }

    public function delete(Request $request)
    {
      $analysis = Analysis::where('id', $request->id)->delete();

        return redirect('admin\analysis\list');
    }



}
