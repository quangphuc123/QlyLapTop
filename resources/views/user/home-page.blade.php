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
        @include('user.index.component.sidebar')

        <div class="shop-area pt-120 pb-120">
            <div class="container">
                <div class="row flex-row-reverse">
                    @include('user.product.product-list')
                    @include('user.product.category')
                </div>
            </div>
        </div>
        @include('user.index.component.footer')
    </div>
    @include('assets.js')
    @include('assets.cart')


</body>

</html>
