<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right"><i class="fa fa-money" aria-hidden="true"></i></span>
                    <h5>Thu Nhập</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{ number_format($totalIncome) }} đ</h1>
                    <small>Tổng thu nhập</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right"><i class="fa fa-shopping-cart"
                            aria-hidden="true"></i></span>
                    <h5>Tổng đơn hàng</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $totalOrders }}</h1>
                    <small>Đơn</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right"><i class="fa fa-user-circle"
                            aria-hidden="true"></i></span>
                    <h5>Tài Khoản</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $totalUsers }}</h1>
                    <small>Tổng tài khoản</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Danh sách dự án người dùng</font>
                        </font>
                    </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover no-margins">
                        <thead>
                            <tr>
                                <th>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Trạng thái</font>
                                    </font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Ngày</font>
                                    </font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Người dùng</font>
                                    </font>
                                </th>
                                <th>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Giá trị</font>
                                    </font>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td><small>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $order->order_status }}</font>
                                            </font>
                                        </small></td>
                                    <td><i class="fa fa-clock-o"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $order->created_at }}</font>
                                        </font>
                                    </td>
                                    <td>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{ $order->shipping->shipping_name }}
                                            </font>
                                        </font>
                                    </td>
                                    <td class="text-navy">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                {{ number_format($order->order_total) }} đ</font>
                                        </font>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6" id="piechart_3d" style="width: 830px; height: 500px;"></div>
        <div class="col-lg-6" id="piechart1_3d" style="width: 830px; height: 500px; float: right;"></div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['tên sản phẩm', 'số lượng'],
            @foreach ($result as $key => $val)
                {!! "['" . $val['name'] . "'," . $val['number_cate'] . '],' !!}
            @endforeach
        ]);
        var options = {
            title: 'Loại sản phẩm',
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d', ));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['tên sản phẩm', 'số lượng'],
            @foreach ($resultUser as $key => $val)
                {!! "['" . $val->name . "'," . $val->number_user . '],' !!}
            @endforeach
        ]);
        var options = {
            title: 'Đơn hàng',
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart1_3d', ));
        chart.draw(data, options);
    }
</script>
