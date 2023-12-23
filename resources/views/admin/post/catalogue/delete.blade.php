@include('admin.dashboard.component.breadcrumb', ['title' => $config['seo']['delete']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('post.catalogue.destroy', $postCatalogue->id) }}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Bạn đang muốn xóa ngôn ngữ có Tên: <span
                                class="text-danger">{{ $postCatalogue->name }}</span></p>
                        <p>- Không thể khôi phục ngôn ngữ sau khi xóa. Bạn chắc chắn muốn thực hiện chức năng này?</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-lable text-left">Tên ngôn ngữ
                                        <span class="text-danger">(*)
                                        </span>
                                    </label>
                                    <input type="text" name="name"
                                        value="{{ old('name', $postCatalogue->name ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off" readonly>
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
