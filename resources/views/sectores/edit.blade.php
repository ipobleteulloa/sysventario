@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Editar {{ $sector->nombre }}</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/sectores/'. $sector->id ) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleInputName">Nombre sector</label>
              <input class="form-control" id="InputNombre" name="nombre" type="text" value="{{ $sector->nombre }}" required>
            </div>
          </div>
        </div>  
        <br/>
        <input class="btn btn-primary btn-block" id="SectorSubmit" type="submit" value="Editar Sector">
      @include ('layouts.errors')
      </form>
    </div>
  </div>

@endsection