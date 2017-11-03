@extends ('layouts.main')

@section ('content')
	
	<div class="card card-register mx-auto mt-5">
      <div class="card-header">Agregar un Sistema Operativo</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/sistemaoperativo') }}">
    			{{ csrf_field() }}
    		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nombre sistema operativo</label>
                <input class="form-control" id="InputNombre" name="nombre" type="text" placeholder="Ingrese el nombre" required>
              </div>
    			  </div>
          </div>  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
        				<label for="exampleInputEmail1">Arquitectura</label>
        				<input class="form-control" id="InputModelo" name="arquitectura" type="text" placeholder="Ingrese la arquitectura" required>
    			    </div>
    			  </div>
          </div>
    		  <br/>
    		  <input class="btn btn-primary btn-block" id="SOSubmit" type="submit" value="Agregar Sistema Operativo">
              <!--<a class="btn btn-primary btn-block" href="login.html">Agregar Zebra</a>-->
        @include ('layouts.errors')
        </form>



		
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
      </div>
    </div>

@endsection