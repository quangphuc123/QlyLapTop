<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Handsome Store</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- All CSS is here
	============================================ -->

    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/signericafat.css">
    <link rel="stylesheet" href="assets/css/vendor/cerebrisans.css">
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/elegant.css">
    <link rel="stylesheet" href="assets/css/vendor/linear-icon.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/easyzoom.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>


     <!-- Bootstrap Font Icon CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
                                    <a href="index.html"><img src="assets/images/logo/Độc Lạ LapTop.png" alt="logo"></a>
                                </div>
                            </div>
                            <div class="sidebar-widget mb-25">
                                <div class="sidebar-search" style="width: 500px ;padding-left: 100px;">
                                    <form class="sidebar-search-form" action="#" style="text-decoration-color: brown;">
                                        <input type="text"  placeholder="Nhập tên laptop, phụ kiện cần tìm...">
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
                                <a href="{{route('accountDetail')}}">
                                <button  type="button" class="btn btn-warning bi-person">
                                    Tài khoản
                                </button>
                                </a>
                                <?php 
                                    }catch(Exception $e){
                                ?>
                                <a href="{{route('loginRegister')}}">
                                <button  type="button" class="btn btn-warning bi-person">
                                    Đăng nhập
                                </button>
                                </a>
                                <?php } ?>
                            </div>




                            <div>
                                <button type="button" class="btn btn-warning ml-15 bi-cart4" >
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
                                    <a class="categori-show categori-blue" href="#">Danh mục sản phẩm <i class="icon-arrow-down icon-right"></i></a>
                                    <div class="category-menu-2 category-menu-2-blue categori-hide categori-not-visible-2">
                                        <nav>
                                            <ul>
                                                <li><a href="shop.html"><i class="bi-laptop"></i> Laptop</a></li>
                                                <li><a href="shop.html"><i class="bi-cpu"></i> Linh kiện PC - Máy tính</a></li>
                                                <li><a href="shop.html"><i class="bi-headphones"></i> Phụ kiện máy tính</a></li>
                                                <li><a href="shop.html"><i class="bi-tools"></i> Bảo hành - Hậu mãi</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main-menu main-menu-white main-menu-padding-1 main-menu-font-size-14 main-menu-lh-5">
                                    <nav>
                                        <ul>
                                            <li><a href="index.html">Trang chủ </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="index.html">Home version 1 </a></li>
                                                    <li><a href="index-2.html">Home version 2</a></li>
                                                    <li><a href="index-3.html">Home version 3</a></li>
                                                    <li><a href="index-4.html">Home version 4</a></li>
                                                    <li><a href="index-5.html">Home version 5</a></li>
                                                    <li><a href="index-6.html">Home version 6</a></li>
                                                    <li><a href="index-7.html">Home version 7</a></li>
                                                    <li><a href="index-8.html">Home version 8</a></li>
                                                    <li><a href="index-9.html">Home version 9</a></li>
                                                    <li><a href="index-10.html">Home version 10</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Sản phẩm </a>
                                                <ul class="mega-menu-style mega-menu-mrg-2">
                                                    <li>
                                                        <ul>
                                                            <li>
                                                                <a class="dropdown-title" href="#">Shop Layout</a>
                                                                <ul>
                                                                    <li><a href="~/shop/norda/shop.html">standard style</a></li>
                                                                    <li><a href="shop-list.html">shop list style</a></li>
                                                                    <li><a href="shop-fullwide.html">shop fullwide</a></li>
                                                                    <li><a href="shop-no-sidebar.html">grid no sidebar</a></li>
                                                                    <li><a href="shop-list-no-sidebar.html">list no sidebar</a></li>
                                                                    <li><a href="shop-right-sidebar.html">shop right sidebar</a></li>
                                                                    <li><a href="store-location.html">store location</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-title" href="#">Products Layout</a>
                                                                <ul>
                                                                    <li><a href="product-details.html">tab style 1</a></li>
                                                                    <li><a href="product-details-2.html">tab style 2</a></li>
                                                                    <li><a href="product-details-sticky.html">sticky style</a></li>
                                                                    <li><a href="product-details-gallery.html">gallery style </a></li>
                                                                    <li><a href="product-details-affiliate.html">affiliate style</a></li>
                                                                    <li><a href="product-details-group.html">group style</a></li>
                                                                    <li><a href="product-details-fixed-img.html">fixed image style </a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html"><img src="~/shop/norda/assets/images/banner/banner-12.png" alt=""></a>
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
                                        <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-white same-style-2-font-dec header-cart">
                                        <a class="cart-active" href="#">
                                            <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                                            @*<span class="cart-amount white">$2,435.30</span>*@
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
                                    <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
                                </div>
                                <div class="same-style-2 same-style-2-font-inc header-cart">
                                    <a class="cart-active" href="#">
                                        <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                                    </a>
                                </div>
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- my account wrapper start -->
        <div class="my-account-wrapper pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#account-info" class="active" data-toggle="tab"><i class="fa fa-user"></i>
                                            Thông tin tài khoản</a>
                                        <a href="#changepassword" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đổi mật khẩu</a>
                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                        <a href="{{route('logOut')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->
                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Thông tin tài khoản</h3>
                                                <style>
                                                    .inputstyle{
                                                        color:grey;
                                                        font-style:italic;
                                                    }
                                                </style>
                                                <div class="account-details-form">
                                                    <form action="{{route('xl-cap-nhat',['id'=>Auth::user()->id])}}" method="POST">
                                                        @csrf
                                                        <div class="single-input-item">
                                                            <label for="name" class="required">Họ và tên</label>
                                                            <input type="text" name="name" class="inputstyle"
                                                                <?php 
                                                                    if(Auth::user()->name==null){
                                                                ?>
                                                                placeholder="Chưa cập nhật"
                                                                <?php } else ?>
                                                                placeholder="{{Auth::user()->name}}"
                                                            />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="birthday" class="required">Ngày sinh</label>
                                                            <input type="date" name="birthday" class="inputstyle"
                                                                <?php 
                                                                    if(Auth::user()->birthday==null){
                                                                ?>
                                                                placeholder="Chưa cập nhật"
                                                                <?php } else ?>
                                                                placeholder="{{Auth::user()->birthday}}"    
                                                            />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="phone" class="required">Số điện thoại</label>
                                                            <input type="text" name="phone" class="inputstyle"
                                                                <?php 
                                                                    if(Auth::user()->phone==null){
                                                                ?>
                                                                placeholder="Chưa cập nhật"
                                                                <?php } else ?>
                                                                placeholder="{{Auth::user()->phone}}"
                                                            />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="address" class="required">Địa chỉ</label>
                                                            <input type="text" name="address" class="inputstyle"
                                                                <?php 
                                                                    if(Auth::user()->address==null){
                                                                ?>
                                                                placeholder="Chưa cập nhật"
                                                                <?php } else ?>
                                                                placeholder="{{Auth::user()->address}}"
                                                                    
                                                            />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Email Addres</label>
                                                            <input type="email" name="email"  class="inputstyle"
                                                            <?php 
                                                                    if(Auth::user()->email==null){
                                                                ?>
                                                                placeholder="Chưa cập nhật"
                                                                <?php } else ?>
                                                                placeholder="{{Auth::user()->email}}"   
                                                            />
                                                        </div>
                                                        <div class="single-input-item">
                                                            <button class="btn btn-danger " type="submit">Lưu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="changepassword" role="tabpanel">
                                            <div class="myaccount-content">
                                                <form action="" method="POST">
                                                    <fieldset>
                                                    <legend>Thay đổi mật khẩu</legend>
                                                        <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Mật khẩu cũ</label>
                                                                <input type="password" id="current-pwd" />
                                                        </div>
                                                        <div class="row mt-10">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">Mật khẩu mới</label>
                                                                        <input type="password" id="new-pwd" />
                                                                </div>
                                                            </div>
                                                        <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="confirm-pwd" class="required">Xác nhận mật khẩu mới</label>
                                                            <input type="password" id="confirm-pwd" />
                                                        </div>
                                                                </div>
                                                            </div>
                                                    </fieldset>
                                                    <div class="single-input-item mt-10">
                                                            <button class="btn btn-danger " type="submit">Lưu</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Pending</td>
                                                                <td>$3000</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>July 22, 2018</td>
                                                                <td>Approved</td>
                                                                <td>$200</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>June 12, 2017</td>
                                                                <td>On Hold</td>
                                                                <td>$990</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->



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
                                <p>Copyright © 2020 HasThemes | <a href="https://hasthemes.com/">Built with <span>Norda</span> by HasThemes</a>.</p>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
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
                                        <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/images/product/quickview-s1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-2"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-3"><img src="assets/images/product/quickview-s3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-4"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
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
                                    <p>Seamlessly predominate enterprise metrics without performance based process improvements.</p>
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
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                        </div>
                                    </div>
                                    <div class="product-details-meta">
                                        <ul>
                                            <li><span>Categories:</span> <a href="#">Woman,</a> <a href="#">Dress,</a> <a href="#">T-Shirt</a></li>
                                            <li><span>Tag: </span> <a href="#">Fashion,</a> <a href="#">Mentone</a> , <a href="#">Texas</a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-action-wrap">
                                        <div class="pro-details-add-to-cart">
                                            <a title="Add to Cart" href="#">Add To Cart </a>
                                        </div>
                                        <div class="pro-details-action">
                                            <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                            <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                            <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                            <div class="product-dec-social">
                                                <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                                                <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                                <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                                <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
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

    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramfeed.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/plugins/jquery-ui-touch-punch.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/sticky-sidebar.js"></script>
    <script src="assets/js/plugins/easyzoom.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above  
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>  -->
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>