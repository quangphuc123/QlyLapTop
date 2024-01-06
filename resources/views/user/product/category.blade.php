<div class="col-lg-3">
    <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
        <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
            <h4 class="sidebar-widget-title">Loại sản phẩm </h4>
            <div class="shop-catigory">
                <ul>
                    @if (!empty($productCatalogue))
                        @foreach ($productCatalogue as $key => $val)
                            <li>
                                <a href="{{ route('danh-muc-san-pham', $val->id) }}">
                                    {{ $val->name }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
            <h4 class="sidebar-widget-title">Thương hiệu </h4>
            <div class="shop-catigory">
                <ul>
                    @if (!empty($brands))
                        @foreach ($brands as $key => $val)
                            <li>
                                <a href="{{ route('danh-muc-thuong-hieu', $val->id) }}">
                                    {{ $val->name }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
