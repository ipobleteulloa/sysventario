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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Revision</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/revisions') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="codigo">C&oacute;digo</label>
            <input class="form-control" id="codigo" name="codigo" nametype="codigo">
          </div>
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" nametype="nombre">
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Registrar" />
        </form>
        @include ('layouts.errors')
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
</body>

</html>
