@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Editar {{ $sistemaOperativo->nombre }}</div>
    <div class="card-body">
      <form method="POST" action="{{ URL::asset('/sistemaoperativo/'. $sistemaOperativo->id ) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleInputName">Nombre sistema operativo</label>
              <input class="form-control" id="InputNombre" name="nombre" type="text" value="{{ $sistemaOperativo->nombre }}" required>
            </div>
          </div>
        </div>  
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
            <label for="exampleInputEmail1">Arquitectura</label>
            <input class="form-control" id="InputArquitectura" name="arquitectura" type="text" value="{{ $sistemaOperativo->arquitectura }}" required>
            </div>
          </div>
        </div>
        <br/>
        <input class="btn btn-primary btn-block" id="SOSubmit" type="submit" value="Editar Sistema Operativo">
            <!--<a class="btn btn-primary btn-block" href="login.html">Agregar Zebra</a>-->
      @include ('layouts.errors')
      </form>
    </div>
  </div>

@endsection