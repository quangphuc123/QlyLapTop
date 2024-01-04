@section('title', 'Đăng Nhập')
<!DOCTYPE html>

<head>
    <title>HandSome - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('login-fontend/css/style1.css') }}" rel='stylesheet' type='text/css' />

    <link href="{{ asset('backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-Zz02GFon3zj9YFz+Yz88LXyKJ3T2VJf+/TP2JzQ/8tbdbUpXq9eO+LKFnLXZ+Wo8aCp6iHxWdGg2HYI1/eq20w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <h2>HandSome Store</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="post">
                @csrf
                <h1>Đăng ký</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                </div>
                <span>Đăng ký bằng Email hoặc FaceBook

                </span>
                <input type="text" placeholder="Tên của bạn" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Mật khẩu của bạn" />
                <button>Đăng Ký</button>
            </form>
        </div>


        {{-- phần này của đăng nhập  --}}
        <div class="form-container sign-in-container">
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <h1>ĐĂNG NHẬP</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                </div>
                <span>Sử dụng tài khoản của bạn</span>
                <input type="text" placeholder="Tài khoản" name="email" value="{{ old('email') }}" />
                @if ($errors->has('email'))
                    <span class="error-message">
                        * {{ $errors->first('email') }}
                    </span>
                @endif
                <input type="password" placeholder="Mật khẩu" name="password" />
                @if ($errors->has('password'))
                    <span class="error-message">
                        * {{ $errors->first('password') }}
                    </span>
                @endif
                <a href="#">Quên mật khẩu?</a>
                <button>Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng bạn trở lại!</h1>
                    <p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Đăng Nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    {{-- <button class="ghost" id="signUp">Đăng Ký</button> --}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.dashboard.component.scrip')
</body>

</html>
