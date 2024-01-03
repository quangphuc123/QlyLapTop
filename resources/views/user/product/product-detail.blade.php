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
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">Chi tiết sản phẩm </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="product-details-area pt-120 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-tab">
                            <div class="pro-dec-big-img-slider">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{ asset($product->image) }}">
                                            <img src="{{ asset($product->image) }}" alt=""
                                                style="width: 650px; height: 806px;">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="{{ asset($product->image) }}"><i
                                            class="icon-size-fullscreen"></i></a>
                                </div>
                                @php
                                    $gallery = isset($album) && count($album) ? $album : old('album');
                                @endphp
                                @foreach ($gallery as $key => $val)
                                    <div class="easyzoom-style">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="{{ asset($val) }}">
                                                <img src="{{ asset($val) }}" alt=""
                                                    style="width: 180px; height: 225px;">
                                            </a>
                                        </div>
                                        <a class="easyzoom-pop-up img-popup" href="{{ asset($val) }}"><i
                                                class="icon-size-fullscreen"></i></a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="product-dec-slider-small product-dec-small-style1">

                                @foreach ($gallery as $key => $val)
                                    <div class="product-dec-small active">
                                        <img src="{{ asset($val) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product-details-content pro-details-content-mrg">
                            <h2>{{ $product->name }} </h2>
                            {{-- <div class="product-ratting-review-wrap">
                                <div class="product-ratting-digit-wrap">
                                    <div class="product-ratting">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <div class="product-digit">
                                        <span>5.0</span>
                                    </div>
                                </div>
                                <div class="product-review-order">
                                    <span>62 Reviews</span>
                                    <span>242 orders</span>
                                </div>
                            </div> --}}

                            <div class="pro-details-price">
                                <span>Giá của sản phẩm: </span>
                                <span class="new-price">
                                    <?php
                                    $symbol = 'đ';
                                    $symbol_thousand = '.';
                                    $decimal_place = 0;
                                    ?>
                                    {{ number_format($product->price, $decimal_place, '', $symbol_thousand) . $symbol }}
                                </span>
                            </div>
                            <div class="pro-details-quality">
                                <span>Số lượng:</span>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-add-to-cart">
                                    <a title="Add to Cart" href="#">Add To Cart </a>
                                </div>
                                {{-- <div class="pro-details-action">
                                    <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                    <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                    <div class="product-dec-social">
                                        <a class="facebook" title="Facebook" href="#"><i
                                                class="icon-social-facebook"></i></a>
                                        <a class="twitter" title="Twitter" href="#"><i
                                                class="icon-social-twitter"></i></a>
                                        <a class="instagram" title="Instagram" href="#"><i
                                                class="icon-social-instagram"></i></a>
                                        <a class="pinterest" title="Pinterest" href="#"><i
                                                class="icon-social-pinterest"></i></a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.product.information')
        @include('user.index.component.footer')
    </div>
    @include('assets.js')
</body>

</html>
