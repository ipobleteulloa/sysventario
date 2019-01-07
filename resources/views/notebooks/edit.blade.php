@extends ('layouts.main')
@section ('content')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Editar {{ $notebook->codigo }}</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/notebooks/'. $notebook->id) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Marca">Marca</label>
              <input class="form-control" id="InputMarca" name="marca" type="text" value="{{ $notebook->marca }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Modelo">Modelo</label>
              <input class="form-control" id="InputModelo" name="modelo" type="text" value="{{ $notebook->modelo }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Pantalla">Pantalla</label>
              <input class="form-control" id="InputPantalla" name="pantalla" type="text" value="{{ $notebook->pantalla }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Procesador">Procesador</label>
              <input class="form-control" id="InputProcesador" name="procesador" type="text" value="{{ $notebook->procesador }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="RAM">RAM</label>
              <input class="form-control" id="InputRAM" name="ram" type="text" value="{{ $notebook->ram }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="HDD">HDD</label>
              <input class="form-control" id="InputHDD" name="hdd" type="text" value="{{ $notebook->hdd }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Numero de serie">N&uacute;mero de serie</label>
              <input class="form-control" id="InputNserie" name="nserie" type="text" value="{{ $notebook->nserie }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="ModeloBateria">Modelo de bater&iacute;a</label>
              <input class="form-control" id="InputModeloBateria" name="mod_bateria" type="text" value="{{ $notebook->mod_bateria }}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Numero de serie">Modelo de cargador</label>
              <input class="form-control" id="InputModeloCargador" name="mod_cargador" type="text" value="{{ $notebook->mod_cargador }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="SistemaOperativo">Sistema Operativo</label>
          <select class="form-control m-bot15" name="sistemaoperativo_id">
            @if ($soperativos->count())
              <option selected disabled>Seleccione una opción</option>
              @foreach ($soperativos as $so)
                <option value="{{ $so->id }}" {{ ($so->id == $notebook->sistemaoperativo_id) ? 'SELECTED' : '' }} >{{ $so->nombre }}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Estado">Estado</label>
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
        <div class="form-group">
          <label for="Observaciones">Observaciones</label>
          <textarea class="form-control" rows="5" id="InputObservaciones" name="observaciones">{{ $notebook->observaciones }}</textarea>
        </div> 
        <input class="btn btn-primary btn-block" id="NotebookSubmit" type="submit" value="Editar notebook">
      @include ('layouts.errors')
      </form>
    </div>
  </div>
@endsection