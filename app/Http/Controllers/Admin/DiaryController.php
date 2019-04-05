<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diary;
use Illuminate\Support\Facades\Auth;


class DiaryController extends Controller
{
    public function list()
    {
        $diaries = Diary::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.diary.list', ['diaries' => $diaries]);
    }

    public function add()
    {
        return view('admin.diary.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Diary::$rules);

        $diaries = new Diary;
        $user = Auth::user();
        $diaries->user_id = $user->id;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $diaries->image_path = basename($path);
        } else {
            $diaries->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $diaries->fill($form);
        $diaries->save();

        return redirect('admin\diary\list');
    }

    public function edit(Request $request)
    {
        $diary = Diary::where('id', $request->id)->first();

        return view('admin.diary.edit', ['diary_form' => $diary]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Diary::$rules);

        $diary = Diary::where('id', $request->id)->first();
        $diary_form = $request->all();

        if (isset($diary_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $diary->image_path = basename($path);
            unset($diary_form['image']);
        }

        if (isset($request->remove)) {
            $diary->image_path = null;
            unset($diary_form['remove']);
        }

        unset($diary_form['_token']);

        $diary->fill($diary_form);
        $diary->save();

        return redirect('admin\diary\list');

    }

    public function delete(Request $request)
    {
        $diary = Diary::where('id', $request->id)->delete();

        return redirect('admin\diary\list');
    }

}
