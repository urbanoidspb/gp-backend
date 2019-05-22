<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(): View
    {
        return \view('admin.auth');
    }

    public function login(Request $request): RedirectResponse
    {
        $authCredentials = $request->only('login', 'password');

        if (auth()->attempt($authCredentials))
            dd(1);

        return redirect()->back()->with('fail', 'Неверный логин либо пароль');
    }

}
