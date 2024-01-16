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
                                            style="width: 330px; height: 320px;">
                                    </a>
                                    @auth
                                        @if (Auth::user()->checkWishlist($data->id))
                                            <form action="{{ route('delete-wishlist',['id'=>$data->id]) }}" method="POST">
                                                @csrf
                                                <div class="product-action-2 tooltip-style-2">
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                    <input type="hidden" name="product_id" value="{{ $data->id }}">
                                                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="red"
                                                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                                        </svg></button>
                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ route('add-wishlist',['id'=>$data->id]) }}" method="POST">
                                                @csrf
                                                <div class="product-action-2 tooltip-style-2">
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                    <input type="hidden" name="product_id" value="{{ $data->id }}">
                                                    <button type="submit"><i class="icon-heart"></i></button>
                                                </div>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                                <div class="product-content-wrap-2 text-center">

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

                                    <h3><a
                                            href="{{ route('chi-tiet-san-pham', ['id' => $data->id]) }}">{{ $data->SKU }}</a>
                                    </h3>
                                    <div class="product-price-2">
                                        <span>{{ number_format($data->price, $decimal_place, '', $symbol_thousand) . $symbol }}</span>
                                    </div>


                                    <div class="pro-add-to-cart">
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
                justify-content: center;
                color: red;
            }
        </style>

        <div class="pagination">
            {{ $lsProduct->links('vendor\pagination\bootstrap-4') }}
        </div>
    </div>
</div>
