@extends ('layouts.main')

@section ('content')
	
	<div class="card card-register mx-auto mt-5">
      <div class="card-header">Agregar un Sector</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/sectores') }}">
    			{{ csrf_field() }}
    		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nombre sector</label>
                <input class="form-control" id="InputNombre" name="nombre" type="text" placeholder="Ingrese el nombre" required>
              </div>
    			  </div>
          </div>  
          <br/>
    		  <input class="btn btn-primary btn-block" id="SectorSubmit" type="submit" value="Agregar Sector">
        @include ('layouts.errors')
        </form>
      </div>
    </div>

@endsection