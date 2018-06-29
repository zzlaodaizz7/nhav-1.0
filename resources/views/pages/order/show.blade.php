@extends('layout/main')
@section('stylesheet')
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
@endsection
    
@section('content')
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Basic Form</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Basic Form</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
        </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Thông tin hóa đơn</h5>
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
                            <div class="row form-horizontal">
                                <div class="form-group"><label class="col-sm-3 control-label">Đại lý</label>
                                    <div class="col-sm-9"><input type="text" value="{{$agency[$order->agency_id]['nameagency']}}" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">Ngày xuất</label>
                                    <div class="col-sm-9"><input type="text" value="{{$order->dateship}}" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">Địa chỉ</label>
                                    <div class="col-sm-9"><input type="text" value="{{$agency[$order->agency_id]['address']}}" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-3 control-label">Ngày lập HĐ</label>
                                    <div class="col-sm-9"><input type="text" value="{{$order->created_at}}" class="form-control"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Chi tiết hóa đơn</h5>
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
                                <form class="form-horizontal">
                                    <table class=" detailorder table table-bordered" style="font-size: 12px">
                                    <thead >
                                        <tr>
                                            <th class="text-center">ID Hàng</th>
                                            <th class="text-center">Tên mặt hàng</th>
                                            <th class="text-center">Đơn vị tính</th>
                                            <th class="text-center">Đơn giá</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detailorder as $row)
                                            <tr>
                                                <td class="text-center">{{$row->product_id}}</td>
                                                <td class="text-center">{{$product[$row->product_id]['nameproduct']}}</td>
                                                <td class="text-center">{{$product[$row->product_id]['unit']}}</td>
                                                <td class="text-center price" >{{$product[$row->product_id]['price']}}</td>
                                                <td class="text-center sl" style="width: 100px !important">{{$row->count}}</td>
                                                <td class="text-center money">{{$row->totalmoney}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="centercolumn text-center" style="font-size: 15px; font-weight: 700" colspan="4">Tổng cần thanh toán: <br> <span style="font-style: italic;text-decoration: underline;" id="docchu"></span></td>
                                            <td class="centercolumn text-center">
                                                <div class="col-md-12 KG">
                                                    
                                                </div>
                                                <div class="col-md-12 GOI">
                                                    
                                                </div>
                                            </td>
                                            <td style="width: 200px;font-size: 12px">
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" style="padding-right: 0px !important;font-weight: 400 !important">Tổng tiền:</label>
                                                    <div class="col-sm-8" style="margin-top: 8px">
                                                        <span class="total">{{$order->totalmoney}}</span>
                                                    </div>
                                                </div>
                                                <div class="hr-line-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" style="font-weight: 400 !important">Đã trả:</label>
                                                    <div class="col-sm-8"style="margin-top: 8px" >
                                                        <span class="paied">{{$order->paied}}</span>
                                                    
                                                    </div>
                                                </div>
                                                <div class="hr-line-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" style="font-weight: 400 !important">Nợ lại:</label>
                                                    <div class="col-sm-8" style="margin-top: 8px">
                                                        <span class="debt">{{$order->debt}}</span>
                                                       
                                                    </div>
                                                </div>
                                            </td>
                                            
                                      
                                        </tr>
                                    </tfoot>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
@endsection

@section('script')
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function() {
            var stt = 0;
            $('#date_added').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            //tổng số lượng
             var DOCSO=function(){
                var t=["không","một","hai","ba","bốn","năm","sáu","bảy","tám","chín"],r=function(r,n){var o="",a=Math.floor(r/10),e=r%10;return a>1?(o=" "+t[a]+" mươi",1==e&&(o+=" mốt")):1==a?(o=" mười",1==e&&(o+=" một")):n&&e>0&&(o=" lẻ"),5==e&&a>=1?o+=" lăm":4==e&&a>=1?o+=" tư":(e>1||1==e&&0==a)&&(o+=" "+t[e]),o},n=function(n,o){var a="",e=Math.floor(n/100),n=n%100;return o||e>0?(a=" "+t[e]+" trăm",a+=r(n,!0)):a=r(n,!1),a},o=function(t,r){var o="",a=Math.floor(t/1e6),t=t%1e6;a>0&&(o=n(a,r)+" triệu",r=!0);var e=Math.floor(t/1e3),t=t%1e3;return e>0&&(o+=n(e,r)+" nghìn",r=!0),t>0&&(o+=n(t,r)),o};return{doc:function(r){if(0==r)return t[0];var n="",a="";do ty=r%1e9,r=Math.floor(r/1e9),n=r>0?o(ty,!0)+a+n:o(ty,!1)+a+n,a=" tỷ";while(r>0);return n.trim()}}}();
                
            $(function countproduct(){
                $valueKG = 0;
                $valueGoi = 0;
                $countKG=0;
                $countGoi=0;
                $('.sl').each(function(index, el) {
                    if ($(this).prev().prev().text()=="KG") {
                        $valueKG += parseInt($(this).text());
                        $countKG+=1;
                    }else{
                        $valueGoi+= parseInt($(this).text());
                        $countGoi+=1;
                    }
                });
                if ($valueKG !=0) {
                    $('.KG').text($valueKG+" Kg");
                }else {
                    if ($countKG ==0) {
                        $('.KG').text("");
                    }
                }
                if ($valueGoi !=0) {
                    $('.GOI').text($valueGoi+" Gói");
                }else {
                    if ($countGoi==0) {
                        $('.GOI').text("");
                    }
                }
                var bb=DOCSO.doc($('.debt').text());
                bb=bb.charAt(0).toUpperCase() + bb.slice(1);
                $('#docchu').text(bb+' đồng');
                $('.price').each(function(index, el) {
                    $(this).text($(this).text().toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
                });
                $('.money').each(function(index, el) {
                    $(this).text($(this).text().toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
                });
                $(".total").text($(".total").text().toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
                $(".debt").text($(".debt").text().toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
                $(".paied").text($(".paied").text().toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
                
            });
        });
    </script>
@endsection