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
        $user = Auth::user();
        $profile = Profile::find($user->id);
        $users = User::where('id', '!=', $user->id)->get();

        return view('admin.profile.list', ['profile' => $profile, 'users' => $users]);
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

        unset($form['_token']);
        unset($form['image']);

        $profile->fill($form);
        $profile->save();

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

        $profile -> fill($profile_form);
        $profile -> save();

        return redirect('admin/profile/list');
    }

}
