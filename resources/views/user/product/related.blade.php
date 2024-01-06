<div class="related-product pb-115">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>Sản phẩm liên quan</h2>
        </div>
        <div class="related-product-active">
            @foreach ($related_products as $key => $lquan)
                <div class="product-plr-1">
                    <div class="single-product-wrap">
                        <div class="{{ asset($lquan->image) }}">
                            <a href="product-details.html">
                                <img src="{{ asset($lquan->image) }}" alt="">
                            </a>
                            <div class="product-action-2 tooltip-style-2">
                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i
                                        class="icon-size-fullscreen icons"></i></button>
                                <button title="Compare"><i class="icon-refresh"></i></button>
                            </div>
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
                            <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                            <div class="product-price-2">
                                <span>$20.50</span>
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
                            <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                            <div class="product-price-2">
                                <span>$20.50</span>
                            </div>
                            <div class="pro-add-to-cart">
                                <button title="Add to Cart">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
