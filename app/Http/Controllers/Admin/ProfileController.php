<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function list()
    {
        $auth_user = Auth::user();
        $profile = Profile::find($auth_user->id);
        $users = User::where('id', '!=', $auth_user->id)->get();

        $follow_count = 0;
        $follower_count = 0;

        foreach ($users as $user){
            if ($auth_user->isFollowing($user->id) && $user->isFollowing($auth_user->id)) {
                $follow_count = $follow_count + 1;
                $follower_count = $follower_count + 1;
            } elseif ($auth_user->isFollowing($user->id)) {
                $follow_count = $follow_count + 1;
            } elseif ($user->isFollowing($auth_user->id)) {
                $follower_count = $follower_count + 1;
            }
        }

        return view('admin.profile.list', ['profile' => $profile, 'users' => $users, 'auth_user' => $auth_user, 'follower_count' => $follower_count, 'follow_count' => $follow_count]);
    }

    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $user = Auth::user();
        $profile->user_id = $user->id;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }

        unset($form['_token'],$form['image']);
        //unset($form['image']);

        $profile->fill($form)->save();

        return redirect('admin/profile/list');
    }

    public function edit(Request $request)
    {
        $profile = Profile::find($request->user_id);

        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->user_id);
        $profile_form = $request->all();

        if (isset($profile_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
            unset($profile_form['image']);
        }

        if (isset($request->remove)) {
            $profile->image_path = null;
            unset($profile_form['remove']);
        }

        unset($profile_form['_token']);

        $profile->fill($profile_form)->save();

        return redirect('admin/profile/list');
    }

}
