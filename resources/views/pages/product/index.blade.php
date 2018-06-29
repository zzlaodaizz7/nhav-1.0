@extends('layout/main')
@section('stylesheet')
	<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection

@section('content')
	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Quản lý sản phẩm</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Quản lý sản phẩm</strong>
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
                        <h5>Các sản phẩm hiện có</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-success" data-toggle="modal" data-target="#addProduct">Thêm sản phẩm</button>
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
                        @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                        @endif
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}} <br>
                                @endforeach
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Đơn vị tính</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->nameproduct}}</td>
                                    <td>{{$row->price}}</td>
                                    <td class="center">{{$row->unit}}</td>
                                    <td> 
                                        <button class="btn-warning btn btn-xs" data-toggle="modal" data-target="#{{$row->id}}">Sửa</button>
                                        {!! Form::open(['method'=>'DELETE','onsubmit'=>'return confirm("Bạn thật sự muốn xóa?")','route'=>['product.destroy',$row->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Xóa',['class'=>'btn-danger btn btn-xs'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="font-size: 20px" id="addProduct">Thêm sản phẩm</h5>
                          </div>
                          <div class="ibox-content">
                          {{Form::open(['method'=>'POST','route'=>'product.store','class'=>'form-horizontal'])}}
                                <div class="form-group">
                                    {{Form::label('nameproduct','Tên sản phẩm:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('nameproduct','',array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('price','Đơn giá:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('price','',array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('unit','Đơn vị tính:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::select('unit',['KG'=>'KG','Gói'=>'Gói'],null,array('class'=>'form-control'))}}
                                    </div>
                                </div>
                            </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                          </div>
                          {{Form::close()}}
                        </div>
                      </div>
                    </div>
                    @foreach($data as $row)
                    <div class="modal fade" id="{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$row->id}}" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="font-size: 20px" id="{{$row->id}}">Sửa sản phẩm</h5>
                          </div>
                          <div class="ibox-content">
                          {{Form::model($row,['method'=>'PATCH','route'=>['product.update',$row->id],'class'=>'form-horizontal'])}}
                                <div class="form-group">
                                    {{Form::label('nameproduct','Tên sản phẩm:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('nameproduct',$row->nameproduct,array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('price','Đơn giá:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('price',null,array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('unit','Đơn vị tính:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::select('unit',['KG'=>'KG','Gói'=>'Gói'],null,array('class'=>'form-control'))}}
                                    </div>
                                </div>
                            </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                          </div>
                          {{Form::close()}}
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('script')
	<script src="js/plugins/dataTables/datatables.min.js"></script>
	<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    
                ]

            });

        });

    </script>
@endsection