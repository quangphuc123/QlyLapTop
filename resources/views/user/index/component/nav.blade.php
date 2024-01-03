<div class="header-large-device">
    <div class="header-middle header-middle-padding-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2">
                    <div class="logo">
                        <a href="{{ route('trang-chu') }}"><img src="assets/images/logo/Độc Lạ LapTop.png"
                                alt="logo"></a>
                    </div>
                </div>
                <div class="sidebar-widget mb-25">
                    <div class="sidebar-search" style="width: 500px ;padding-left: 100px;">
                        <form class="sidebar-search-form" action="#" style="text-decoration-color: brown;">
                            <input type="text" placeholder="Nhập tên laptop, phụ kiện cần tìm...">
                            <button>
                                <i class="icon-magnifier"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="ml-50">
                    <?php
                        try{
                            $check=Auth::user()->id;
                     ?>
                    <a href="{{ route('accountDetail') }}">
                        <button type="button" class="btn btn-warning bi-person">
                            Tài khoản
                        </button>
                    </a>
                    <?php
                        }catch(Exception $e){
                    ?>
                    <a href="{{ route('loginRegister') }}">
                        <button type="button" class="btn btn-warning bi-person">
                            Đăng nhập
                        </button>
                    </a>
                    <?php } ?>
                </div>
                <div>
                    <a href="{{ route('cart-view') }}">
                        <button type="button" class="btn btn-warning ml-15 bi-cart4">
                            Giỏ hàng
                        </button>
                    </a>
                </div>
                <div>
                    <div class="hotline-2-wrap ml-25">
                        <div class="hotline-2-icon">
                            <i class="blue icon-call-end"></i>
                        </div>
                        <div class="hotline-2-content">
                            <span> Hotline 24/7</span>
                            <h5>0888574030 </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom bg-blue">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="main-categori-wrap main-categori-wrap-modify-2">
                        <a class="categori-show categori-blue" href="#">Danh mục sản phẩm <i
                                class="icon-arrow-down icon-right"></i></a>
                        <div class="category-menu-2 category-menu-2-blue categori-hide categori-not-visible-2">
                            <nav>
                                <ul>
                                    <li><a href="shop.html"><i class="bi-laptop"></i> Laptop</a></li>
                                    <li><a href="shop.html"><i class="bi-cpu"></i> Linh kiện PC - Máy
                                            tính</a></li>
                                    <li><a href="shop.html"><i class="bi-headphones"></i> Phụ kiện máy
                                            tính</a></li>
                                    <li><a href="shop.html"><i class="bi-tools"></i> Bảo hành - Hậu mãi</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-menu main-menu-white main-menu-padding-1 main-menu-font-size-14 main-menu-lh-5">
                        <nav>
                            <ul>
                                <li><a href="{{ route('trang-chu') }}">Trang chủ </a></li>
                                <li><a href="#">Thương hiệu</a>
                                    {{-- <ul class="sub-menu-style">
                                        <li><a href="about-us.html">about us </a></li>
                                        <li><a href="cart.html">cart page</a></li>
                                        <li><a href="checkout.html">checkout </a></li>
                                        <li><a href="my-account.html">my account</a></li>
                                        <li><a href="wishlist.html">wishlist </a></li>
                                        <li><a href="compare.html">compare </a></li>
                                        <li><a href="contact.html">contact us </a></li>
                                        <li><a href="order-tracking.html">order tracking</a></li>
                                        <li><a href="login-register.html">login / register </a></li>
                                    </ul> --}}
                                </li>
                                <li><a href="blog.html">Bài viết</a>
                                    {{-- <ul class="sub-menu-style">
                                        <li><a href="blog.html">blog standard </a></li>
                                        <li><a href="blog-no-sidebar.html">blog no sidebar </a></li>
                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul> --}}
                                </li>
                                <li><a href="~/shop/norda/contact.html">Liên hệ </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="header-action header-action-flex pr-20">
                        {{-- <div class="same-style-2 same-style-2-white same-style-2-font-dec">
                            <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
                        </div> --}}
                        <div class="same-style-2 same-style-2-white same-style-2-font-dec header-cart">
                            <a class="cart-active" href="#">
                                {{-- <php
                                $total = 0;
                                $symbol = 'đ';
                                $symbol_thousand = '.';
                                $decimal_place = 0;
                                $stt = 0;
                                ?>

                                @if (!is_null($carts))
                                    @foreach ($carts as $id => $cartItem)
                                        <div class="same-style-2 header-cart">
                                            <a class="cart-active" href="#">
                                                <i class="icon-basket-loaded"></i>
                                                <span class="pro-count red">
                                                    02
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif --}}
                                <div class="same-style-2 header-cart">
                                    <a class="cart-active" href="#">
                                        <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                                    </a>
                                </div>
                                <span class="cart-amount white">
                                    {{-- {{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }} --}}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-small-device small-device-ptb-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-5">
                <div class="mobile-logo">
                    <a href="index.html">
                        <img alt="" src="~/shop/norda/assets/images/logo/logo.png">
                    </a>
                </div>
            </div>
            <div class="col-7">
                <div class="header-action header-action-flex">
                    <div class="same-style-2 same-style-2-font-inc">
                        <a href="login-register.html"><i class="icon-user"></i></a>
                    </div>
                    <div class="same-style-2 same-style-2-font-inc">
                        <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
                    </div>
                    <div class="same-style-2 same-style-2-font-inc header-cart">
                        <a class="cart-active" href="#">
                            <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                        </a>
                    </div>
                    <div class="same-style-2 main-menu-icon">
                        <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
