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
                        <li class="active">Chi tiết bài viết </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- STARRR -->
        <div class="blog-area pt-120 pb-120">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="blog-details-wrapper">
                            <div class="blog-details-top">
                                <div class="blog-details-img">
                                    <img alt="" src="{{ asset($blog->image) }}">
                                </div>
                                <div class="blog-details-content" style="">
                                    <div class="blog-meta-2">
                                        <ul>
                                            @foreach ($blog->post_catalogues as $val)
                                                @foreach ($val->post_catalogue_language as $cat)
                                                    <li>{{ $cat->name }}</li>
                                                @endforeach
                                            @endforeach
                                            <li>{{ $blog->created_at->format('d/m/Y') }}</li>
                                        </ul>
                                    </div>
                                    <h1>{{ $blog->name }}</h1>
                                    {!! $blog->description !!}
                                </div>
                            </div>
                            <div class="dec-img-wrapper">

                                {!! $blog->content !!}
                            </div>

                            @auth
                                <!-- DANH SÁCH BÌNH LUẬN -->
                                <style>
                                    .card1 {
                                        border-radius: 1.5em;
                                        width: 675px;
                                    }
                                </style>
                                <?php $x = 0; ?>
                                @php

                                @endphp
                                @foreach ($comments as $comment)
                                    {{ $x += 1 }}
                                @endforeach
                                <h4 class="blog-dec-title pt-30">Bình luận : {{ $x }}</h4>
                                @foreach ($comments as $comment)
                                    @if ($comment->post_id === $blog->id)
                                        <div class="review-wrapper card card1 mt-20">
                                            <div class="single-review pt-5 pr-5">
                                                <div class="review-content">
                                                    <div class="review-top-wrap">
                                                        <div class="review-name">
                                                            <h5>
                                                                <span>{{ $comment->ho_ten }}</span> -
                                                                {{ $comment->created_at->format('d/m/Y') }}
                                                                @if (Auth()->user()->id === $comment->user_id)
                                                                    <a href="{{ route('delete-comment-post', $comment->id) }}"
                                                                        class="ml-10" style="color:red">Xóa bình luận</a>
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <p>{{ $comment->noiDung }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <style>
                                    .pagination {
                                        justify-content: center;
                                        color: red;
                                    }
                                </style>

                                <div class="pagination">
                                    {{ $comments->links('vendor\pagination\bootstrap-4') }}
                                </div>
                                <!-- BÌNH LUẬN -->
                                <div class="blog-reply-wrapper mt-50">
                                    <form class="blog-form" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $blog->id }}" name="post_id">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-leave">
                                                    <textarea placeholder="Viết bình luận..." name="noiDung"></textarea>
                                                    <button class="btn btn-danger" type="submit">Gửi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>

                    <!-- CATALOG -->
                    @include('user.product.category')
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
