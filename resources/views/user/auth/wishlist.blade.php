<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('user.index.component.head')
</head>

<body>
    @include('sweetalert::alert')
    <div class="main-wrapper">
        <header class="header-area">
            @include('user.index.component.nav')
        </header>

        <!-- Start -->

        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">Yêu thích </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                <h3 class="cart-page-title">Sản phẩm yêu thích</h3>
                <div class="row updatee">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>action</th>
                                            <th>X</th>
                                        </tr>
                                    </thead>
                                    <?php $total = 0; ?>
                                    <?php
                                    $symbol = 'đ';
                                    $symbol_thousand = '.';
                                    $decimal_place = 0;
                                    $stt = 0;
                                    $x=1;
                                    ?>

                                        <tbody>
                                            @foreach($user->wishlist as $product)
                                            @if(($x/2)!=1)
                                                <tr>
                                                    <td scope="row">{{ $stt += 1 }}</td>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img width="50"
                                                                src="{{ asset($product['image']) }}"
                                                                alt=""></a>
                                                    </td>
                                                    <td class="product-name"><a
                                                            href="{{ route('chi-tiet-san-pham', ['id' => $product['id']]) }}">{{ $product['name'] }}</a>
                                                    </td>

                                                    <td class="product-price-cart"><span class="amount">
                                                            {{ number_format($product['price'], $decimal_place, '', $symbol_thousand) . $symbol }}
                                                        </span></td>
                                       <td>
                                        <a href="#" class="add_to_cart"
                                            data-url="{{ route('cart-add', ['id' => $product['id']]) }}">
                                            <button title="Add to Cart" class="btn btn-danger">Thêm vào giỏ hàng</button>
                                        </a>
                                       </td>
                                       <td class="product-remove">
                                                    <form action="{{route('delete-wishlist')}}" method="POST">
                                            @csrf
                                    <div class="product-action-2 tooltip-style-2">
                                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                                            <button type="submit" style="border:none" title="Bỏ thích"><svg xmlns="http://www.w3.org/2000/svg" border:none width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
</svg></button>
                                    </div>
                                    </form>
                                                    </td>
                                                </tr>
                                            @endif
                                            <?php $x+=1 ?>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="{{ route('trang-chu') }}">Tiếp tục mua sắm<main></main></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END -->
        @include('user.index.component.footer')
    </div>
    @include('assets.js')
    @include('assets.cart')
</body>

</html>
