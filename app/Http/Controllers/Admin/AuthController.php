<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.auth');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $authCredentials = $request->only('login', 'password');

        if (auth()->attempt($authCredentials))
            return redirect()->route('admin.home');

        return redirect()->back()->with('fail', 'Неверный логин либо пароль');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login.index');
    }
}
