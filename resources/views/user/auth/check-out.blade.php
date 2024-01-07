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
        @include('user.cart.mini-cart')
        <!-- Start -->


        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">Thanh Toán </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="checkout-main-area pt-30 pb-120">
            <div class="container">
                <?php
                try{
                    $check = Auth::user()->id;
                ?>
                <?php
                    }catch(Exception $e){
                ?>
                <div class="customer-zone mb-20">
                    <p class="cart-page-title">Nếu bạn đã có tài khoản?
                        Bạn phải đăng nhập mới được thanh toán
                        <a class="checkout-click1" href="#" style="color:red"> Đăng nhập</a>
                    </p>
                    <div class="checkout-login-info">
                        <form action="{{ route('xl-dang-nhap') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="sin-checkout-login">
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
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="sin-checkout-login">
                                        <input type="password" name="password" placeholder="Mật khẩu"
                                            class="@error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="button-remember-wrap">
                                <button class="button" type="submit">Đăng nhập</button>
                            </div>
                            <div class="lost-password">
                                <a href="{{ route('forgotPassword') }}">Quên mật khẩu?</a>
                            </div>
                        </form>
                        @if (session('error'))
                            <p>{{ session('error') }}</p>
                        @endif
                    </div>
                </div>
                <?php } ?>
                @auth
                    <form action="{{ route('pay.vnpay') }}" name="redirect" method="POST">
                        @csrf
                        <div class="checkout-wrap pt-30">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="billing-info-wrap mr-50">
                                        <h3>Thông tin khách hàng</h3>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-20">
                                                    <label>Họ tên<abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="billing-info mb-20">
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info mb-20">
                                                    <label>Số điện thoại<abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="number" name="phone" value="{{ Auth::user()->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info mb-20">
                                                    <label>Email<abbr class="required" title="required">*</abbr></label>
                                                    <input type="email" name="email" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-20">
                                                    <label>Địa chỉ <abbr class="required" title="required">*</abbr></label>
                                                    <input class="billing-address"
                                                        placeholder="House number and street name" type="text"
                                                        name="address" value="{{ Auth::user()->address }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="your-order-area">
                                        <h3>Đơn hàng của bạn</h3>
                                        <div class="your-order-wrap gray-bg-4">
                                            <div class="your-order-info-wrap">
                                                <div class="your-order-info">
                                                    <ul>
                                                        <li>Sản phẩm <span>Thành tiền</span></li>
                                                    </ul>
                                                </div>
                                                <?php $total = 0; ?>
                                                <?php
                                                $total = 0;
                                                $symbol = 'đ';
                                                $symbol_thousand = '.';
                                                $decimal_place = 0;
                                                $stt = 0;
                                                ?>
                                                <div class="your-order-middle">
                                                    <ul>
                                                        @foreach ($carts as $id => $cartItem)
                                                            <?php $total += $cartItem['price'] * $cartItem['quantity']; ?>
                                                            <li>
                                                                {{ $cartItem['name'] }} X {{ $cartItem['quantity'] }}
                                                                <span>{{ number_format($cartItem['price'] * $cartItem['quantity'], $decimal_place, '', $symbol_thousand) . $symbol }}
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="your-order-info order-total">
                                                    <ul>
                                                        <li>Tổng hóa đơn
                                                            <span>{{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="payment-method">
                                                <div class="pay-top sin-payment sin-payment-3">
                                                    <input id="payment-method-4" class="input-radio" type="radio"
                                                        name="payment_method" value="1">
                                                    <label for="payment-method-4">VNPay</label>
                                                    <div class="payment-box payment_method_bacs">
                                                        <p>Bạn sẽ dùng thẻ để thanh toán.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Place-order">
                                            <button type="submit" name="redirect" class="btn btn-danger">
                                                Thanh Toán Ngay
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endauth
            </div>
        </div>
        @include('user.index.component.footer')
        @include('assets.js')
    </div>
</body>

</html>
