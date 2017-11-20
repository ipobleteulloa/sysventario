@extends ('layouts.main')

@section ('content')
	
	<div class="card card-register mx-auto mt-5">
      <div class="card-header">Agregar una okidata</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/okidatas') }}">
    			{{ csrf_field() }}
    		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nombre okidata</label>
                <input class="form-control" id="InputNombre" name="nombre" type="text" placeholder="Ingrese el nombre" required>
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
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Sector">Sector</label>
                <select class="form-control m-bot15" name="sector_id">
                  @if ($sectores->count())
                    <option value="" >Seleccione una opción</option>
                    @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}" >{{ $sector->nombre }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
    		  <br/>
    		  <input class="btn btn-primary btn-block" id="OkidatasSubmit" type="submit" value="Agregar Okidata">
        @include ('layouts.errors')
        </form>
      </div>
    </div>

@endsection