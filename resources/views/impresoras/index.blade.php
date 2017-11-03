@extends ('layouts.main')

@section ('content')
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <a href="{{ url('impresoras/') }}" class="btn btn-secondary btn-sm submenu">Todos</a>
    <a href="{{ url('impresoras/activas') }}" class="btn btn-secondary btn-sm submenu">Activas</a>
    <a href="{{ url('impresoras/debaja') }}" class="btn btn-secondary btn-sm submenu">De baja</a>
    <a href="{{ url('impresoras/enrevision') }}" class="btn btn-secondary btn-sm submenu">En revisión</a>
    <a href="{{ url('impresoras/contingencia') }}" class="btn btn-secondary btn-sm submenu">Contingencia</a>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Listado de Impresoras
      <a href="{{ url('impresoras/create') }}" class="btn btn-primary f_right">Agregar Impresora</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Codigo</th>
			  <th>Nombre</th>
              <th>Marca</th>
			  <th>Modelo</th>
              <th>Insumos</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Codigo</th>
			  <th>Nombre</th>
              <th>Marca</th>
			  <th>Modelo</th>
              <th>Insumos</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
          <tbody>
			@foreach ($impresoras as $impresora)
			<tr>
				<td>{{ $impresora->codigo }}</td>
				<td>{{ $impresora->nombre }}</td>
				<td>{{ $impresora->marca }}</td>
				<td>{{ $impresora->modelo }}</td>
				<td>{{ $impresora->insumos }}</td>
				<td>
					<div>  <!-- class="text-center" -->
						<div class="acciones">
			                <a href="{{ url('impresoras/'. $impresora->id .'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
			            </div>
						&nbsp;
			            <div class="acciones">
			                <a href="{{ url('impresoras/'. $impresora->id .'/mantencion') }}" class="btn btn-success btn-sm">Mantenci&oacute;n</a>
			            </div>
			            @if( $impresora->estado_id != "2")
						&nbsp;
							<div class="acciones">
								<form action="{{ url('impresoras/'. $impresora->id) }}" method="POST" onsubmit="return confirm('¿Desea dar de baja esta impresora?')">
				                    {{ method_field('patch') }}
				                    {{ csrf_field() }}
				                    <input type="hidden" name="dardebaja" value="dardebaja" />
				                    <button class="btn btn-danger btn-sm" type="submit">Dar de baja</button>
				                </form>
				            </div>
				        @endif
					</div>
				</td>
			</tr>
			@endforeach		
          </tbody>
        </table>
      </div>
    </div>
    <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
  </div>
@endsection ('content')

