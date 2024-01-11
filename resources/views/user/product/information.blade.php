<div class="description-review-wrapper pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dec-review-topbar nav mb-45">
                    <a class="active" data-toggle="tab" href="#des-details1">Đặc điểm nổi bật</a>
                    <a data-toggle="tab" href="#des-details2">Thông số kỹ thuật</a>
                    @auth
                        <a data-toggle="tab" href="#des-details4">Bình luận</span></a>
                    @endauth
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
                                    <tr>
                                        <td class="title width1">Thương hiệu </td>
                                        <td>{{ $product->brands->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="des-details4" class="tab-pane">
                        @foreach ($comments as $comment)
                            @if ($comment->product_id === $product->id)
                                <div class="review-wrapper">
                                    <div class="single-review">
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-name">
                                                    <h5>
                                                        <span>{{ $comment->ho_ten }}</span> -
                                                        {{ $comment->created_at->format('d/m/Y') }}
                                                        @auth
                                                        @if (Auth()->user()->id === $comment->user_id)
                                                            <a href="{{ route('delete-comment', $comment->id) }}"
                                                                class="ml-10" style="color:red">Xóa bình luận</a>
                                                        @endif
                                                        @endauth
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
                                margin-left: 260px;
                                color: red;
                            }
                        </style>
                        <div class="pagination">
                            {{ $comments->links('vendor\pagination\bootstrap-4') }}
                        </div>
                        <div class="ratting-form-wrapper">
                            <div class="ratting-form">
                                <form method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    <div class="col-md-12">
                                        <div class="rating-form-style mb-20">
                                            <textarea name="noiDung" rows="3" placeholder="Viết bình luận..."></textarea>
                                        </div>
                                    </div>
                                    @if (session('message1'))
                                        <div class="alert alert-danger">{{ @session('message1') }}
                                        </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="form-submit">
                                            <button class="btn btn-danger" type="submit">Gửi</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
