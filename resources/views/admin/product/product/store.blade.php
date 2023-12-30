@include('admin.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = $config['method'] == 'create' ? route('product.store') : route('product.update', $product->id);
@endphp

<form action="{{ $url }}" method="post" class="box" enctype="">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Nhập thông tin liên hệ của tài khoản</p>
                        <p>- Lưu ý những trường đánh dấu <span class="text-danger">(*)</span> là những trường bắt buộc
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Tên sản phẩm
                                        <span class="text-danger">(*)
                                        </span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Giá sản phẩm
                                        <span class="text-danger">(*)
                                        </span>
                                    </label>
                                    <input type="number" name="price"
                                        value="{{ old('price', $product->price ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Loại sản phẩm
                                        <span class="text-danger">(*)
                                        </span>
                                    </label>
                                    <select name="product_catalogue_id" id="" class="form-control">
                                        <option value="0">Chọn loại sản phẩm</option>
                                        @foreach ($productCatalogues as $key => $item)
                                            <option
                                                {{ $item->id ==
                                                old('product_catalogue_id', isset($product->product_catalogue_id) ? $product->product_catalogue_id : '')
                                                    ? 'selected'
                                                    : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-lable text-left">Ghi chú
                                        </label>
                                        <input type="text" name="description"
                                            value="{{ old('description', $product->description ?? '') }}"
                                            class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Giá Khuyến Mãi
                                        <span class="text-danger">(*)
                                        </span>
                                    </label>
                                    <input type="number" name="sale_price"
                                        value="{{ old('sale_price', $product->sale_price ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Ảnh sản phẩm
                                    </label>
                                    <span class="image img-cover image-target"><img
                                            src="{{ old('image', $product->image ?? '') ? old('image', $product->image ?? '') : 'backend/img/no-img.png' }}"
                                            alt="" style="width: 250px; height: 200px;"></span>
                                    <input type="hidden" name="image"
                                        value="{{ old('image', $product->image ?? '') }}"
                                        class="form-control upload-image" placeholder="" autocomplete="off"
                                        data-upload="Images">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">

                        </div>

                        {{-- <div class="ibox">
                            <div class="ibox-title">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <h5>Ảnh mô tả sản phẩm</h5>
                                    <div class="upload-album">
                                        <a href="" class="upload-picture">Chọn hình</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                @php
                                    $gallery = isset($album) && count($album) ? $album : old('album');
                                @endphp
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if (!isset($gallery) || count($gallery) == 0)
                                            <div class="click-to-upload">
                                                <div class="icon">
                                                    <a href="" class="upload-picture">
                                                        <img src="backend/img/svg.png"
                                                            style="width: 50px; height: 50px; fill">
                                                    </a>
                                                </div>
                                                <div class="small-text">
                                                    Sử dụng nút chọn hình hoặc ấn vào đây để thêm hình ảnh
                                                </div>
                                            </div>
                                        @endif
                                        <div
                                            class="upload-list {{ isset($gallery) && count($gallery) ? '' : 'hidden' }}">
                                            <ul id="sortable" class="clearfix data-album sortui ui-sortable">
                                                @if (isset($gallery) && count($gallery))
                                                    @foreach ($gallery as $key => $val)
                                                        <li class="ui-state-default">
                                                            <div class="thumb">
                                                                <span class="span image img-scaledown">
                                                                    <img src="{{ $val }}"
                                                                        alt="{{ $val }}">
                                                                    <input type="hidden" name="album[]"
                                                                        value="{{ $val }}">
                                                                </span>
                                                                <button class="delete-image"><i
                                                                        class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu Lại</button>
        </div>
    </div>
</form>
