@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Editar {{ $encargado->nombre }}</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/encargados/'. $encargado->id ) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="InputName">Nombre encargado</label>
              <input class="form-control" id="InputNombre" name="nombre" type="text" value="{{ $encargado->nombre }}" required>
            </div>
          </div>
        </div>  
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
            <label for="InputEmail">Email</label>
            <input class="form-control" id="InputEmail" name="email" type="text" value="{{ $encargado->email }}" required>
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
                    <input type="checkbox" name="sector[]" id="radio{{ $key+1 }}" value="{{ $sector->id }}" 
                    {{ $encargado->sectores->contains('id', $sector->id) ? 'CHECKED' : '' }} />
                    <label for="radio{{ $key+1 }}">{{ $sector->nombre }}</label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <br/>
        <input class="btn btn-primary btn-block" id="SOSubmit" type="submit" value="Editar Encargado">
            <!--<a class="btn btn-primary btn-block" href="login.html">Agregar Zebra</a>-->
      @include ('layouts.errors')
      </form>
    </div>
  </div>

@endsection