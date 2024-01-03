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
                        <li class="active">Giỏ hàng </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                <h3 class="cart-page-title">Giỏ hàng của bạn</h3>
                <div class="row updatee">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content delete_cart_url"
                                data-url="{{ route('delete-cart') }}">
                                <table class="update_cart_url" data-url="{{ route('update-cart') }}">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <?php $total = 0; ?>
                                    <?php
                                    $symbol = 'đ';
                                    $symbol_thousand = '.';
                                    $decimal_place = 0;
                                    $stt = 0;
                                    ?>

                                    @if (!is_null($carts))
                                        <tbody>
                                            @foreach ($carts as $id => $cartItem)
                                                <?php $total += $cartItem['price'] * $cartItem['quantity']; ?>
                                                <tr>
                                                    <td scope="row">{{ $stt += 1 }}</td>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img width="50"
                                                                src="{{ asset($cartItem['image']) }}"
                                                                alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a
                                                            href="{{ route('chi-tiet-san-pham', ['id' => $id]) }}">{{ $cartItem['name'] }}</a>
                                                    </td>

                                                    <td class="product-price-cart"><span class="amount">
                                                            {{ number_format($cartItem['price'], $decimal_place, '', $symbol_thousand) . $symbol }}
                                                        </span></td>
                                                    <td class="product-quantity pro-details-quality">
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box quantity" type="number"
                                                                name="qtybutton" value='{{ $cartItem['quantity'] }}'
                                                                min=1>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        {{ number_format($cartItem['price'] * $cartItem['quantity'], $decimal_place, '', $symbol_thousand) . $symbol }}
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="" class="cart_update"
                                                            data-id="{{ $id }}">
                                                            <button class="btn btn-primary">Cập nhật</button>
                                                        </a>
                                                        <a href=""class="cart_delete"
                                                            data-id="{{ $id }}">
                                                            <button class="btn btn-danger mt-5"
                                                                style="width: 96px;">Xóa</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="{{ route('trang-chu') }}">Quay lại trang chủ</a>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="{{ route('delete-cart-all') }}">Xóa giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total products
                                        <span>
                                            {{ $cartItem['quantity'] }}
                                        </span>
                                    </h5>
                                    {{-- <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                            <li><input type="checkbox"> Express <span>$30.00</span></li>
                                        </ul>
                                    </div> --}}
                                    <h4 class="grand-totall-title">Grand Total
                                        <span>{{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }}</span>
                                    </h4>
                                    <a href="{{ route('check-out') }}">Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- END -->
        @include('user.index.component.footer')
    </div>
    @include('assets.js')
</body>

</html>
