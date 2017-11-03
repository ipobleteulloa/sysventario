@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Agregar mantención a {{ $info->nombre }}</div>
      <div class="card-body">
        <form method="POST" action="{{ URL::asset('/mantenciones' ) }}">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">C&oacute;digo</label>
                <input class="form-control" id="InputCodigo" name="codigo" type="text" value="{{ $info->codigo }}" readonly>
              </div>
            </div>
          </div> 
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Detalle</label>
                <textarea class="form-control" rows="5" id="detalle" name="detalle"required></textarea>
              </div>
            </div>
          </div>
          <br/>
          <input class="btn btn-primary btn-block" id="MantencionSubmit" type="submit" value="Agregar mantención">

        @include ('layouts.errors')
        </form>

      </div>
    </div>

@endsection