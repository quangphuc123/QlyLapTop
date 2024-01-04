<div class="col-lg-9">
    <div class="shop-bottom-area">
        <div class="tab-content jump">
            <div id="shop-1" class="tab-pane active">
                <div class="row">
                    @foreach ($lsProduct as $data)
                        <!-- start -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="single-product-wrap mb-35">
                                <div class="product-img product-img-zoom mb-15">
                                    <a href="{{ route('chi-tiet-san-pham', ['id' => $data->id]) }}">
                                        <img src="{{ asset($data->image) }}" alt=""
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
                                            href="{{ route('chi-tiet-san-pham', ['id' => $data->id]) }}">{{ $data->name }}</a>
                                    </h3>
                                    <div class="product-price-2">
                                        <span>
                                            <?php
                                            $symbol = 'đ';
                                            $symbol_thousand = '.';
                                            $decimal_place = 0;
                                            ?>
                                            {{ number_format($data->price, $decimal_place, '', $symbol_thousand) . $symbol }}
                                        </span>
                                    </div>
                                </div>
                                <div class="product-content-wrap-2 product-content-position text-center">
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
                                            href="{{ route('chi-tiet-san-pham', ['id' => $data->id]) }}">{{ $data->SKU }}</a>
                                    </h3>
                                    <div class="product-price-2">
                                        <span>{{ number_format($data->price, $decimal_place, '', $symbol_thousand) . $symbol }}</span>
                                    </div>


                                    <div class="pro-add-to-cart">
                                        {{-- <!-- <a href="{{ route('cart-add', $data->id) }}">
                                        <button title="Add to Cart">Thêm vào giỏ hàng</button>
                                    </a> --> --}}
                                        <a href="#" class="add_to_cart"
                                            data-url="{{ route('cart-add', ['id' => $data->id]) }}">
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
        <style>
            .pagination {
                margin-left: 190px;
                color: red;
            }
        </style>

        <div class="pagination">
            {{ $lsProduct->links('vendor\pagination\bootstrap-4') }}
        </div>
    </div>
</div>

