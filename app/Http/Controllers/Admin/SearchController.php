<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\OtherQuestion;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $questions = OtherQuestion::where('question', 'like', "%$keyword%")->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $questions = OtherQuestion::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('admin.timeline.index', ['questions' => $questions, 'keyword' => $keyword, 'user' => $user]);
    }
}
