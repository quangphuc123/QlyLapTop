@include('admin.dashboard.component.breadcrumb', ['title' => $config['seo']['delete']['title']])

<form action="{{ route('product.destroy', $product->id) }}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Bạn đang muốn xóa sản phẩm có tên: <span class="text-danger">{{ $product->name }}</span>
                        </p>
                        <p>- Không thể khôi phục sản phẩm sau khi xóa. Bạn chắc chắn muốn thực hiện chức năng này?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Tên sản phẩm
                                        <span class="text-danger">(*)
                                        </span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-danger" type="submit" name="send" value="send">Xóa dữ liệu</button>
        </div>
    </div>
</form>
