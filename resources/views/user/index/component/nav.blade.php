<div class="main-wrapper">
    <header class="header-area bg-blue">
        <div class="header-large-device">
            <div class="header-top header-top-ptb-7 border-bottom-8">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2">
                            <div class="logo">
                                <a href="{{ route('trang-chu') }}"><img src="{{ asset('assets/images/logo/logo1.png') }}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="categori-search-wrap categori-search-wrap-modify-2">
                                {{-- <div class="categori-style-1">
                                    <select class="nice-select nice-select-style-1">
                                         <option>All Categories </option>
                                        <option>Clothing </option>
                                        <option>T-Shirt</option>
                                        <option>Shoes</option>
                                        <option>Jeans</option>
                                    </select>
                                </div> --}}
                                <div class="search-wrap-3">
                                    <form action="{{ route('user.search') }}" method="POST">
                                        @csrf
                                        <input name="keyword" placeholder="Bạn muốn tìm kiếm sản phẩm gì?......."
                                            type="text">
                                        <button><i class="lnr lnr-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="header-action header-action-flex">
                                <?php
                                try{
                                    $check=Auth::user()->id;
                                ?>
                                <div class="same-style-2 same-style-2-white same-style-2-font-inc">
                                    <a href="{{ route('accountDetail') }}"><i class="icon-user"></i></a>
                                </div>
                                <?php
                                }catch(Exception $e){
                                ?>
                                <div class="same-style-2 same-style-2-white same-style-2-font-inc">
                                    <a href="{{ route('loginRegister') }}"><i class="icon-user"></i></a>
                                </div>
                                <?php } ?>
                                @auth <div class="same-style-2 same-style-2-white same-style-2-font-dec">
                                        <a href="{{ route('show-wishlist') }}">
                                            <i class="icon-heart"></i>
                                            <span class="pro-count red">{{ Auth::user()->wishlist()->count() / 2 }}
                                            </span>
                                        </a>
                                </div>@endauth
                                <div class="same-style-2 same-style-2-white same-style-2-font-inc header-cart">
                                    <a class="cart-active" href="#">
                                        <?php
                                        $total = 0;
                                        $symbol = 'đ';
                                        $symbol_thousand = '.';
                                        $decimal_place = 0;
                                        $stt = 0;
                                        $x=0;
                                        ?>

                                        @if (!is_null($carts))
                                            @foreach ($carts as $id => $cartItem)
                                            <?php $x=$x+$cartItem['quantity']?>
                                            @endforeach
                                        @endif
                                        <div class="same-style-2 header-cart">
                                            <a class="cart-active" href="#">
                                                <i class="icon-basket-loaded"></i><span class="pro-count red">{{$x}}</span>
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
            <div class="header-bottom bg-blue">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            {{-- <div class="main-categori-wrap main-categori-wrap-modify-2">
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
                            </div> --}}
                        </div>
                        <div class="col-lg-6">
                            <div
                                class="main-menu main-menu-white main-menu-padding-1 main-menu-font-size-14 main-menu-lh-5">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('trang-chu') }}">Trang chủ </a></li>
                                        <li><a href="#">Thương hiệu</a>
                                            <ul class="sub-menu-style">
                                                @if (!empty($brands))
                                                    @foreach ($brands as $key => $val)
                                                        <li><a href="{{ route('danh-muc-thuong-hieu', $val->id) }}">{{ $val->name }}
                                                            </a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li><a href="#">Loại sản phẩm</a>
                                            <ul class="sub-menu-style">
                                                @if (!empty($productCatalogue))
                                                    @foreach ($productCatalogue as $key => $val)
                                                        <li><a href="{{ route('danh-muc-san-pham', $val->id) }}">{{ $val->name }}
                                                            </a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('blog') }}">Bài viết</a>
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
                                {{-- <div class="same-style-2 same-style-2-white same-style-2-font-dec header-cart">
                                    <a class="cart-active" href="#">
                                        <php
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
                                        @endif
                                        <div class="same-style-2 header-cart">
                                            <a class="cart-active" href="#">
                                                <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                                            </a>
                                        </div>
                                        <span class="cart-amount white">
                                            {{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }}
                                        </span>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
