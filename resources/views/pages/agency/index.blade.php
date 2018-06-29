@extends('layout/main')
@section('stylesheet')
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Quản lý đại lý</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Quản lý đại lý</strong>
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
                        <h5>Các đại lý hiện có</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-success" data-toggle="modal" data-target="#addagency">Thêm đại lý</button>
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
                                <th>Tên đại lý</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Số tài khoản</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->nameagency}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->accountnumber}}</td>
                                    <td> 
                                        <button class="btn-warning btn btn-xs" data-toggle="modal" data-target="#{{$row->id}}">Sửa</button>
                                        {!! Form::open(['method'=>'DELETE','onsubmit'=>'return confirm("Bạn thật sự muốn xóa?")','route'=>['agency.destroy',$row->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Xóa',['class'=>'btn-danger btn btn-xs'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal fade" id="addagency" tabindex="-1" role="dialog" aria-labelledby="addagency" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="font-size: 20px" id="addagency">Thêm đại lý</h5>
                          </div>
                          <div class="ibox-content">
                          {{Form::open(['method'=>'POST','route'=>'agency.store','class'=>'form-horizontal'])}}
                                <div class="form-group">
                                    {{Form::label('nameagency','Tên đại lý:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('nameagency','',array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('address','Địa chỉ:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('address','',array('class'=>'form-control address'))}}
                                        
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('phone','Số điện thoại:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('phone','',array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('accountnumber','Số tài khoản:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('accountnumber','',array('class'=>'form-control'))}}
                                    </div>
                                </div>
                            </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm đại lý</button>
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
                            <h5 class="modal-title" style="font-size: 20px" id="{{$row->id}}">Sửa đại lý</h5>
                          </div>
                          <div class="ibox-content">
                          {{Form::model($row,['method'=>'PATCH','route'=>['agency.update',$row->id],'class'=>'form-horizontal'])}}
                                <div class="form-group">
                                    {{Form::label('nameagency','Tên đại lý:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('nameagency',null,array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('address','Địa chỉ:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('address',null,array('class'=>'form-control address'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('phone','Số điện thoại:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('phone',null,array('class'=>'form-control'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('accountnumber','Số tài khoản:',array('class'=>'col-sm-3 control-label'))}}
                                    <div class="col-sm-9">
                                        {{Form::text('accountnumber',null,array('class'=>'form-control'))}}
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

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASjo_5_OFXm_qyQg8Njl8FJIfGe7Kj354&callback=initialize&libraries=geometry,places" async defer>
    </script>

    <script>
        var pacContainerInitialized = false; 
                    $('#address').keypress(function() { 
                            if (!pacContainerInitialized) { 
                                    $('.pac-container').css('z-index', '9999'); 
                                    pacContainerInitialized = true; 
                            } 
                    }); 
        function initialize() {
            var input = document.getElementsByClassName('address')[0];
            var autocomplete = new google.maps.places.Autocomplete(input);
            var input = document.getElementsByClassName('address')[1];
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
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