@extends ('layouts.main')

@section ('content')
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table"></i> {{ $equipo->nombre }}
      @if (Auth::check())
        @if( $equipo->estado_id != "2")
        <form action="{{ url('equipos/'. $equipo->id) }}" class="f_right ml-2" method="POST" onsubmit="return confirm('¿Desea dar de baja esta equipo?')">
            {{ method_field('patch') }}
            {{ csrf_field() }}
            <input type="hidden" name="dardebaja" value="dardebaja" />
            <button class="btn btn-danger" type="submit">Dar de baja</button>
        </form>
        @endif
      <a href="{{ url('equipos/'. $equipo->id .'/edit') }}" class="btn btn-secondary f_right ml-2">Editar</a>
      @endif
      <a href="{{ url('equipos/'. $equipo->codigo .'/mantenciones') }}" class="btn btn-primary f_right ml-2">Ver mantenciones</a>
      @if (Auth::check())
      <a href="{{ url('equipos/'. $equipo->id .'/mantencion') }}" class="btn btn-success f_right ml-2">Agregar mantenci&oacute;n</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
        <table class="table table-bordered">
          </tbody>
            <tr>
              <td width="20%"><b>Código</b></td><td width="80%"> {{ $equipo->codigo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Nombre</b></td><td width="80%"> {{ $equipo->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Procesador</b></td><td width="80%"> {{ $equipo->procesador }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Ram</b></td><td width="80%"> {{ $equipo->ram }} </td>
            </tr>
            <tr>
              <td width="20%"><b>HDD</b></td><td width="80%"> {{ $equipo->hdd }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Placa madre</b></td><td width="80%"> {{ $equipo->placa_madre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Sistema operativo</b></td>
              @if($equipo->sistema_operativo === null)
                <td width="80%"></td>
              @else
              <td width="80%"> {{ $equipo->sistema_operativo->nombre }} </td>
              @endif
            </tr>
            <tr>
              <td width="20%"><b>Sector</b></td><td width="80%"> {{ $equipo->sector->nombre }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Ubicación</b></td><td width="80%"> {{ $equipo->ubicacion }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Estado</b></td><td width="80%"> {{ $equipo->estado->nombre }} </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
    <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
  </div>
@endsection ('content')

