@extends ('layouts.main')

@section ('content')
	
	<div class="card card-register mx-auto mt-5">
    <div class="card-header">Agregar un Usuario</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/usuarios') }}">
  			{{ csrf_field() }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleInputName">Nombre</label>
              <input class="form-control" id="InputNombre" name="nombre" type="text" placeholder="Ingrese el nombre" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleInputName">Apellidos</label>
              <input class="form-control" id="InputApellidos" name="apellidos" type="text" placeholder="Ingrese los apellidos" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleInputName">RUT</label>
              <input class="form-control" id="InputRUT" name="rut" type="text" placeholder="Ingrese el RUT" required>
            </div>
          </div>
        </div>  
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
      				<label for="exampleInputEmail1">Email</label>
      				<input class="form-control" id="InputEmail" name="email" type="text" placeholder="Ingrese email">
  			    </div>
  			  </div>
        </div>
  		  <br/>
  		  <input class="btn btn-primary btn-block" id="UsuarioSubmit" type="submit" value="Agregar Usuario">
      @include ('layouts.errors')
      </form>
    </div>
  </div>

@endsection