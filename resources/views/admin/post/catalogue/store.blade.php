@include('admin.dashboard.component.breadcrumb', ['title' => $config['seo'][$config['method']]['title']])
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
    $url = $config['method'] == 'create' ? route('post.catalogue.store') : route('post.catalogue.update', $postCatalogue->id);
@endphp

<form action="{{ $url }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-9">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        @include('admin.post.catalogue.component.general')
                    </div>
                </div>
                @include('admin.dashboard.component.album')
                @include('admin.post.catalogue.component.seo')
            </div>
            {{-- ------------------------------------------------------------------------------------------ --}}
            <div class="col-lg-3">
                @include('admin.post.catalogue.component.aside')
            </div>
        </div>

        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu Lại</button>
        </div>
    </div>
</form>
