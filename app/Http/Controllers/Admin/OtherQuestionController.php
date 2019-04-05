<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherQuestion;
use App\OtherAnswer;
use App\Profile;
use Illuminate\Support\Facades\Auth;


class OtherQuestionController extends Controller
{
    public function list()
    {
        $questions = OtherQuestion::with(['other_answers', 'profile', 'user', 'profile'])->where('user_id', Auth::id())->orderBy('updated_at', 'desc')->paginate(5);

        return view('admin.other.list', ['questions' => $questions]);
    }

    public function index()
    {
        $questions = OtherQuestion::with(['other_answers', 'profile'])->orderBy('created_at', 'desc')->paginate(5);
        $user = Auth::user();

        return view('admin.timeline.index', ['questions' => $questions, 'user' => $user]);
    }

    public function add()
    {
        return view('admin.other.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, OtherQuestion::$rules);

        $question = new OtherQuestion;
        $user = Auth::user();
        $question->user_id = $user->id;
        $form = $request->all();

        unset($form['_token']);

        $question->fill($form)->save();

        return redirect('admin\other\list');
    }

    public function edit(Request $request)
    {
        $question = OtherQuestion::where('id', $request->id)->first();

        return view('admin.other.edit', ['question_form' => $question]);
    }

    public function update(Request $request)
    {
        $this->validate($request, OtherQuestion::$rules);

        $question = OtherQuestion::where('id', $request->id)->first();
        $question_form = $request->all();

        unset($question_form['_token']);

        $question->fill($question_form)->save();

        return redirect('admin\other\list');
    }

    public function delete(Request $request)
    {
        $question = OtherQuestion::where('id', $request->id)->delete();
        $answers = OtherAnswer::where('question_id', $request->id)->delete();

        return redirect('admin\other\list');
    }


}
