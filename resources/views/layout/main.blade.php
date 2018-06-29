<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="{{asset('')}}">
    <title>INSPINIA | Contacts 2</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @yield('stylesheet')
</head>

<body>

    <div id="wrapper">

    @include('layout/navbar')
    @yield('content')       
    @include('layout/footer')   
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
	@yield('script')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
        $url = window.location.pathname;
        if ($url.indexOf('view/product')!=-1) {
            $('#product').addClass('active');
        }else{
            $('#product').removeClass('active');
        }
        if ($url.indexOf('view/order')!=-1) {
            $('#order').addClass('active');
        }else{
            $('#order').removeClass('active');
        }
        if ($url.indexOf('view/agency')!=-1) {
            $('#agency').addClass('active');
        }else{
            $('#agency').removeClass('active');
        }
        if ($url.indexOf('view/statistics')!=-1) {
            $('#statistics').addClass('active');
        }else{
            $('#statistics').removeClass('active');
        }
        });
    </script>
</body>

</html>
