@extends('layout/main')
@section('stylesheet')
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
@endsection
    
@section('content')
        <div class="row">
            
            <div class="col-md-9">
                <div class="ibox-content m-b-sm m-t-sm border-bottom">   
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Hóa Đơn</h3>
                        </div>
                        {{Form::open(['method'=>'POST','route'=>'order.store','class'=>'form-horizontal'])}}
                        <div class="col-md-12">
                            <div class="col-md-6 b-r">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Đại lý:</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" id="agency_idhidden" name="agency_idhidden">
                                        {{Form::select('',$agency,null,array('class'=>'form-control agency'))}}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="abc">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Địa chỉ</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Số tài khoản:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <label class="col-sm-5 control-label">Chi tiết hóa đơn</label>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mã số thuế:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="taxcode" class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ngày xuất:</label>
                                        <div class="input-group date col-sm-8" style="padding-left: 15px;padding-right: 15px">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" name="dateship" type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 media">
                                <table class=" detailorder table table-bordered" style="font-size: 12px">
                                    <thead >
                                        <tr>
                                            <th class="text-center">STT</th>
                                            <th class="text-center">Tên mặt hàng</th>
                                            <th class="text-center">Đơn vị tính</th>
                                            <th class="text-center">Đơn giá</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                        <span class="total">0 đ</span>
                                                        <input type="hidden" name="totalall" class="totalhidden">
                                                    </div>
                                                </div>
                                                <div class="hr-line-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" style="font-weight: 400 !important">Đã trả:</label>
                                                    <div class="col-sm-8" style="padding-left: 2px !important;">
                                                        <input style="font-size: 12px;" name="paied" value="0 đ" type="text" class="form-control payprev">
                                                    </div>
                                                </div>
                                                <div class="hr-line-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" style="font-weight: 400 !important">Nợ lại:</label>
                                                    <div class="col-sm-8" style="margin-top: 8px">
                                                        <span class="debt"></span>
                                                        <input class="debthidden" name="total" type="hidden">
                                                    </div>
                                                </div>
                                            </td>
                                            
                                      
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="form-group text-center">
                                    <button class="btn btn-danger btn-sm" >Thoát</button>
                                    <button class="btn btn-primary btn-sm" type="submit">Lưu</button>
                                </div>
                                
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="ibox-content m-b-sm m-t-sm border-bottom">
                    <h3>Sản phẩm hiện có</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="p-1">ID</th>
                                <th class="p-1">Tên sản phẩm</th>
                                <th class="p-1">Đơn giá</th>
                                <th class="p-1">ĐVT</th>
                                <th class="p-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row->id}}</td>   
                                    <td class="nameProduct">{{$row->nameproduct}}</td>  
                                    <td>{{$row->price}}</td>    
                                    <td>{{$row->unit}}</td>    
                                    <td class="addProduct" style="cursor: pointer;"><i class="fa fa-plus"></i></td>
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                        
                    </table>
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
            function countproduct(){
                $valueKG = 0;
                $valueGoi = 0;
                $countKG=0;
                $countGoi=0;
                $('.sl').each(function(index, el) {
                    if ($(this).parent().prev().prev().text()=="KG") {
                        $valueKG += parseInt($(this).val());
                        $countKG+=1;
                    }else{
                        $valueGoi+= parseInt($(this).val());
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
            
            }
            var DOCSO=function(){
                var t=["không","một","hai","ba","bốn","năm","sáu","bảy","tám","chín"],r=function(r,n){var o="",a=Math.floor(r/10),e=r%10;return a>1?(o=" "+t[a]+" mươi",1==e&&(o+=" mốt")):1==a?(o=" mười",1==e&&(o+=" một")):n&&e>0&&(o=" lẻ"),5==e&&a>=1?o+=" lăm":4==e&&a>=1?o+=" tư":(e>1||1==e&&0==a)&&(o+=" "+t[e]),o},n=function(n,o){var a="",e=Math.floor(n/100),n=n%100;return o||e>0?(a=" "+t[e]+" trăm",a+=r(n,!0)):a=r(n,!1),a},o=function(t,r){var o="",a=Math.floor(t/1e6),t=t%1e6;a>0&&(o=n(a,r)+" triệu",r=!0);var e=Math.floor(t/1e3),t=t%1e3;return e>0&&(o+=n(e,r)+" nghìn",r=!0),t>0&&(o+=n(t,r)),o};return{doc:function(r){if(0==r)return t[0];var n="",a="";do ty=r%1e9,r=Math.floor(r/1e9),n=r>0?o(ty,!0)+a+n:o(ty,!1)+a+n,a=" tỷ";while(r>0);return n.trim()}}}();                 
            function nolai(){
                var a  = $('.payprev').val().replace("đ","").replace(/,/g,"");
                var b = $(".total").text().replace("đ","").replace(/,/g,"");
                var c = b-a;
                var bb=DOCSO.doc(c);
                bb=bb.charAt(0).toUpperCase() + bb.slice(1);
                $('#docchu').text(bb+' đồng');
                $(".debthidden").val(c);
                c = c.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ';
                $(".debt").text(c);
                

            }
            //Thêm sản phẩm vào bảng bill
            $(".addProduct").click(function() {
                stt++;
                var valueProduct = $(this).prev().prev();
                var keyProduct = $(this).prev().prev().prev().prev().html();
                var unit = $(this).prev().html();
                var nameProduct = valueProduct.prev().html();
                var addProduct ='<tr class="text-center centercolumn"><td>'+stt+'</td><td>'+nameProduct+'<input class="keyProduct" name="keyProduct[]" type="hidden" value="'+keyProduct+'"></td><td>'+unit+'</td><td class="valueProduct">'+valueProduct.html()+'</td><td><input class="sl" style="width:50px;" value="0" min="1" name="count[]" type="number"></td><td><span class="into">0 đ</span><input type="hidden" name="thanhtien[]" class="intohidden"></td><td class="delete">Xóa</td></tr>';
                $('.detailorder').find('tbody').append(addProduct);
            });
            //tính thành tiền 1 sản phẩm
            function Total(){
                var tt = 0;
                $('.into').each(function(index, el) {
                    var a = $(this).text().replace("đ","");
                    a = a.replace(/,/g,"");
                    tt+= parseInt(a);
                });
                $('.totalhidden').val(tt);
                tt = tt.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ';
                $('.total').text(tt);

            }
            function reCount(){
                var i = 1;
                $('.detailorder tbody tr').each(function(){
                    $(this).closest('tr').find('td:first-child').text(i);
                    i++;
                });
            }
            //thanh tien` 1 sp
            $("body").on('change', '.sl', function() {
                var numberProduct = $(this);
                var valueProduct = $(this).parent().prev();
                var Value = valueProduct.text().replace("đ","");
                Value = Value.replace(/,/g,"");
                var intoValueProduct = numberProduct.val() * Value;
                var intoProduct = $(valueProduct).next().next().find('.intohidden').val(intoValueProduct);
                intoValueProduct = intoValueProduct.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ';
                var intoProduct = $(valueProduct).next().next().find('.into').text(intoValueProduct);
                
                Total();
                countproduct();
                nolai();
            });
            $('.payprev').change(function() {
                nolai();
                $(this).val($(this).val().toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")+ ' đ');
            });
            //delete product
            $('body').on('click', '.delete', function() {
                stt-=1;
                $(this).closest('tr').remove();
                Total();
                reCount();
                countproduct();
                nolai();
            });
            $('.agency').change(function() {
                $agency_id = $(this).val();
                $('#agency_idhidden').val($agency_id);
                $.get("agency/"+$agency_id,function(data){
                    $(".abc").html(data);
                });
            });
        });
    </script>
@endsection