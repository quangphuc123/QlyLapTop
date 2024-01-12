<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }
    public function Index()
    {
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        }
        return view('admin.auth.login');
    }

    public function Login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'publish' => 2
        ];
        if (Auth::attempt($credentials) && Auth::user()->user_catalogue_id == 3 && Auth::user()->publish == 2) {
            return redirect()->route('trang-chu')->with('success', 'Đăng nhập thành công');
        } else if (Auth::attempt($credentials) && Auth::user()->user_catalogue_id == 1 && Auth::user()->publish == 2) {
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập vào trang Admin');
        }
        return redirect()->route('auth.admin')->with('error', 'Đăng nhập không thành công!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('auth.admin');
    }
}
