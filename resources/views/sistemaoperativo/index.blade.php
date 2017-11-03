@extends ('layouts.main')

@section ('content')
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listado de Sistemas Operativos
          <a href="{{ url('sistemaoperativo/create') }}" class="btn btn-primary f_right">Agregar Sistema Operativo</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
				  <th>Nombre</th>
				  <th>Arquitectura</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
				  <th>Nombre</th>
				  <th>Arquitectura</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
				@foreach ($sistop as $so)
				<tr>
					<td>{{ $so->id }}</td>
					<td>{{ $so->nombre }}</td>
					<td>{{ $so->arquitectura }}</td>
					<td>
						<div class="text-center">
							<div class="acciones">
				                <a href="{{ url('sistemaoperativo/'. $so->id .'/edit') }}" class="btn btn-secondary btn-sm">Editar</a>
				            </div>
				            &nbsp;
								<div class="acciones">
									<form action="{{ url('sistemaoperativo/'. $so->id) }}" method="POST" onsubmit="return confirm('¿Confirmar eliminaci&oacute;n?')">
						            {{ method_field('delete') }}
						            {{ csrf_field() }}
						            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
						        </form>
					            </div>
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

