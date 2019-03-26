<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherQuestion;
use App\OtherAnswer;
use Illuminate\Support\Facades\Auth;


class OtherQuestionController extends Controller
{
    public function list()
    {
        $questions = OtherQuestion::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();

        return view('admin.other.list', ['questions' => $questions]);
    }

    public function index()
    {
        $questions = OtherQuestion::orderBy('created_at', 'desc')->get();

        return view('admin.timeline.index', ['questions' => $questions]);
    }

    public function add()
    {
        return view('admin.other.create');
    }

    public function create(Request $request) //これから作成
    {
        return view('admin.other.list');
    }

    public function edit(Request $request) //これから作成
    {
        return view('admin.other.list');
    }

    public function update(Request $request) //これから作成
    {
        return view('admin.other.list');
    }

    public function delete(Request $request)
    {
        $question = OtherQuestion::where('id', $request->id)->delete();
        $answers = OtherAnswer::where('question_id', $request->id)->delete();

        return redirect('admin\other\list');
    }


}
