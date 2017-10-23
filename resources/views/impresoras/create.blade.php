@extends ('layouts.main')

@section ('content')
	
	<div class="card card-register mx-auto mt-5">
      <div class="card-header">Agregar una impresora</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/impresoras') }}">
    			{{ csrf_field() }}
    		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nombre impresora</label>
                <input class="form-control" id="InputNombre" name="nom_imp" type="text" placeholder="Ingrese el nombre" required>
              </div>
    			  </div>
          </div>  
    		  <div class="form-group">
            <div class="form-row">	  
              <div class="col-md-12">
                <label for="exampleInputLastName">Marca</label>
                <input class="form-control" id="InputLastMarca" name="marca" type="text" placeholder="Ingrese la marca" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
      				<label for="exampleInputEmail1">Modelo</label>
      				<input class="form-control" id="InputModelo" name="modelo" type="text" placeholder="Ingrese el modelo" required>
      			  </div>
      			</div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">Insumos</label>
                <input class="form-control" id="InputInsumos" name="insumos" type="text" placeholder="Ingrese los insumos que utiliza" required>
              </div>
    			  </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Ubicaci&oacute;n 	</label>
                <input class="form-control" id="InputUbicacion" name="ubicacion" type="text" placeholder="Ingrese la ubicaci&oacute;n donde se usar&aacute;">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Tipo de conexi&oacute;n  </label>
                <input class="form-control" id="InputTipoConexion" name="tipo_conexion" type="text" placeholder="Ingrese el tipo de conexi&oacute;n al pc">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Estado">Estado  </label>
                <div class="funkyradio">
                    <div class="funkyradio-success  col-md-5">
                      <input type="radio" name="estado_id" id="radio1" value="1" CHECKED />
                      <label for="radio1">Activo</label>
                    </div>
                    <div class="funkyradio-default col-md-5">
                      <input type="radio" name="estado_id" id="radio3" value="4" />
                      <label for="radio3">Contingencia</label>
                    </div>
                </div>
              </div>
            </div>
          </div>
    		  <br/>
    		  <input class="btn btn-primary btn-block" id="ImpresorasSubmit" type="submit" value="Agregar Impresora">
              <!--<a class="btn btn-primary btn-block" href="login.html">Agregar Impresora</a>-->
        @include ('layouts.errors')
        </form>



		
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
      </div>
    </div>

@endsection