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
        @include('user.index.component.sidebar')
        @include('user.cart.mini-cart')

        <div class="shop-area pt-20 pb-20">
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
