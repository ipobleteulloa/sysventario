@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Editar {{ $equipo->nombre }}</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/equipos/'. $equipo->id ) }}">
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">C&oacute;digo</label>
                <input class="form-control" id="InputCodigo" name="codigo" type="text" value="{{ $equipo->codigo }}" readonly>
              </div>
            </div>
          </div> 
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Nombre equipo</label>
                <input class="form-control" id="InputNombre" name="nombre" type="text" value="{{ $equipo->nombre }}" required>
              </div>
            </div>
          </div>  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputEmail1">Procesador</label>
                <input class="form-control" id="InputProcesador" name="procesador" type="text" value="{{ $equipo->procesador }}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputEmail1">Ram</label>
                <input class="form-control" id="InputRam" name="ram" type="text" value="{{ $equipo->ram }}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputEmail1">HDD</label>
                <input class="form-control" id="InputHDD" name="hdd" type="text" value="{{ $equipo->hdd }}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputEmail1">Placa Madre</label>
                <input class="form-control" id="InputPlacaMadre" name="placa_madre" type="text" value="{{ $equipo->placa_madre }}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="soperativo">Sistema Operativo</label>
                <select class="form-control m-bot15" name="soperativo">
                  @if ($soperativos->count())
                    @foreach ($soperativos as $so)
                    <option value="{{ $so->id }}" {{ ($so->id == $equipo->sistemaoperativo_id) ? 'SELECTED' : '' }} >{{ $so->nombre }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="sector_id">Sector</label>
                <select class="form-control m-bot15" name="sector_id">
                  @if ($sectores->count())
                    @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}" {{ ($sector->id == $equipo->sector_id) ? 'SELECTED' : '' }} >{{ $sector->nombre }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Ubicaci&oacute;n  </label>
                <input class="form-control" id="InputUbicacion" name="ubicacion" type="text" value="{{ $equipo->ubicacion }}" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Estado">Estado  </label>
                <div class="funkyradio">
                    <div class="funkyradio-success  col-md-5">
                      <input type="radio" name="estado_id" id="radio1" value="1" {{ $equipo->estado_id == '1' ? 'CHECKED' : '' }} />
                      <label for="radio1">Activo</label>
                    </div>
                    <div class="funkyradio-danger  col-md-5">
                      <input type="radio" name="estado_id" id="radio2" value="2" {{ $equipo->estado_id == '2' ? 'CHECKED' : '' }} />
                      <label for="radio2">De baja</label>
                    </div>
                    <div class="funkyradio-warning  col-md-5">
                      <input type="radio" name="estado_id" id="radio3" value="3" {{ $equipo->estado_id == '3' ? 'CHECKED' : '' }} />
                      <label for="radio3">En revisi&oacute;n</label>
                    </div>
                    <div class="funkyradio-default col-md-5">
                      <input type="radio" name="estado_id" id="radio4" value="4" {{ $equipo->estado_id == '4' ? 'CHECKED' : '' }} />
                      <label for="radio4">Contingencia</label>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <input class="btn btn-primary btn-block" id="EquipoSubmit" type="submit" value="Editar Equipo">

        @include ('layouts.errors')
        </form>

      </div>
    </div>

@endsection