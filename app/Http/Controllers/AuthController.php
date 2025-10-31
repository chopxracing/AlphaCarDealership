<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(){

        return view('auth.login');
    }
    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($data)){
            return redirect('/profile');
        }
        return back()->withErrors(['email' => 'Неверные данные']);
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function showRegistrationForm(){
        return view('auth.register');
    }
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect('/login')->withErrors('status', 'Регистрация успешна');

    }
    public function showProfile(){
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }
    public function updateProfile(){
        $data = request()->validate([
            'name' => 'string|max:255',
            'phone' => 'string|max:255|min:10',
            'email' => 'string|email|max:255|unique:users,email,'.Auth::id(),
        ]);
        $user = Auth::user();
        $user->update($data);

        return redirect('/profile');
    }
    public function showChangePasswordForm(){
        return view('auth.change-password');

    }
    public function changePassword(Request $request){
        $data = $request->validate([
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|confirmed|min:8',
        ]);
        $user = Auth::user();

        if (!Hash::check($data['current_password'], $user->password)){
            return back()->withErrors('current_password');

        }
        $user->password = Hash::make($data['new_password']);
        $user->save();
        return redirect('/profile')->with('status', 'Пароль изменен');
    }

}
