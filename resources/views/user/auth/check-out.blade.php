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
                                        $check=Auth::user()->id;
                                 ?>
                <?php
                                    }catch(Exception $e){
                                ?>
                <div class="customer-zone mb-20">
                    <p class="cart-page-title">Nếu bạn đã có tài khoản? <a class="checkout-click1" href="#"
                            style="color:red"> Đăng nhập</a></p>
                    <div class="checkout-login-info">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="sin-checkout-login">
                                        <label>Email<span>*</span></label>
                                        <input type="text" name="user-name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="sin-checkout-login">
                                        <label>Mật khẩu<span>*</span></label>
                                        <input type="password" name="user-password">
                                    </div>
                                </div>
                            </div>
                            <div class="button-remember-wrap">
                                <button class="button" type="submit">Đăng nhập</button>
                            </div>
                            <div class="lost-password">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>

                <div class="checkout-wrap pt-30">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing-info-wrap mr-50">
                                <h3>Thông tin khách hàng</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Họ tên<abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Email<abbr class="required" title="required">*</abbr></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Địa chỉ <abbr class="required" title="required">*</abbr></label>
                                            <input class="billing-address" placeholder="House number and street name"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="additional-info-wrap mt-0">
                                    <label>Ghi chú</label>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>
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
                                                    <li>{{ $cartItem['name'] }} X {{ $cartItem['quantity'] }}
                                                        <span>{{ number_format($cartItem['price'] * $cartItem['quantity'], $decimal_place, '', $symbol_thousand) . $symbol }}
                                                        </span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-total">
                                            <ul>
                                                <li>Tổng hóa đơn
                                                    <span>{{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }}
                                                    </span></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="Place-order">
                                    <form action="{{ route('pay.vnpay') }}" method="POST">
                                        @csrf
                                        <button type="submit" name="redirect" class="primary-btn checkout-btn">Thanh Toán Ngay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- END -->
        <@include('user.index.component.footer') </div>
            @include('assets.js')
</body>

</html>
