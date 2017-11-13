@extends ('layouts.main')

@section ('content')
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listado de Encargados
          @if (Auth::check())
          <a href="{{ url('encargados/create') }}" class="btn btn-primary f_right">Agregar Encargado</a>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  @if (Auth::check())
                  <th>Acciones</th>
                  @endif
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  @if (Auth::check())
                  <th>Acciones</th>
                  @endif
                </tr>
              </tfoot>
              <tbody>
				@foreach ($encargados as $encargado)
				<tr>
					<td>{{ $encargado->nombre }}</td>
					<td>{{ $encargado->email }}</td>
					@if (Auth::check())
          <td>
						<div class="text-center">
							<div class="acciones">
	                <a href="{{ url('encargados/'. $encargado->id .'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
	            </div>
				            &nbsp;
							<div class="acciones">
								<form action="{{ url('encargados/'. $encargado->id) }}" method="POST" onsubmit="return confirm('¿Confirmar eliminaci&oacute;n?')">
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

