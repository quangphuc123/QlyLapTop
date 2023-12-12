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
            'password' => $request->input('password')
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index')->with('success', 'Đã đăng nhập thành công!!');
        }
        return redirect()->route('auth.admin')
            ->with('error', 'Thông tin của bạn nhập chưa chính xác, Vui lòng thử lại!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('auth.admin');
    }
}
