
    @include('admin.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']])

    <div class="row mt20">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="row mt20">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>{{ $config['seo']['index']['table'] }}</h5>
                                @include('admin.dashboard.component.toolbox',['model'=>'PostCatalogue'])
                            </div>

                            <div class="ibox-content">
                                @include('admin.post.post.component.filter')
                                @include('admin.post.post.component.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

