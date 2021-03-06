@extends ('layouts.main')

@section ('content')
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <a href="{{ url('zebras/') }}" class="btn btn-secondary btn-sm submenu">Todas</a>
    <a href="{{ url('zebras/activas') }}" class="btn btn-secondary btn-sm submenu">Activas</a>
    <a href="{{ url('zebras/debaja') }}" class="btn btn-secondary btn-sm submenu">De baja</a>
    <a href="{{ url('zebras/enrevision') }}" class="btn btn-secondary btn-sm submenu">En revisión</a>
    <a href="{{ url('zebras/contingencia') }}" class="btn btn-secondary btn-sm submenu">Contingencia</a>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Listado de Zebras
      @if (Auth::check())
      <a href="{{ url('zebras/create') }}" class="btn btn-primary f_right">Agregar Zebra</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Modelo</th>
              <th>Tipo de conexi&oacute;n</th>
              @if (Auth::check())
              <th>Acciones</th>
              @endif>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Modelo</th>
              <th>Tipo de conexi&oacute;n</th>
              @if (Auth::check())
              <th>Acciones</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
      @foreach ($zebras as $zebra)
      <tr>
        <td><a href="{{ url('zebras/'.$zebra->id) }}">{{ $zebra->codigo }}</a></td>
        <td>{{ $zebra->nombre }}</td>
        <td>{{ $zebra->modelo }}</td>
        <td>{{ $zebra->tipo_conexion }}</td>
        @if (Auth::check())
        <td>
          <div class="text-center">
            <div class="acciones">
              <a href="{{ url('zebras/'. $zebra->id .'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
            </div>
            &nbsp;
            <div class="acciones">
                <a href="{{ url('zebras/'. $zebra->id .'/mantencion') }}" class="btn btn-success btn-sm">Mantenci&oacute;n</a>
            </div>
            @if( $zebra->estado_id != "2")
            &nbsp;
              <div class="acciones">
                <form action="{{ url('zebras/'. $zebra->id) }}" method="POST" onsubmit="return confirm('¿Desea dar de baja esta zebra?')">
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
    <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
  </div>
@endsection ('content')

