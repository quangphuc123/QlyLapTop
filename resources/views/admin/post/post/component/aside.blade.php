<div class="ibox">
    <div class="ibox-title">
        <h5>Chọn danh mục cha</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="text-danger notice">* Chọn Root nếu không có danh mục cha </span>
                    <select name="post_catalogue_id" id="" class="form-control setupSelect2">
                        @foreach ($dropdown as $key => $val)
                            <option
                                {{ $key == old('post_catalogue_id', isset($post->post_catalogue_id) ? $post->post_catalogue_id : '') ? 'selected' : '' }}
                                value="{{ $key }}">{{ $val }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        @php
            $catalogue = [];
            if (isset($post)) {
                foreach ($post->post_catalogues as $key => $val) {
                    $catalogue[] = $val->id;
                }
            }
        @endphp

        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <label class="control-label ">Danh mục phụ</label>
                    <select multiple name="catalogue[]" id="" class="form-control setupSelect2">
                        @foreach ($dropdown as $key => $val)
                            <option @if (is_array(old('catalogue', isset($catalogue) && count($catalogue) ? $catalogue : [])) &&
                                    isset($post->post_catalogue_id) &&
                                    $key !== $post->post_catalogue_id &&
                                    in_array($key, old('catalogue', isset($catalogue) ? $catalogue : []))) selected @endif value="{{ $key }}">
                                {{ $val }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox">
    <div class="ibox-title">
        <h5>Chọn ảnh đại diện</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <span class="image img-cover image-target"><img
                            src="
                            {{ old('image', $post->image ?? '') ? old('image', $post->image ?? '') : 'backend/img/no-img.png' }}

                            "
                            alt="" style="width: 250px; height: 200px;"></span>
                    <input type="hidden" name="image" value="{{ old('image', $post->image ?? '') }}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình bài viết</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="publish" id="" class="form-control setupSelect2">
                            @foreach (config('apps.general.publish') as $key => $val)
                                <option
                                    {{ $key == old('publish', isset($post->publish) ? $post->publish : '') ? 'selected' : '' }}
                                    value="{{ $key }}"> {{ $val }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb15">
                        <select name="follow" id="" class="form-control setupSelect2">
                            @foreach (config('apps.general.follow') as $key => $val)
                                <option
                                    {{ $key == old('follow', isset($post->follow) ? $post->follow : '') ? 'selected' : '' }}
                                    value="{{ $key }}"> {{ $val }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
