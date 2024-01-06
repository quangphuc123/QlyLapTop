<div class="description-review-wrapper pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dec-review-topbar nav mb-45">
                    <a class="active" data-toggle="tab" href="#des-details1">Đặc điểm nổi bật</a>
                    <a data-toggle="tab" href="#des-details2">Thông số kỹ thuật</a>
                    {{-- <a data-toggle="tab" href="#des-details4">Reviews and Ratting </a> --}}
                </div>
                <div class="tab-content dec-review-bottom">
                    <div id="des-details1" class="tab-pane active">
                        <div class="description-wrap">
                        {!! $product->description !!}
                        </div>
                    </div>
                    <div id="des-details2" class="tab-pane">
                        <div class="specification-wrap table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="title width1">Tên sản phẩm</td>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Mã sản phẩm</td>
                                        <td>HS - {{ $product->product_code }}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Loại sản phẩm</td>
                                        <td>{{ $product->product_catalogues->name }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="title width1">Size</td>
                                        <td>60’’ x 40’’</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="title width1">Thương hiệu </td>
                                        <td>{{ $product->brands->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div id="des-details4" class="tab-pane">
                        <div class="review-wrapper">
                            <h2>1 review for Sleeve Button Cowl Neck</h2>
                            <div class="single-review">
                                <div class="review-img">
                                    <img src="assets/images/product-details/client-1.png" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-top-wrap">
                                        <div class="review-name">
                                            <h5><span>John Snow</span> - March 14, 2019</h5>
                                        </div>
                                        <div class="review-rating">
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                        </div>
                                    </div>
                                    <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna
                                        molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci.
                                        Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="ratting-form-wrapper">
                            <span>Add a Review</span>
                            <p>Your email address will not be published. Required fields are marked
                                <span>*</span>
                            </p>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <label>Name <span>*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <label>Email <span>*</span></label>
                                                <input type="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="star-box-wrap">
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                                <div class="single-ratting-star">
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                    <a href="#"><i class="icon_star"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style mb-20">
                                                <label>Your review <span>*</span></label>
                                                <textarea name="Your Review"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <input type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
