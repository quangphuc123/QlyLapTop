<div class="ibox">
    <div class="ibox-title">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <h5>Album ảnh</h5>
            <div class="upload-album">
                <a href="" class="upload-picture">Chọn hình</a>
            </div>
        </div>
    </div>
    <div class="ibox-content">
        @php
            $gallery = (isset($album) && count($album)) ? $album : old('album');
        @endphp
        <div class="row">
            <div class="col-lg-12">
                @if (!isset($gallery) || count($gallery) == 0)
                    <div class="click-to-upload">
                        <div class="icon">
                            <a href="" class="upload-picture">
                                <img src="backend/img/svg.png" style="width: 50px; height: 50px; fill">
                            </a>
                        </div>
                        <div class="small-text">
                            Sử dụng nút chọn hình hoặc ấn vào đây để thêm hình ảnh
                        </div>
                    </div>
                @endif
                <div class="upload-list {{ (isset($gallery) && count($gallery)) ? '' : 'hidden' }}">
                    <ul id="sortable" class="clearfix data-album sortui ui-sortable">
                        @if (isset($gallery) && count($gallery))
                            @foreach ($gallery as $key => $val)
                                <li class="ui-state-default">
                                    <div class="thumb">
                                        <span class="span image img-scaledown">
                                            <img src="{{ $val }}" alt="{{ $val }}">
                                            <input type="hidden" name="album[]" value="{{ $val }}">
                                        </span>
                                        <button class="delete-image"><i class="fa fa-trash"></i>
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
</div>
