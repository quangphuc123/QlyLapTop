<!-- Mainly scripts -->
<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="backend/library/library.js"></script>

<script src="backend/plugins/jquery-ui.js"></script>

<script src="backend/js/inspinia.js"></script>
<script src="backend/js/plugins/pace/pace.min.js"></script>

<!-- Mainly scripts -->

<!-- Flot -->
<script src="backend/js/plugins/flot/jquery.flot.js"></script>
<script src="backend/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="backend/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="backend/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="backend/js/plugins/flot/jquery.flot.time.js"></script>

<!-- Flot demo data -->
<script src="backend/js/demo/flot-demo.js"></script>

@if (isset($config['js']) && is_array($config['js']))
    @foreach ($config['js'] as $key => $val)
        {!! '<script src="' . $val . '"></script>' !!}
    @endforeach
@endif


