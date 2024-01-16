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
        @include('user.cart.mini-cart')

        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="{{ route('trang-chu') }}">Home</a>
                        </li>
                        <li class="active">Thông tin liên hệ </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-area pt-115 pb-120">
            <div class="container">
                <div class="contact-info-wrap-3 pb-85">
                    <h3>Thông tin liên hệ</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info-3 text-center mb-30">
                                <i class="icon-location-pin "></i>
                                <h4>Địa chỉ</h4>
                                <p>65 Huỳnh Thúc Kháng, phường Bến Nghé, Q1, Tp,HCM </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info-3 extra-contact-info text-center mb-30">
                                <ul>
                                    <li><i class="icon-screen-smartphone"></i> (+035) 252 4200</li>
                                    <li><i class="icon-envelope "></i> <a href="#">HandSomeStore@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info-3 text-center mb-30">
                                <i class="icon-clock "></i>
                                <h4>Hỗ trợ 24/7</h4>
                                <p>Sẵn sàng phục vụ quý khách</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="get-in-touch-wrap">
                    <h3>LIÊN HỆ VỚI CHÚNG TÔI</h3>
                    <div class="contact-from contact-shadow">
                        <form action="{{ route('report') }}" method="post">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <input name="tieu_de" type="text" placeholder="Tiêu đề">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <textarea name="noi_dung_report" placeholder="Nội dung"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button class="submit" type="submit">GỬI</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>

        @include('user.index.component.footer')
    </div>
    @include('assets.js')
    @include('assets.cart')


</body>

</html>
