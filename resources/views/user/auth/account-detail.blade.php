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

        <!-- my account wrapper start -->
        <div class="my-account-wrapper pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#account-info" class="active" data-toggle="tab"><i
                                                class="fa fa-user"></i>
                                            Thông tin tài khoản</a>

                                        <a href="#changepassword" data-toggle="tab"><i
                                                class="fa fa-cart-arrow-down"></i> Đổi mật khẩu</a>

                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn
                                            hàng</a>

                                        <a href="{{ route('logOut') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->
                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Thông tin tài khoản</h3>
                                                <style>
                                                    .inputstyle {
                                                        color: grey;
                                                        font-style: italic;
                                                    }
                                                </style>
                                                <div class="account-details-form">
                                                    @include('user.auth.account-information')
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="changepassword" role="tabpanel">
                                            <div class="myaccount-content">
                                                @include('user.auth.change-password')
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>

                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Hóa đơn</th>
                                                                <th>Ngày đặt hàng</th>
                                                                <th>Trạng thái đơn hàng</th>
                                                                <th>Tổng đơn hàng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order as $key => $val)
                                                                @if ($val->user_id == Auth::user()->id)
                                                                    <tr>
                                                                        <td>{{ $val->id }}</td>
                                                                        <td>{{ $val->created_at->format('d/m/Y') }}</td>
                                                                        <td>{{ $val->status }}</td>
                                                                        <td>{{ number_format($val->total) }} đ</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->



        @include('user.index.component.footer')
    </div>
    @include('assets.js')

</body>

</html>
