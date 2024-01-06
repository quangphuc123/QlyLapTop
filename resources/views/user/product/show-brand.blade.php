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
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="{{ route('trang-chu') }}">Home</a>
                        </li>
                        @foreach ($brand_id as $key => $val)
                            <li class="active">{{ $val->name }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="shop-area pt-20 pb-20">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row">
                                        @foreach ($brand_id as $key => $val)
                                            <!-- start -->
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="single-product-wrap mb-35">
                                                    <div class="product-img product-img-zoom mb-15">
                                                        <a href="{{ route('chi-tiet-san-pham', ['id' => $val->id]) }}">
                                                            <img src="{{ asset($val->image) }}" alt=""
                                                                style="width: 270px; height: 320px;">
                                                        </a>
                                                    </div>
                                                    <div class="product-content-wrap-2 text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star gray"></i>
                                                            </div>
                                                            <span>(2)</span>
                                                        </div>
                                                        <h3><a
                                                                href="{{ route('chi-tiet-san-pham', ['id' => $val->id]) }}">{{ $val->name }}</a>
                                                        </h3>
                                                        <div class="product-price-2">
                                                            <span>
                                                                <?php
                                                                $symbol = 'đ';
                                                                $symbol_thousand = '.';
                                                                $decimal_place = 0;
                                                                ?>
                                                                {{ number_format($val->price, $decimal_place, '', $symbol_thousand) . $symbol }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="product-content-wrap-2 product-content-position text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star gray"></i>
                                                            </div>
                                                            <span>(2)</span>
                                                        </div>
                                                        <h3><a
                                                                href="{{ route('chi-tiet-san-pham', ['id' => $val->id]) }}">{{ $val->SKU }}</a>
                                                        </h3>
                                                        <div class="product-price-2">
                                                            <span>{{ number_format($val->price, $decimal_place, '', $symbol_thousand) . $symbol }}</span>
                                                        </div>


                                                        <div class="pro-add-to-cart">
                                                            {{-- <!-- <a href="{{ route('cart-add', $val->id) }}">
                                                            <button title="Add to Cart">Thêm vào giỏ hàng</button>
                                                        </a> --> --}}
                                                            <a href="#" class="add_to_cart"
                                                                data-url="{{ route('cart-add', ['id' => $val->id]) }}">
                                                                <button title="Add to Cart">Thêm vào giỏ hàng</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!--END -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('user.product.category')
                </div>
            </div>
        </div>
        @include('user.index.component.footer')
    </div>
    @include('assets.js')
    @include('assets.cart')


</body>

</html>
