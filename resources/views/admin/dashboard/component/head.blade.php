<base href="http://127.0.0.1:8000/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>HandSome - @yield('title')</title>
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="backend/css/animate.css" rel="stylesheet">


@if (isset($config['css']) && is_array($config['css']))
    @foreach ($config['css'] as $key => $val)
        {!! '<link href="' . $val . '" rel="stylesheet" >' !!}
    @endforeach
@endif

<link href="backend/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="login-fontend/css/customsize.css">
<script src="backend/js/jquery-3.1.1.min.js"></script>
