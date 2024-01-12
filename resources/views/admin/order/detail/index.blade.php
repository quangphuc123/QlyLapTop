
    @include('admin.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']])

    <div class="row mt20">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="row mt20">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Chi tiết đơn hàng</h5>
                                @include('admin.dashboard.component.toolbox',['model'=>'OrderDetail'])
                            </div>

                            <div class="ibox-content">
                                @include('admin.order.detail.component.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

