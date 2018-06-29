@extends('layout/main')
@section('stylesheet')
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Quản lý hóa đơn</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>Hóa đơn</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                    <a class="btn btn-primary" href="view/order/create">Thêm hóa đơn</a>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="order_id">Mã hóa đơn</label>
                            <input type="text" id="order_id" name="order_id" value="" placeholder="Nhập mã hóa đơn" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="status">Trạng thái hóa đơn</label>
                            <input type="text" id="status" name="status" value="" placeholder="Nhập trạng thái" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="customer">Đại lý</label>
                            <input type="text" id="customer" name="customer" value="" placeholder="Nhập tên đại lý" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th>Mã HĐ</th>
                                    <th >Đại lý</th>
                                    <th >Tổng số tiền</th>
                                    <th>Số tiền đã trả</th>
                                    <th >Số tiền còn nợ</th>
                                    <th >Ngày xuất</th>
                                    <th >Trạng thái</th>
                                    <th class="text-right"></th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>
                                                <a href="view/order/{{$row->id}}">{{$row->id}}</a>
                                            </td>
                                            <td>
                                                {{$agency[$row->agency_id]['nameagency']}}
                                            </td>
                                            <td>
                                                {{$row->totalmoney}}
                                            </td>
                                            <td>
                                                {{$row->paied}}
                                            </td>
                                            <td>
                                                {{$row->debt}}
                                            </td>
                                            <td>
                                                {{$row->dateship}}
                                            </td>
                                            <td>
                                                @if($row->debt !=0)
                                                    <span class="label label-danger">Còn nợ</span>
                                                @endif
                                                @if($row->debt ==0)
                                                    <span class="label label-primary">Đã thanh toán</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button class="btn-white btn btn-xs">View</button>
                                                    <button class="btn-white btn btn-xs">Edit</button>
                                                    <button class="btn-white btn btn-xs">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('script')
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.footable').footable();
        });

    </script>

@endsection