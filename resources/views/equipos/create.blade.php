@extends ('layouts.main')

@section ('content')
	
	<div class="card card-register mx-auto mt-5">
      <div class="card-header">Agregar un equipo</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/equipos') }}">
    			{{ csrf_field() }}
    		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nombre equipo</label>
                <input class="form-control" id="InputNombre" name="nombre" type="text" placeholder="Ingrese el nombre" required>
              </div>
    			  </div>
          </div>  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
        				<label for="exampleInputEmail1">Procesador</label>
        				<input class="form-control" id="InputProcesador" name="procesador" type="text" placeholder="Ingrese el procesador" required>
    			    </div>
    			  </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputEmail1">RAM</label>
                <input class="form-control" id="InputRAM" name="ram" type="text" placeholder="Ingrese la RAM" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputEmail1">HDD</label>
                <input class="form-control" id="InputHDD" name="hdd" type="text" placeholder="Ingrese el disco duro" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputEmail1">Placa Madre</label>
                <input class="form-control" id="InputPlacaMadrer" name="placa_madre" type="text" placeholder="Ingrese el modelo de placa madre" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="SistemaOperativo">Sistema Operativo</label>
            <select class="form-control m-bot15" name="sistemaoperativo_id">
              @if ($so->count())
                  <option value="" >Seleccione una opción</option>
                  @foreach ($so as $soperativo)
                  <option value="{{ $soperativo->id }}" >{{ $soperativo->nombre }}</option>
                  @endforeach
              @endif
            </select>
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
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="ConfirmPassword">Ubicaci&oacute;n 	</label>
                <input class="form-control" id="InputUbicacion" name="ubicacion" type="text" placeholder="Ingrese la ubicaci&oacute;n donde se usar&aacute;">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Estado">Estado  </label>
                <div class="funkyradio">
                  <div class="funkyradio-success  col-md-5">
                    <input type="radio" name="estado_id" id="radioe1" value="1" CHECKED />
                    <label for="radioe1">Activo</label>
                  </div>
                  <div class="funkyradio-default col-md-5">
                    <input type="radio" name="estado_id" id="radioe3" value="4" />
                    <label for="radioe3">Contingencia</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
    		  
    		  <input class="btn btn-primary btn-block" id="EquipoSubmit" type="submit" value="Agregar Equipo">
        @include ('layouts.errors')
        </form>

      </div>
    </div>

@endsection