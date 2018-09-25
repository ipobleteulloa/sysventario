@extends ('layouts.main')
@section ('content')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Agregar un notebook</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/notebooks') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Marca">Marca</label>
              <input class="form-control" id="InputMarca" name="marca" type="text" placeholder="Ingrese la marca" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Modelo">Modelo</label>
              <input class="form-control" id="InputModelo" name="modelo" type="text" placeholder="Ingrese el modelo" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Pantalla">Pantalla</label>
              <input class="form-control" id="InputPantalla" name="pantalla" type="text" placeholder="Ingrese el tamaño de pantalla" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Procesador">Procesador</label>
              <input class="form-control" id="InputProcesador" name="procesador" type="text" placeholder="Ingrese el procesador" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="RAM">RAM</label>
              <input class="form-control" id="InputRAM" name="ram" type="text" placeholder="Ingrese la cantidad de RAM" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="HDD">HDD</label>
              <input class="form-control" id="InputHDD" name="hdd" type="text" placeholder="Ingrese el tamaño de disco duro" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Numero de serie">N&uacute;mero de serie</label>
              <input class="form-control" id="InputNserie" name="nserie" type="text" placeholder="Ingrese el n&uacute;mero de serie" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="ModeloBateria">Modelo de bater&iacute;a</label>
              <input class="form-control" id="InputModeloBateria" name="mod_bateria" type="text" placeholder="Ingrese el modelo de bater&iacute;a">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="Numero de serie">Modelo de cargador</label>
              <input class="form-control" id="InputModeloCargador" name="mod_cargador" type="text" placeholder="Ingrese el modelo de cargador" required>
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
          <textarea class="form-control" rows="5" id="InputObservaciones" name="observaciones"></textarea>
        </div> 
        <input class="btn btn-primary btn-block" id="NotebookSubmit" type="submit" value="Agregar Notebook">
      @include ('layouts.errors')
      </form>
    </div>
  </div>
@endsection