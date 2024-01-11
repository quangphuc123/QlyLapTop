@include('user.index.component.head')
@include('assets.css')


<div class="main-wrapper">
    <header class="header-area">
        @include('user.index.component.nav')
    </header>
    @include('user.cart.mini-cart')
    <div class="login-register-area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <form action="{{ route('sendMail') }}" method="POST">
                        @csrf
                        <h3>Nhập địa chỉ email đăng ký của bạn :</h3>
                        <input type="email" placeholder="email" name="email">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" class="mt-10 btn btn-danger"> Gửi mail </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.index.component.footer')
@include('assets.js')


</html>
