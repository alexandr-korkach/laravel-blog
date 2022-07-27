<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AvatarRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function index($id){

        $user = User::query()->findOrFail($id);
      if(!Gate::allows('profile', $user)){
            return abort(404);
        }
        return view('user.profile', compact('user'));
    }

    public function setAvatar(AvatarRequest $request, $id){
        $user = User::query()->findOrFail($id);
        if(!Gate::allows('profile', $user)){
            return abort(404);
        }
        $extension = $request->file('avatar')->extension();
        $avatar = $request->file('avatar')->storeAs("img/users/{$user->id}",'avatar.'.$extension, 'public');

        $user->avatar = $avatar;
        $user->save();

        $request->session()->flash('avatar', 'Аватар змінено');

        return redirect()->route('profile', ['id'=> $user->id])->withFragment('#profile');


    }
}
