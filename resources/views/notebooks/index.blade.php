@extends ('layouts.main')

@section ('content')
<!-- Breadcrumbs-->

  <ol class="breadcrumb">
    <a href="{{ url('notebooks/') }}" class="btn btn-secondary btn-sm submenu">Todos</a>
    <a href="{{ url('notebooks/activos') }}" class="btn btn-secondary btn-sm submenu">Activos</a>
    <a href="{{ url('notebooks/debaja') }}" class="btn btn-secondary btn-sm submenu">De baja</a>
    <a href="{{ url('notebooks/enrevision') }}" class="btn btn-secondary btn-sm submenu">En revisión</a>
    <a href="{{ url('notebooks/contingencia') }}" class="btn btn-secondary btn-sm submenu">Contingencia</a>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Listado de Notebooks
      @if (Auth::check())
      <a href="{{ url('notebooks/create') }}" class="btn btn-primary f_right">Agregar Notebook</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Usuario</th>
              <th>Marca</th>
              <th>Modelo</th>
              @if (Auth::check())
              <th>Acciones</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Usuario</th>
              <th>Marca</th>
              <th>Modelo</th>
              @if (Auth::check())
              <th>Acciones</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
            @foreach ($notebooks as $notebook)
            <tr>
              <td><a href="{{ url('notebooks/'. $notebook->id) }}"> {{ $notebook->codigo }} </a></td>
              <td>{{ $notebook->entregaActual->usuario->nombre_completo ?? 'SIN USUARIO ASIGNADO' }}</td>
              <td> {{ $notebook->marca }} </td>
              <td> {{ $notebook->modelo }} </td>
              @if (Auth::check())
              <td>
                <div>
                  <div class="acciones">
                    <a href="{{ url('notebooks/'. $notebook->id .'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
                  </div>
                  &nbsp;
                  <div class="acciones">
                    <a href="{{ url('notebooks/'. $notebook->id .'/mantencion') }}" class="btn btn-success btn-sm">Mantenci&oacute;n</a>
                  </div>
                  @if( $notebook->estado_id != "2")
                  &nbsp;
                    <div class="acciones">
                      <form action="{{ url('notebooks/'. $notebook->id) }}" method="POST" onsubmit="return confirm('¿Desea dar de baja este notebook?')">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="dardebaja" value="dardebaja" />
                        <button class="btn btn-danger btn-sm" type="submit">Dar de baja</button>
                      </form>
                    </div>
                  @endif
                </div>
              </td>
              @endif
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection ('content')
