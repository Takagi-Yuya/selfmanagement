<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;


class OtherUserProfileController extends Controller
{
    public function show(Request $request)
    {
        $other_user = User::where('id', $request->id)->first();
        $other_profile = Profile::where('user_id', $other_user->id)->first();

        return view('admin.other_user_profile.show', ['other_profile' => $other_profile]);

        //$users = User::where('id', '!=', auth()->user()->id)->get();
        //return view('users.index', ['users' => $users]);
    }
}
