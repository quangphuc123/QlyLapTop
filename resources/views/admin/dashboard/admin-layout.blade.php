@section('title', 'Admin')
<!DOCTYPE html>
<html>

<head>
    @include('admin.dashboard.component.head')
</head>

<body>
    <div id="wrapper">
        @include('admin.dashboard.component.sidebar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                @include('admin.dashboard.component.nav')
            </div>

            @include($template)

            @include('admin.dashboard.component.footer')
        </div>

    </div>
    @include('admin.dashboard.component.scrip')

</body>

</html>
