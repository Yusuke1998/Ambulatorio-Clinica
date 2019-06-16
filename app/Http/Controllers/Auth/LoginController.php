<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\config;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        $configuracion = config::first();
        return view('auth.login',compact('configuracion'));
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/clinica';
        // modificar
    }

    public function username()
    {
        return 'username';
    }
    
    protected $redirectTo = '/clinica';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
