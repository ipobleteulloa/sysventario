@extends ('layouts.main')

@section ('content')
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table"></i> Ficha Notebook
      @if (Auth::check())
        @if( $notebook->estado_id != "2")
        <form action="{{ url('notebooks/'. $notebook->id) }}" class="f_right ml-2" method="POST" onsubmit="return confirm('¿Desea dar de baja esta notebook?')">
            {{ method_field('patch') }}
            {{ csrf_field() }}
            <input type="hidden" name="dardebaja" value="dardebaja" />
            <button class="btn btn-danger" type="submit">Dar de baja</button>
        </form>
        @endif
        <a href="{{ url('notebooks/'. $notebook->id .'/edit') }}" class="btn btn-secondary f_right ml-2">Editar</a>
        @if( $notebook->usuarioActual() == null)
          <a href="{{ url('notebooks/'. $notebook->id .'/asignar') }}" class="btn btn-info f_right ml-2">Asignar a un usuario</a>
        @else
          <a href="{{ url('notebooks/' . $notebook->id . '/retirar') }}" class="btn btn-info f_right ml-2">Retirar notebook</a>
        @endif
      @endif
      <a href="{{ url('notebooks/'. $notebook->codigo .'/mantenciones') }}" class="btn btn-primary f_right ml-2">Ver mantenciones</a>
      @if (Auth::check())
      <a href="{{ url('notebooks/'. $notebook->id .'/mantencion') }}" class="btn btn-success f_right ml-2">Agregar mantenci&oacute;n</a>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
        <table class="table table-bordered">
          </tbody>
            <tr>
              <td width="20%"><b>Código</b></td><td width="80%"> {{ $notebook->codigo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>N&uacute;mero de serie</b></td><td width="80%"> {{ $notebook->nserie }} </td>
            </tr>
            <tr>
              <!-- <td width="20%"><b>Usuario asignado</b></td><td width="80%"> {{ $notebook->entregaActual->usuario->nombre_completo ?? 'SIN USUARIO ASIGNADO' }} </td> -->
              <td width="20%"><b>Usuario asignado</b></td><td width="80%"> {{ $notebook->usuarioActual()->nombre_completo ?? 'SIN USUARIO ASIGNADO' }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Marca</b></td><td width="80%"> {{ $notebook->marca }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Modelo</b></td><td width="80%"> {{ $notebook->modelo }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Tama&ntilde;o pantalla</b></td><td width="80%"> {{ $notebook->pantalla }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Procesador</b></td><td width="80%"> {{ $notebook->procesador }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Ram</b></td><td width="80%"> {{ $notebook->ram }} </td>
            </tr>
            <tr>
              <td width="20%"><b>HDD</b></td><td width="80%"> {{ $notebook->hdd }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Modelo bater&iacute;a</b></td><td width="80%"> {{ $notebook->mod_bateria }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Modelo cargador</b></td><td width="80%"> {{ $notebook->mod_cargador }} </td>
            </tr>
            <tr>
              <td width="20%"><b>Sistema operativo</b></td>
              @if($notebook->sistema_operativo === null)
                <td width="80%"></td>
              @else
              <td width="80%"> {{ $notebook->sistema_operativo->nombre }} </td>
              @endif
            </tr>
            <tr>
              <td width="20%"><b>Estado</b></td><td width="80%"> {{ $notebook->estado->nombre }} </td>
            </tr>
            @if (Auth::check())
            <tr>
              <td width="20%"><b>Candado</b></td><td width="80%"> {{ $notebook->candado }} </td>
            </tr>
            @endif
            <tr>
              <td width="20%"><b>Observaciones</b></td><td width="80%"> {{ $notebook->observaciones }} </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection ('content')

