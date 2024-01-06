<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('user.index.component.head')
</head>

<body>
    @include('sweetalert::alert')
    <div class="main-wrapper">
        <header class="header-area">
            @include('user.index.component.nav')
        </header>
        <div class="login-register-area pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <form action="{{ route('xl-forgot-password') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Thay đổi mật khẩu</legend>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                        <div>
        @endif
        <input class="form-control" type="hidden" name="id" value="{{$id}}">
        <div class="row mt-10">
            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="new-pwd" class="required">Mật khẩu
                        mới</label>
                    <input name="new_password" type="password"
                        class="form-control @error('new_password') is-invalid @enderror"
                        id="newPasswordInput" />
                    @error('new_password')
                        <span class="text-danger">{{ $message }}<span>
                            @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-input-item">
                    <label for="confirm-pwd" class="required">Xác nhận
                        mật khẩu mới</label>
                    <input name="new_password_confirmation" type="password" class="form-control"
                        id="confirmNewPasswordInput" />
                </div>
            </div>
        </div>
    </fieldset>
    <div class="single-input-item mt-10">
        <button class="btn btn-danger " type="submit">Lưu</button>
    </div>
</form>
                    </div>
                </div>
            </div>
        </div>

        @include('user.index.component.footer')
    </div>

</body>
@include('assets.js')

</html>
