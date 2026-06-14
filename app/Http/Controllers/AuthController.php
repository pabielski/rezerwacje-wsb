<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function loginView()
    {
        return view('auth.login', [
            'title' => 'Logowanie'
        ]);
    }

    public function registerView()
    {
        return view('auth.register', [
            'title' => 'Rejestracja'
        ]);
    }

    public function register(Request $request)
    {
        $this->userService->registerUser($request);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $isLogged = $this->userService->loginUser($request);

        if ($isLogged) {
            return redirect('/');
        }
    
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        $this->userService->logoutUser($request);

        return redirect('/login');
    }
}