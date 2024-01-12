<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('user.index.component.head')
</head>

<body>
    <div class="main-wrapper">
        <header class="header-area">
            @include('user.index.component.nav')
        </header>
        <div class="login-register-area pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> Đăng nhập </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> Đăng ký </h4>
                                </a>
                            </div>

                            <!-- FORM ĐĂNG NHẬP -->
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{ route('xl-dang-nhap') }}" method="post">
                                                @csrf
                                                <div>
                                                    <input name="email" placeholder="Email" type="email"
                                                        class="@error('email') is-invalid @enderror">
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    @if (session('message1'))
                                                        <div class="alert alert-danger">{{ @session('message1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <input type="password" name="password" placeholder="Mật khẩu"
                                                        class="@error('password') is-invalid @enderror">
                                                    @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <a href="{{ route('forgotPassword') }}">Quên mật khẩu?</a>
                                                    </div>
                                                    <button type="submit">Đăng nhập</button>
                                                </div>
                                            </form>
                                            @if (session('error'))
                                                <p>{{ session('error') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <!-- FORM ĐĂNG KÝ -->
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{ route('xl-dang-ky') }}" enctype="multipart/form-data"
                                                method="post">
                                                @csrf
                                                <div>
                                                    <input name="email" placeholder="Email" type="email"
                                                        class="@error('email') is-invalid @enderror">
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    @if (session('message1'))
                                                        <div class="alert alert-danger">{{ @session('message1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <input type="text" name="name" placeholder="Họ và tên"
                                                        class="@error('name') is-invalid @enderror">
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    @if (session('message'))
                                                        <div class="alert alert-danger">{{ @session('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <input type="password" name="password" placeholder="Mật khẩu"
                                                        class="@error('password') is-invalid @enderror">
                                                    @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <input type="password" name="confirm_password"
                                                        placeholder="Xác nhận mật khẩu"
                                                        class="@error('confirm_mat_khau') is-invalid @enderror">
                                                    @error('confirm_password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="button-box">
                                                    <button type="submit">Đăng ký</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.index.component.footer')
    </div>
    @include('assets.js')
</body>

</html>
