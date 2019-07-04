@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Editar {{ $zebra->nombre }}</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/zebras/'. $zebra->id ) }}">
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="InputName">C&oacute;digo</label>
                <input class="form-control" id="InputCodigo" name="codigo" type="text" value="{{ $zebra->codigo }}" readonly>
              </div>
            </div>
          </div> 
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="InputNombre">Nombre zebra</label>
                <input class="form-control" id="InputNombre" name="nombre" type="text" value="{{ $zebra->nombre }}" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
              <label for="InputModelo">Modelo</label>
              <input class="form-control" id="InputModelo" name="modelo" type="text" value="{{ $zebra->modelo }}" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
              <label for="InputNSerie">N&uacute;mero de serie</label>
              <input class="form-control" id="InputNSerie" name="nserie" type="text" value="{{ $zebra->nserie }}" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="ConfirmPassword">Ubicaci&oacute;n  </label>
                <input class="form-control" id="InputUbicacion" name="ubicacion" type="text" value="{{ $zebra->ubicacion }}" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="ConfirmPassword">Tipo de conexi&oacute;n  </label>
                <input class="form-control" id="InputTipoConexion" name="tipo_conexion" type="text" value="{{ $zebra->tipo_conexion }}" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="Estado">Estado  </label>
                <div class="funkyradio">
                    <div class="funkyradio-success  col-md-5">
                      <input type="radio" name="estado_id" id="radio1" value="1" {{ $zebra->estado_id == '1' ? 'CHECKED' : '' }} />
                      <label for="radio1">Activo</label>
                    </div>
                    <div class="funkyradio-danger  col-md-5">
                      <input type="radio" name="estado_id" id="radio2" value="2" {{ $zebra->estado_id == '2' ? 'CHECKED' : '' }} />
                      <label for="radio2">De baja</label>
                    </div>
                    <div class="funkyradio-warning  col-md-5">
                      <input type="radio" name="estado_id" id="radio3" value="3" {{ $zebra->estado_id == '3' ? 'CHECKED' : '' }} />
                      <label for="radio3">En revisi&oacute;n</label>
                    </div>
                    <div class="funkyradio-default col-md-5">
                      <input type="radio" name="estado_id" id="radio4" value="4" {{ $zebra->estado_id == '4' ? 'CHECKED' : '' }} />
                      <label for="radio4">Contingencia</label>
                    </div>
                </div>
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
                    <option value="{{ $sector->id }}" {{ ($sector->id == $zebra->sector_id) ? 'SELECTED' : '' }} >{{ $sector->nombre }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
          <br/>
          <input class="btn btn-primary btn-block" id="ZebrasSubmit" type="submit" value="Editar Zebra">
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