<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SySVentario</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/funkyradio.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  @include ('layouts.nav')
  
  
  <div class="content-wrapper">
    <div class="container-fluid">
	
	    @yield ('content')

    </div>
    <!-- /.container-fluid-->
    
	<!-- Footer + plugins-->
	@include ('layouts.footer')
	
  </div>
  <!-- /.content-wrapper-->

</body>

</html>
