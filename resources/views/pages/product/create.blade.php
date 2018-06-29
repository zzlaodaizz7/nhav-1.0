@extends('layout/main')
@section('stylesheet')
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
@endsection
@section('content')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Thêm sản phẩm</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li>
                            <a href="">Quản lý nhóm sản phẩm</a>
                        </li>
                        <li class="active">
                            <strong>Thêm sản phẩm</strong>
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
                            <h5>Thêm sản phẩm</h5>
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
                            <div class="row">
                                {{Form::open(['method'=>'POST','class'=>'form-horizontal'])}}
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    {{Form::label('describe','Mô tả:',array('class'=>'col-sm-2 control-label'))}}
                                    <div class="col-sm-10">
                                         <div class="ibox float-e-margins">
                                            <div class="ibox-title">
                                                <h5>Viết mô tả vào ô dưới đây</h5>
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
                                            <div class="ibox-content no-padding">
                                                <textarea class="summernote" name="describe">
                                                    <h3>Lorem Ipsum is simply</h3>
                                                    dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                                    <br/>
                                                    <br/>
                                                    <ul>
                                                        <li>Remaining essentially unchanged</li>
                                                        <li>Make a type specimen book</li>
                                                        <li>Unknown printer</li>
                                                    </ul>
                                                </textarea>
                                            </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a class="btn btn-white" href="">Thoát</a>
                                        <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                                    </div>
                                </div>
                            {{Form::close()}}
                            </div>
                     
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <!-- Jasny -->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>

    <!-- CodeMirror -->
    <script src="js/plugins/codemirror/codemirror.js"></script>
    <script src="js/plugins/codemirror/mode/xml/xml.js"></script>
    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
    </script>
@endsection