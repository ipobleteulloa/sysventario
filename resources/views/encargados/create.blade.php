@extends ('layouts.main')

@section ('content')
	
	<div class="card card-register mx-auto mt-5">
    <div class="card-header">Agregar un Encargado</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/encargados') }}">
  			{{ csrf_field() }}
  		  <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleInputName">Nombre encargado</label>
              <input class="form-control" id="InputNombre" name="nombre" type="text" placeholder="Ingrese el nombre" required>
            </div>
  			  </div>
        </div>  
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
      				<label for="exampleInputEmail1">Email</label>
      				<input class="form-control" id="InputEmail" name="email" type="text" placeholder="Ingrese email" required>
  			    </div>
  			  </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Estado">Sector</label>
              <div class="funkyradio">
                @foreach ($sectores as $key => $sector)
                  <div class="funkyradio-success  col-md-5">
                    <input type="checkbox" name="sector[]" id="radio{{ $key+1 }}" value="{{ $sector->id }}" />
                    <label for="radio{{ $key+1 }}">{{ $sector->nombre }}</label>
                  </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>      
  		  <br/>
  		  <input class="btn btn-primary btn-block" id="EncargadoSubmit" type="submit" value="Agregar Encargado">
      @include ('layouts.errors')
      </form>
    </div>
  </div>

@endsection