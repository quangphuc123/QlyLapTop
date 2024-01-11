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
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="{{ route('trang-chu') }}">Home</a>
                        </li>
                        <li class="active">Bài viết </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-area pt-20 pb-20">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach ($lsPost as $post)
                                <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                                    <div class="blog-wrap mb-40">
                                        <div class="blog-img mb-20">
                                            <a href="{{ route('chi-tiet-bai-viet', ['id' => $post->id]) }}"><img
                                                    src="{{ $post->image }}" alt="blog-img"></a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul>
                                                    <span class="text-danger">Tags: </span>
                                                    @foreach ($post->post_catalogues as $val)
                                                        @foreach ($val->post_catalogue_language as $cat)
                                                            <li>
                                                                <a href="{{ route('post.index', ['post_catalogue_id' => $val->id]) }}"
                                                                    title="">
                                                                    {{ $cat->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    @endforeach
                                                    <li>{{ $post->created_at->format('d/m/Y') }}</li>
                                                </ul>
                                            </div>
                                            <h1><a
                                                    href="{{ route('chi-tiet-bai-viet', ['id' => $post->id]) }}">{{ $post->name }}</a>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
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
