    <div class="container">
    <h3 class="cart-page-title">Giỏ hàng của bạn</h3>
    <div class="row update delete_cart_url" data-url="{{ route('delete-cart') }}">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="#">
                <div class="table-content table-responsive cart-table-content" >
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
                                            <a href="#"><img width="50" src="{{ asset($cartItem['image']) }}"
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
                                                <input class="cart-plus-minus-box quantity" name="qtybutton"
                                                    value="{{ $cartItem['quantity'] }}" min=1>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            {{ number_format($cartItem['price'] * $cartItem['quantity'], $decimal_place, '', $symbol_thousand) . $symbol }}
                                        </td>
                                        <td class="product-remove">
                                            <a href="" class="cart_update" data-id="{{ $id }}">
                                                <button class="btn btn-primary">Cập nhật</button>
                                            </a>
                                            <a href=""class="cart_delete" data-id="{{ $id }}">
                                                <button class="btn btn-danger mt-5" style="width: 120px;">Xóa</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update">
                                <a href="{{ route('trang-chu') }}">Tiếp tục mua săm</a>
                            </div>
                            <div class="cart-clear">
                                <a href="{{ route('delete-cart-all') }}">Xóa giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if (!is_null($carts))
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="grand-totall">
                            {{-- <h5>Total products
                                <span>
                                    {{ $cartItem['quantity'] }}
                                </span>
                            </h5> --}}
                            <h4 class="grand-totall-title">Tổng hóa đơn
                                <span>{{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }}</span>
                            </h4>
                            <a href="{{ route('check-out') }}">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
