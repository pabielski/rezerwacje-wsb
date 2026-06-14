<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService{
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'client';
        $user->save();
        return $user;
    }
    public function loginUser(Request $request): bool{
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        $isLogged= Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        if ($isLogged) {
            $request->session()->regenerate();
        }
    
        return $isLogged;
    }
    public function logoutUser(Request $request)
    {
        Auth::logout();

        //Usunięcie sesji użytkownika
        $request->session()->invalidate();

        //Generowanie nowego tokenu sesji -- brak mozluwopsci wykorzystania ponownego nieaktnwych juz formularzy
        $request->session()->regenerateToken();
    }
    }