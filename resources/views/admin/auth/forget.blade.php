@extends('admin.auth.login')
@section('title', 'Quên Mật Khẩu')

@section('content')
<h2>Quên mật khẩu</h2>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="#">
            <h1>QUÊN MẬT KHẨU</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
            </div>
            <span>Sử dụng tài khoản của bạn</span>
            <input type="email" placeholder="Tài khoản" />
            <input type="password" placeholder="Mật khẩu" />
            <a href="#">Quên mật khẩu?</a>
            <button>Đăng nhập</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Chào mừng bạn!</h1>
                <p>Vui lòng nhập nhập lại thông tin</p>
                <button class="ghost" id="signIn">Đăng Nhập</button>
            </div>
        </div>
    </div>
</div>

@endsection
