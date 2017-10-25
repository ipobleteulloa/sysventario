@extends ('layouts.main')

@section ('content')
<script>
	$(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
 	 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listado de Mantenciones
          <a href="{{ url('mantenciones/create') }}" class="btn btn-primary f_right">Agregar mantención</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <!-- <th>test</th> -->
                  <th>Codigo</th>
				  <th>Nombre</th>
				  <th>Detalle</th>
				  <th>Fecha</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                	<!-- <th>test</th> -->
                  <th>Codigo</th>
				  <th>Nombre</th>
                  <th>Detalle</th>
                  <th>Fecha</th>
                </tr>
              </tfoot>
              <tbody>
				@foreach ($mantenciones as $mantencion)
				<tr>
					<!-- <td>{{ $mantencion->created_at->format('Y/m/d') }} -->
					<td>{{ $mantencion->codigo }}</td>
					<td>{{ $mantencion->equipo->nombre }}</td>
					<td>{{ $mantencion->detalle }}</td>
					<!-- <td>{{ $mantencion->created_at->toDateString() }} -->
					<!-- <td>{{ $mantencion->created_at->toFormattedDateString() }} -->
					<td>{{ $mantencion->created_at->format('d/m/Y') }}
					<!-- <td>{{ $mantencion->created_at->formatLocalized('l jS \\of F Y') }} -->
				</tr>
				@endforeach		
              </tbody>
            </table>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
@endsection ('content')

