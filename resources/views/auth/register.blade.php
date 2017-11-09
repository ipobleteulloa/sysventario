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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrar una cuenta</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/register') }}">
        	{{ csrf_field() }}
          <div class="form-group">
		    <label for="name">Nombre</label>
		    <input class="form-control" id="name" name="name" type="text" required>
          <div class="form-group">
            <label for="email1">Email</label>
            <input class="form-control" id="email" name="email" type="email" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input class="form-control" id="password" name=password type="password" required>
              </div>
              <div class="col-md-6">
                <label for="password_confirmation">Repetir password</label>
                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Registrar" />
        </form>
        @include ('layouts.errors')
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
