@extends('layout/main')
@section('stylesheet')
            
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Thống kê báo cáo</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <strong>Thống kê báo cáo</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
                
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tổng hợp tất cả hóa đơn đã nhập</h5>
                        <div class="ibox-tools">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-6 control-label">Tổng hợp của đại lý:</label>
                                    <div class="col-sm-6" style="margin-top: -8px">
                                        {{Form::select('',$agencyload,null,array('class'=>'form-control agency','id'=>'agency'))}}
                                    </div>
                                </div>
                            </div>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-3 statistics">
                                Tổng tiền hàng
                                <br>
                                <span id="totalmoney">0đ</span>
                                <i class="fa fa-dollar a"></i>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3 statistics">
                                Tổng tiền đã trả
                                <br>
                                <span id="totalpaied">0đ</span>
                                <i class="fa fa-check-circle a"></i>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3 statistics">
                                Tổng còn nợ
                                <br>
                                <span id="totaldebt">0đ</span>
                                <i class="fa fa-exclamation-circle a"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Thống kê tổng tiền hóa đơn của các đại lý theo tháng</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart" height="100"></canvas>
                                {{-- <table>
                                    <tbody>
                                        @foreach($agency as $key => $value)
                                            <tr>
                                                <td class="idagency">{{$value->id}}</td>
                                                <td class="nameagency">{{$value->nameagency}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection

@section('script')
	<script src="js/plugins/chartJs/Chart.min.js"></script>
    <script type="text/javascript">
        $('.agency').change(function() {
            $agency_id=$(this).val();
            console.log("$agency_id");
                $.ajax({
        url: 'agencystatistics/'+$agency_id,
        type: 'GET',
        dataType: 'JSON',
        data: {},
        success: function(data){
            var data = JSON.parse(JSON.stringify(data));
            var barData = {
                labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6","Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
                datasets: [
                    {
                        label: "Tổng tiền hàng",
                        backgroundColor: '#0652DD',
                        borderColor: "#0652DD",
                        pointBackgroundColor: "#0652DD",
                        pointBorderColor: "#fff",
                        data: [data[0][1],data[0][2],data[0][3],data[0][4],data[0][5],data[0][6],data[0][7],data[0][8],data[0][9],data[0][10],data[0][11],data[0][12]]
                    },
                    {
                        label: "Tổng tiền đã trả",
                        backgroundColor: '#009432',
                        pointBorderColor: "#009432",
                        data: [data[1][1],data[1][2],data[1][3],data[1][4],data[1][5],data[1][6],data[1][7],data[1][8],data[1][9],data[1][10],data[1][11],data[1][12],]
                    },
                    {
                        label: "Tổng còn nợ",
                        backgroundColor: '#EA2027',
                        borderColor: "#EA2027",
                        pointBackgroundColor: "#EA2027",
                        pointBorderColor: "#EA2027",
                        data: [data[2][1],data[2][2],data[2][3],data[2][4],data[2][5],data[2][6],data[2][7],data[2][8],data[2][9],data[2][10],data[2][11],data[2][12],]
                    },
                ]
            };

            var barOptions = {
                tooltips: {
                    callbacks: {
                      label: function (tooltipItem, data) {
                        var tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return parseInt(tooltipValue).toLocaleString()+' đ';
                      }
                    }
                  }
            };
            
            var ctx2 = document.getElementById("barChart").getContext("2d");
            if (window.chart != undefined) {
                window.chart.destroy();
            }
            window.chart = new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});
            $('#totalmoney').text(data[3].toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
            $('#totalpaied').text(data[4].toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
            $('#totaldebt').text(data[5].toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
               
        }
    })
            });
    
    </script>
@endsection