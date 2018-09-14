@extends ('layouts.main')

@section ('content')
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table"></i> {{ $impresora->nombre }}
      @if (Auth::check())
      	@if( $impresora->estado_id != "2")
  		  <form action="{{ url('impresoras/'. $impresora->id) }}" class="f_right ml-2" method="POST" onsubmit="return confirm('¿Desea dar de baja esta impresora?')">
          	{{ method_field('patch') }}
          	{{ csrf_field() }}
          	<input type="hidden" name="dardebaja" value="dardebaja" />
          	<button class="btn btn-danger" type="submit">Dar de baja</button>
      	</form>
  	    @endif
      <a href="{{ url('impresoras/'. $impresora->id .'/edit') }}" class="btn btn-secondary f_right ml-2">Editar</a>
      @endif
      <a href="{{ url('impresoras/'. $impresora->codigo .'/mantenciones') }}" class="btn btn-primary f_right ml-2">Ver mantenciones</a>
      @if (Auth::check())
      <a href="{{ url('impresoras/'. $impresora->id .'/mantencion') }}" class="btn btn-success f_right ml-2">Agregar mantenci&oacute;n</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          </tbody>
            <tr>
              <td width="20%"><b>Código</b></td><td width="80%"> {{ $impresora->codigo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Nombre</b></td><td width="80%"> {{ $impresora->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Marca</b></td><td width="80%"> {{ $impresora->marca }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Modelo</b></td><td width="80%"> {{ $impresora->modelo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Insumos</b></td><td width="80%"> {{ $impresora->insumos }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Tipo de conexión</b></td><td width="80%"> {{ $impresora->sector->tipo_conexion }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Sector</b></td><td width="80%"> {{ $impresora->sector->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Ubicación</b></td><td width="80%"> {{ $impresora->ubicacion }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Estado</b></td><td width="80%"> {{ $impresora->estado->nombre }} </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
  </div>
@endsection ('content')

