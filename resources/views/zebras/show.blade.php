@extends ('layouts.main')

@section ('content')
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table"></i> {{ $zebra->nombre }}
      @if (Auth::check())
        @if( $zebra->estado_id != "2")
        <form action="{{ url('zebras/'. $zebra->id) }}" class="f_right ml-2" method="POST" onsubmit="return confirm('¿Desea dar de baja esta zebra?')">
            {{ method_field('patch') }}
            {{ csrf_field() }}
            <input type="hidden" name="dardebaja" value="dardebaja" />
            <button class="btn btn-danger" type="submit">Dar de baja</button>
        </form>
        @endif
      <a href="{{ url('zebras/'. $zebra->id .'/edit') }}" class="btn btn-secondary f_right ml-2">Editar</a>
      @endif
      <a href="{{ url('zebras/'. $zebra->codigo .'/mantenciones') }}" class="btn btn-primary f_right ml-2">Ver mantenciones</a>
      @if (Auth::check())
      <a href="{{ url('zebras/'. $zebra->id .'/mantencion') }}" class="btn btn-success f_right ml-2">Agregar mantenci&oacute;n</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          </tbody>
            <tr>
              <td width="20%"><b>Código</b></td><td width="80%"> {{ $zebra->codigo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Nombre</b></td><td width="80%"> {{ $zebra->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Modelo</b></td><td width="80%"> {{ $zebra->modelo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>N&uacute;mero de serie</b></td><td width="80%"> {{ $zebra->nserie }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Tipo de conexi&oacute;n</b></td><td width="80%"> {{ $zebra->tipo_conexion }} </td>
            </tr>      
            <tr>
              <td width="20%"><b>Sector</b></td><td width="80%"> {{ $zebra->sector->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Ubicación</b></td><td width="80%"> {{ $zebra->ubicacion }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Estado</b></td><td width="80%"> {{ $zebra->estado->nombre }} </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection ('content')

