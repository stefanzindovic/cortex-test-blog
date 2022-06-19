<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(User $user) {
        if($user->id != auth()->user()->id && !auth()->user()->is_admin) {
            return to_route('dashboard');
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {

        if($post->user->id != auth()->user()->id && !auth()->user()->is_admin) {
            return to_route('dashboard');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'min:5', 'max:1024'],
        ]);

        $profilePhoto = $user->picture;

        if($request->hasFile('profile_picture')) {
            $request->profile_picture->store('public/profile_pictures');
            $profilePhoto = 'profile_pictures/' . $request->profile_picture->hashName();
        }

        $user->update([
            'name' =>$request->name,
            'about' => $request->about,
            'picture' => $profilePhoto,
        ]);

        return to_route('dashboard');
    }

    public function destroy(User $user) {
        if(!auth()->user()->is_admin) {
            return to_route('dashboard');
        }

        $user->delete();

        return to_route('admin.users');
    }
}
