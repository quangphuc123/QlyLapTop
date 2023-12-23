<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-lable text-left">Tiêu đề bài viết
                <span class="text-danger">(*)</span>
                <input type="text" name="name" value="{{ old('name', $post->name ?? '') }}"
                    class="form-control" placeholder="" autocomplete="off">
            </label>
        </div>
    </div>
</div>
<div class="row mb30">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-lable text-left">Mô tả ngắn
            </label>
            <textarea
                name="description"
                class="form-control ck-editor"
                placeholder=""
                autocomplete="off"
                id="ckDescription"
                data-height="150"
                >{{ old('description', $post->description ?? '') }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-row">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <label for="" class="control-lable text-left">Nội dung</label>
                <a href="" class="multipleUploadImageCkeditor" data-target="ckContent">Tải lên nhiều hình ảnh</a>
            </div>
            <textarea
                type="text"
                name="content"
                class="form-control ck-editor"
                placeholder=""
                autocomplete="off"
                id="ckContent" data-height="500"
                >{{ old('content', $post->content ?? '') }}</textarea>
        </div>
    </div>
</div>
