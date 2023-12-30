<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Handsome Store</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    @include('assets.css')



</head>

<body>
    @include('sweetalert::alert')
    <div class="main-wrapper">
        <header class="header-area">
            <div class="header-large-device">
                <div class="header-middle header-middle-padding-2">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html"><img src="{{ asset('assets/images/logo/Độc Lạ LapTop.png') }}"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="sidebar-widget mb-25">
                                <div class="sidebar-search" style="width: 500px ;padding-left: 100px;">
                                    <form class="sidebar-search-form" action="#"
                                        style="text-decoration-color: brown;">
                                        <input type="text" placeholder="Nhập tên laptop, phụ kiện cần tìm...">
                                        <button>
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="ml-50">
                                <?php
                                    try{
                                        $check=Auth::user()->id;
                                 ?>
                                <a href="{{ route('accountDetail') }}">
                                    <button type="button" class="btn btn-warning bi-person">
                                        Tài khoản
                                    </button>
                                </a>
                                <?php
                                    }catch(Exception $e){
                                ?>
                                <a href="{{ route('loginRegister') }}">
                                    <button type="button" class="btn btn-warning bi-person">
                                        Đăng nhập
                                    </button>
                                </a>
                                <?php } ?>
                            </div>
                            <div>
                                <button type="button" class="btn btn-warning ml-15 bi-cart4">
                                    Giỏ hàng
                                </button>
                            </div>
                            <div>
                                <div class="hotline-2-wrap ml-25">
                                    <div class="hotline-2-icon">
                                        <i class="blue icon-call-end"></i>
                                    </div>
                                    <div class="hotline-2-content">
                                        <span> Hotline 24/7</span>
                                        <h5>0888574030 </h5>
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
                                <div class="main-categori-wrap main-categori-wrap-modify-2">
                                    <a class="categori-show categori-blue" href="#">Danh mục sản phẩm <i
                                            class="icon-arrow-down icon-right"></i></a>
                                    <div
                                        class="category-menu-2 category-menu-2-blue categori-hide categori-not-visible-2">
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
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div
                                    class="main-menu main-menu-white main-menu-padding-1 main-menu-font-size-14 main-menu-lh-5">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ route('trang-chu') }}">Trang chủ </a></li>
                                            <li><a href="shop.html">Sản phẩm </a>
                                                <ul class="mega-menu-style mega-menu-mrg-2">
                                                    <li>
                                                        <ul>
                                                            <li>
                                                                <a class="dropdown-title" href="#">Shop Layout</a>
                                                                <ul>
                                                                    <li><a href="~/shop/norda/shop.html">standard
                                                                            style</a></li>
                                                                    <li><a href="shop-list.html">shop list style</a>
                                                                    </li>
                                                                    <li><a href="shop-fullwide.html">shop fullwide</a>
                                                                    </li>
                                                                    <li><a href="shop-no-sidebar.html">grid no
                                                                            sidebar</a></li>
                                                                    <li><a href="shop-list-no-sidebar.html">list no
                                                                            sidebar</a></li>
                                                                    <li><a href="shop-right-sidebar.html">shop right
                                                                            sidebar</a></li>
                                                                    <li><a href="store-location.html">store location</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-title" href="#">Products
                                                                    Layout</a>
                                                                <ul>
                                                                    <li><a href="product-details.html">tab style 1</a>
                                                                    </li>
                                                                    <li><a href="product-details-2.html">tab style 2</a>
                                                                    </li>
                                                                    <li><a href="product-details-sticky.html">sticky
                                                                            style</a></li>
                                                                    <li><a href="product-details-gallery.html">gallery
                                                                            style </a></li>
                                                                    <li><a href="product-details-affiliate.html">affiliate
                                                                            style</a></li>
                                                                    <li><a href="product-details-group.html">group
                                                                            style</a></li>
                                                                    <li><a href="product-details-fixed-img.html">fixed
                                                                            image style </a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html"><img
                                                                        src="~/shop/norda/assets/images/banner/banner-12.png"
                                                                        alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Về chúng tôi </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="about-us.html">about us </a></li>
                                                    <li><a href="cart.html">cart page</a></li>
                                                    <li><a href="checkout.html">checkout </a></li>
                                                    <li><a href="my-account.html">my account</a></li>
                                                    <li><a href="wishlist.html">wishlist </a></li>
                                                    <li><a href="compare.html">compare </a></li>
                                                    <li><a href="contact.html">contact us </a></li>
                                                    <li><a href="order-tracking.html">order tracking</a></li>
                                                    <li><a href="login-register.html">login / register </a></li>
                                                </ul>
                                            </li>
                                            @*<li><a href="blog.html">BLOG </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="blog.html">blog standard </a></li>
                                                    <li><a href="blog-no-sidebar.html">blog no sidebar </a></li>
                                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                </ul>
                                            </li>*@
                                            <li><a href="~/shop/norda/contact.html">Liên hệ </a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="header-action header-action-flex pr-20">
                                    <div class="same-style-2 same-style-2-white same-style-2-font-dec">
                                        <a href="login-register.html"><i class="icon-user"></i></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-white same-style-2-font-dec">
                                        <a href="wishlist.html"><i class="icon-heart"></i><span
                                                class="pro-count red">03</span></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-white same-style-2-font-dec header-cart">
                                        <a class="cart-active" href="#">
                                            <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                                            <span class="cart-amount white">$2,435.30</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <a href="wishlist.html"><i class="icon-heart"></i><span
                                            class="pro-count red">03</span></a>
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
                                    @endif
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
                                        <span>{{ number_format($total, $decimal_place, '', $symbol_thousand) . $symbol }}</span>
                                    </h5>
                                    <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                            <li><input type="checkbox"> Express <span>$30.00</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>
                                    <a href="{{ route('check-out') }}">Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- END -->
        <footer class="footer-area bg-gray pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-info-wrap">
                            <div class="footer-logo">
                                <a href="#"><img src="assets/images/logo/logo.png" alt="logo"></a>
                            </div>
                            <div class="single-contact-info">
                                <span>Our Location</span>
                                <p>869 General Village Apt. 645, Moorebury, USA</p>
                            </div>
                            <div class="single-contact-info">
                                <span>24/7 hotline:</span>
                                <p>(+99) 052 128 2399</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-right-wrap">
                            <div class="footer-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">home</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop.html">Product </a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="blog.html">Blog.</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="social-style-2 social-style-2-mrg">
                                <a href="#"><i class="social_twitter"></i></a>
                                <a href="#"><i class="social_facebook"></i></a>
                                <a href="#"><i class="social_googleplus"></i></a>
                                <a href="#"><i class="social_instagram"></i></a>
                                <a href="#"><i class="social_youtube"></i></a>
                            </div>
                            <div class="copyright">
                                <p>Copyright © 2020 HasThemes | <a href="https://hasthemes.com/">Built with
                                        <span>Norda</span> by HasThemes</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                                <div class="tab-content quickview-big-img">
                                    <div id="pro-1" class="tab-pane fade show active">
                                        <img src="assets/images/product/product-1.jpg" alt="">
                                    </div>
                                    <div id="pro-2" class="tab-pane fade">
                                        <img src="assets/images/product/product-3.jpg" alt="">
                                    </div>
                                    <div id="pro-3" class="tab-pane fade">
                                        <img src="assets/images/product/product-6.jpg" alt="">
                                    </div>
                                    <div id="pro-4" class="tab-pane fade">
                                        <img src="assets/images/product/product-3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="quickview-wrap mt-15">
                                    <div class="quickview-slide-active nav-style-6">
                                        <a class="active" data-toggle="tab" href="#pro-1"><img
                                                src="assets/images/product/quickview-s1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-2"><img
                                                src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-3"><img
                                                src="assets/images/product/quickview-s3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-4"><img
                                                src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                                <div class="product-details-content quickview-content">
                                    <h2>Simple Black T-Shirt</h2>
                                    <div class="product-ratting-review-wrap">
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
                                    </div>
                                    <p>Seamlessly predominate enterprise metrics without performance based process
                                        improvements.</p>
                                    <div class="pro-details-price">
                                        <span class="new-price">$75.72</span>
                                        <span class="old-price">$95.72</span>
                                    </div>
                                    <div class="pro-details-color-wrap">
                                        <span>Color:</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li><a class="dolly" href="#">dolly</a></li>
                                                <li><a class="white" href="#">white</a></li>
                                                <li><a class="azalea" href="#">azalea</a></li>
                                                <li><a class="peach-orange" href="#">Orange</a></li>
                                                <li><a class="mona-lisa active" href="#">lisa</a></li>
                                                <li><a class="cupid" href="#">cupid</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-size">
                                        <span>Size:</span>
                                        <div class="pro-details-size-content">
                                            <ul>
                                                <li><a href="#">XS</a></li>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-quality">
                                        <span>Quantity:</span>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                value="1">
                                        </div>
                                    </div>
                                    <div class="product-details-meta">
                                        <ul>
                                            <li><span>Categories:</span> <a href="#">Woman,</a> <a
                                                    href="#">Dress,</a> <a href="#">T-Shirt</a></li>
                                            <li><span>Tag: </span> <a href="#">Fashion,</a> <a
                                                    href="#">Mentone</a> , <a href="#">Texas</a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-action-wrap">
                                        <div class="pro-details-add-to-cart">
                                            <a title="Add to Cart" href="#">Add To Cart </a>
                                        </div>
                                        <div class="pro-details-action">
                                            <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                            <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                            <a class="social" title="Social" href="#"><i
                                                    class="icon-share"></i></a>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>

    <!-- All JS is here
============================================ -->
    @include('assets.js')



    <script>
        function cartUpdate(event) {
            event.preventDefault();
            let urlUpdateCart = $('.update_cart_url').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {
                    id: id,
                    quantity: quantity
                },
                success: function(data) {
                    if (data.code === 200) {
                        $('.main-wrapper ').html(data.cart);
                    }
                },
                error: function() {

                }
            })
        }

        function cartDelete(event) {
            event.preventDefault();
            let urlDelete = $('.delete_cart_url').data('url');
            $.ajax({
                type: "GET",
                url: urlDelete,
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.code === 200) {
                        $('.main-wrapper ').html(data.cart);
                        alert('Sản phẩm đã được xóa khỏi giỏ hàng');
                    }
                },
                error: function() {

                }
            })
        }
        $(function() {
            $(document).on('click', '.cart_update', cartUpdate);
            $(document).on('click', '.cart_delete', cartDelete);
        })
    </script>

</body>

</html>
