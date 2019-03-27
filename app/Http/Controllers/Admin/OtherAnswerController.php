<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherAnswer;
use App\OtherQuestion;
use App\Profile;
use Illuminate\Support\Facades\Auth;


class OtherAnswerController extends Controller
{
    public function show(Request $request)
    {
        $question = OtherQuestion::where('id', $request->id)->first();
        $answers = OtherAnswer::where('question_id', $request->id)->orderBy('updated_at', 'desc')->get();

        return view('admin.timeline.show', ['question' => $question, 'answers' => $answers]);
    }

    public function add(Request $request)
    {
        $question = OtherQuestion::where('id', $request->id)->first();

        return view('admin.timeline.create', ['question' => $question]);
    }

    public function create()
    {
        return view('admin.timeline.create');
    }
}
