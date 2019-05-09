@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Editar {{ $usuario->nombre }}</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/usuarios/'. $usuario->id ) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="InputName">Nombre usuario</label>
              <input class="form-control" id="InputNombre" name="nombre" type="text" value="{{ $usuario->nombre }}" required>
            </div>
          </div>
        </div> 
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="InputName">Apellidos usuario</label>
              <input class="form-control" id="InputApellidos" name="apellidos" type="text" value="{{ $usuario->apellidos }}" required>
            </div>
          </div>
        </div> 
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="InputName">RUT usuario</label>
              <input class="form-control" id="InputRUT" name="rut" type="text" value="{{ $usuario->rut }}" required>
            </div>
          </div>
        </div>  
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
            <label for="InputEmail">Email</label>
            <input class="form-control" id="InputEmail" name="email" type="text" value="{{ $usuario->email }}" required>
            </div>
          </div>
        </div>
        <br/>
        <input class="btn btn-primary btn-block" id="UsuarioSubmit" type="submit" value="Editar usuario">
      @include ('layouts.errors')
      </form>
    </div>
  </div>

@endsection