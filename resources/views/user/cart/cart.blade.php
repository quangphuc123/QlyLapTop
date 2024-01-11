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
        @include('user.cart.mini-cart')
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
        <div class="cart-main-area pt-15 pb-20">
            @include('user.index.component.cart_component')
        </div>

        <!-- END -->
    </div>
    @include('user.index.component.footer')
    @include('assets.js')
</body>

</html>
