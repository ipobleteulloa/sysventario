@extends ('layouts.main')

@section ('content')
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listado de Sectores
          @if (Auth::check())
          <a href="{{ url('sectores/create') }}" class="btn btn-primary f_right">Agregar Sector</a>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
        				  <th>Nombre</th>
                  @if (Auth::check())
                  <th>Acciones</th>
                  @endif
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
        				  <th>Nombre</th>
                  @if (Auth::check())
                  <th>Acciones</th>
                  @endif
                </tr>
              </tfoot>
              <tbody>
				@foreach ($sectores as $sector)
				<tr>
					<td>{{ $sector->id }}</td>
					<td>{{ $sector->nombre }}</td>
					@if (Auth::check())
          <td>
						<div class="text-center">
							<div class="acciones">
				                <a href="{{ url('sectores/'. $sector->id .'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
				            </div>
				            &nbsp;
								<div class="acciones">
									<form action="{{ url('sectores/'. $sector->id) }}" method="POST" onsubmit="return confirm('¿Confirmar eliminaci&oacute;n?')">
						            {{ method_field('delete') }}
						            {{ csrf_field() }}
						            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						        </form>
					            </div>
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

