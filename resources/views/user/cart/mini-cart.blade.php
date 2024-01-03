<!-- mini cart start -->
<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="icon_close"></i></a>
        @if (!is_null($carts))
            <div class="cart-content">
                <h3>Shopping Cart</h3>
                <?php
                $total = 0;
                $symbol = 'đ';
                $symbol_thousand = '.';
                $decimal_place = 0;
                $stt = 0;
                ?>
                <ul>
                    @foreach ($carts as $id => $cartItem)
                        <?php $total += $cartItem['price'] * $cartItem['quantity']; ?>

                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{ asset($cartItem['image']) }}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="{{ route('chi-tiet-san-pham', ['id' => $id]) }}">{{ $cartItem['name'] }}
                                    </a>
                                </h4>
                                <span>
                                    {{ number_format($cartItem['price'], $decimal_place, '', $symbol_thousand) . $symbol }}
                                </span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="cart-total">
                    <h4>Subtotal:
                        <span>{{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }}</span>
                    </h4>
                </div>
                <div class="cart-checkout-btn">
                    <a class="btn-hover cart-btn-style" href="{{ route('cart-view') }}">view cart</a>
                    <a class="no-mrg btn-hover cart-btn-style" href="{{ route('check-out') }}">checkout</a>
                </div>
            </div>
        @endif
    </div>
</div>
