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
  <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Solicitar Nuevo Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>¿Olvidó su password?</h4>
          <p>Ingrese su mail y se le enviarán instrucciones para resetearlo.</p>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}
           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input class="form-control" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
          </div>
          @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif          
          <button type="submit" class="btn btn-primary btn-block">Enviar link a mi correo</button>
        </form>
        <div class="text-center">
            <a class="d-block small mt-3" href="{{ route('register') }}">Registrar una cuenta</a>
            <a class="d-block small" href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/popper/popper.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>

</html>
