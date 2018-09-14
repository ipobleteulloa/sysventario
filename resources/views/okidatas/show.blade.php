@extends ('layouts.main')

@section ('content')
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table"></i> {{ $okidata->nombre }}
      @if (Auth::check())
      	@if( $okidata->estado_id != "2")
  		  <form action="{{ url('okidatas/'. $okidata->id) }}" class="f_right ml-2" method="POST" onsubmit="return confirm('¿Desea dar de baja esta okidata?')">
          	{{ method_field('patch') }}
          	{{ csrf_field() }}
          	<input type="hidden" name="dardebaja" value="dardebaja" />
          	<button class="btn btn-danger" type="submit">Dar de baja</button>
      	</form>
  	    @endif
      <a href="{{ url('okidatas/'. $okidata->id .'/edit') }}" class="btn btn-secondary f_right ml-2">Editar</a>
      @endif
      <a href="{{ url('okidatas/'. $okidata->codigo .'/mantenciones') }}" class="btn btn-primary f_right ml-2">Ver mantenciones</a>
      @if (Auth::check())
      <a href="{{ url('okidatas/'. $okidata->id .'/mantencion') }}" class="btn btn-success f_right ml-2">Agregar mantenci&oacute;n</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          </tbody>
            <tr>
              <td width="20%"><b>Código</b></td><td width="80%"> {{ $okidata->codigo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Nombre</b></td><td width="80%"> {{ $okidata->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Modelo</b></td><td width="80%"> {{ $okidata->modelo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Insumos</b></td><td width="80%"> {{ $okidata->insumos }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Tipo de conexión</b></td><td width="80%"> {{ $okidata->sector->tipo_conexion }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Sector</b></td><td width="80%"> {{ $okidata->sector->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Ubicación</b></td><td width="80%"> {{ $okidata->ubicacion }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Estado</b></td><td width="80%"> {{ $okidata->estado->nombre }} </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
  </div>
@endsection ('content')

