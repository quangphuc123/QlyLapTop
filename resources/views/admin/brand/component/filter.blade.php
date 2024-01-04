<form action="{{ route('brand.index') }}">
    <div class="filter-wrapper ">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
            </div>
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    <div class="uk-search uk-flex uk-flex-middle mr10">
                        <div class="input-group">
                            <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}"
                                placeholder="Nhập từ khóa bạn muốn tìm kiếm...." class="form-control">

                            <span class="input-group-btn">
                                <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm">
                                    Tìm kiếm
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-middle">
                        <a href="{{ route('brand.create') }}" class="btn btn-danger">
                            <i class="fa fa-plus mr5"></i> Thêm mới loại thương hiệu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
