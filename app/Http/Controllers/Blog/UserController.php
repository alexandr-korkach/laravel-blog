<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function loginPage(){
        return view('user.login');
    }


    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(isset($request->remember)){
            $remember = true;
        }else{
            $remember = false;
        }
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Невірна пошта або пароль.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.page');
    }

    public function registerPage(){
        return view('user.register');
    }

    public function store(RegisterRequest $request){




        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ]);

        session()->flash('success', 'Успішна реєстрація');

        Auth::login($user);

        return redirect()->home();
    }


}
