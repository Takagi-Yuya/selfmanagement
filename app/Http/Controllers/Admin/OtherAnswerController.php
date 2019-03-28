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
        $question = OtherQuestion::with(['user', 'profile'])->where('id', $request->id)->first();
        $answers = OtherAnswer::with(['user', 'profile'])->where('question_id', $request->id)->orderBy('updated_at', 'desc')->get();
        $user = Auth::user();

        return view('admin.timeline.show', ['question' => $question, 'answers' => $answers, 'user' => $user]);
    }

    public function add(Request $request)
    {
        $question = OtherQuestion::where('id', $request->id)->first();

        return view('admin.timeline.create', ['question' => $question]);
    }

    public function create(Request $request)
    {
        $this->validate($request, OtherAnswer::$rules);

        $answer = new OtherAnswer;
        $user = Auth::user();
        $answer->user_id = $user->id;
        $answer->question_id = $request->question_id;
        $form = $request->all();

        unset($form['_token']);

        $answer->fill($form)->save();

        return redirect('admin\timeline\index');
    }

    public function edit(Request $request)
    {
        $answer = OtherAnswer::where('id', $request->id)->first();
        $question = OtherQuestion::where('id', $request->id2)->first();

        return view('admin.timeline.edit', ['answer_form' => $answer, 'question' => $question]);
    }

    public function update(Request $request)
    {
        $this->validate($request,OtherAnswer::$rules);

        $answer = OtherAnswer::where('id', $request->id)->first();
        $answer_form = $request->all();

        unset($answer_form['_token']);

        $answer->fill($answer_form)->save();

        return redirect('admin\timeline\index');
    }

    public function delete(Request $request)
    {
        $answers = OtherAnswer::where('id', $request->id)->delete();

        return redirect('admin\timeline\index');
    }


}
