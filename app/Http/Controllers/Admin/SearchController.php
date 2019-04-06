<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherQuestion;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $questions = OtherQuestion::where('question', 'like', "%$keyword%");

            $questions_user = OtherQuestion::whereHas('user', function ($query) use ($keyword)
            {
                $query->where('name', 'like', "%$keyword%");
            });

            $questions_profile = OtherQuestion::whereHas('profile', function ($query) use ($keyword)
            {
                $query->where('name', 'like', "%$keyword%");
            });

            $questions = $questions->union($questions_user)->union($questions_profile)->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $questions = OtherQuestion::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('admin.timeline.index', ['questions' => $questions, 'keyword' => $keyword, 'user' => $user]);
    }
}
