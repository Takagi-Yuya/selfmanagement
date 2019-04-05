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
        $user = User::where('id', $request->id)->first();
        $profile = Profile::where('user_id', $user->id)->first();
        $other_users = User::where('id', '!=', $user->id)->get();

        $follow_count = 0;
        $follower_count = 0;

        foreach ($other_users as $other_user){
            if ($user->isFollowing($other_user->id) && $other_user->isFollowing($user->id)) {
                $follow_count = $follow_count + 1;
                $follower_count = $follower_count + 1;
            } elseif ($user->isFollowing($other_user->id)) {
                $follow_count = $follow_count + 1;
            } elseif ($other_user->isFollowing($user->id)) {
                $follower_count = $follower_count + 1;
            }
        }

        return view('admin.other_user_profile.show', ['profile' => $profile, 'user' => $user, 'other_users' => $other_users, 'follower_count' => $follower_count, 'follow_count' => $follow_count]);
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        if ($follower->id == $user->id) {
            return back()->withError("You can't follow yourself");
        }
        if(!$follower->isFollowing($user->id)) {
            $follower->follow($user->id);

            return back()->withSuccess("You are now friends with {$user->name}");
        }
        return back()->withError("You are already following {$user->name}");
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }

}
