@extends ('layouts.main')

@section ('content')
<!-- Breadcrumbs-->

  <ol class="breadcrumb">
    <a href="{{ url('equipos/') }}" class="btn btn-secondary btn-sm submenu">Todos</a>
    <a href="{{ url('equipos/activos') }}" class="btn btn-secondary btn-sm submenu">Activos</a>
    <a href="{{ url('equipos/debaja') }}" class="btn btn-secondary btn-sm submenu">De baja</a>
    <a href="{{ url('equipos/enrevision') }}" class="btn btn-secondary btn-sm submenu">En revisión</a>
    <a href="{{ url('equipos/contingencia') }}" class="btn btn-secondary btn-sm submenu">Contingencia</a>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Listado de Equipos
      @if (Auth::check())
      <a href="{{ url('equipos/create') }}" class="btn btn-primary f_right">Agregar Equipo</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <!-- <th>Ubicación</th> -->
              <th>Sector</th>
              @if (Auth::check())
              <th>Acciones</th>
              @endif
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Codigo</th>
			        <th>Nombre</th>
              <!-- <th>Ubicación</th> -->
              <th>Sector</th>
              @if (Auth::check())
              <th>Acciones</th>
              @endif
            </tr>
          </tfoot>
          <tbody>
			@foreach ($equipos as $equipo)
			<tr>
				<td>{{ $equipo->codigo }}</td>
        <!-- <td><a href="{{ url('equipos/'. $equipo->id) }}">{{ $equipo->nombre }}</a></td> -->
        <td>
          <!-- <a href="{{ url('equipos/'. $equipo->id) }}" onclick="return hs.htmlExpand(this, { objectType: 'iframe', objectWidth: '900' } )">
            {{ $equipo->nombre }}
          </a> -->
          <a href="{{ url('equipos/'. $equipo->id) }}">
            {{ $equipo->nombre }}
          </a>
        </td>





				
				<td>{{ $equipo->sector->nombre }}</td>
				@if (Auth::check())
        <td>
					<div class="text-center">
						<div class="acciones">
			                <a href="{{ url('equipos/'. $equipo->id .'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
			            </div>
						&nbsp;
			            <div class="acciones">
			                <a href="{{ url('equipos/'. $equipo->id .'/mantencion') }}" class="btn btn-success btn-sm">Mantenci&oacute;n</a>
			            </div>
			            @if( $equipo->estado_id != "2")
						&nbsp;
							<div class="acciones">
								<form action="{{ url('equipos/'. $equipo->id) }}" method="POST" onsubmit="return confirm('¿Desea dar de baja este equipo?')">
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

