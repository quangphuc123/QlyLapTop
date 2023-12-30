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
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('dashboard.index')->with('success', 'Đã đăng nhập thành công!!');
        // }
        // return redirect()->route('auth.admin')
        //     ->with('error', 'Thông tin của bạn nhập chưa chính xác, Vui lòng thử lại!');
        if(Auth::attempt($credentials)&&(Auth::user()->user_catalogue_id==3)){
            return redirect()->route('trang-chu')->with('success', 'Đăng nhập vào trang người dùng');
        }
        else if(Auth::attempt($credentials)&&(Auth::user()->user_catalogue_id==1)){
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập vào trang Admin');
        }
        return redirect()->route('auth.admin')->with('success', 'Đăng nhập không thành công!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('auth.admin');
    }
}
