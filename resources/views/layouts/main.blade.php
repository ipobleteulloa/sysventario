<!DOCTYPE html>
<html>

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
  <!-- Easy Autocomplete -->
  <link href="{{ URL::asset('vendor/easy-autocomplete/easy-autocomplete.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/easy-autocomplete/easy-autocomplete.themes.min.css') }}" rel="stylesheet">


  <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('js/sb-admin.min.js') }}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ URL::asset('js/sb-admin-datatables.min.js') }}"></script>
    <!-- Easy Autocomplete JS -->
    <script src="{{ URL::asset('vendor/easy-autocomplete/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
