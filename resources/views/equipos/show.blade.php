@extends ('layouts.smpl')

@section ('content')
  <div class="card mb-3 mx-auto col-8">
    <div class="card-header">
      <i class="fa fa-table"></i> {{ $equipo->nombre }}
    </div>
    <div class="card-body">

      <!-- <div class="row">
        <div class="col-2">Código</div>
        |<div class="col">{{ $equipo->codigo }} </div>
      </div>
      <div class="row">
        <div class="col-2">Nombre</div>
        |<div class="col">{{ $equipo->nombre }} </div>
      </div>
      <div class="row">
        <div class="col-2">Procesador</div>
        |<div class="col">{{ $equipo->procesador }} </div>
      </div>
      <div class="row">
        <div class="col-2">Ram</div>
        |<div class="col">{{ $equipo->ram }} </div>
      </div>
      <div class="row">
        <div class="col-2">HDD</div>
        |<div class="col">{{ $equipo->hdd }} </div>
      </div>
      <div class="row">
        <div class="col-2">Placa madre</div>
        |<div class="col">{{ $equipo->placa_madre }} </div>
      </div>
      <div class="row">
        <div class="col-2">Sistema operativo</div>
        |<div class="col">{{ $equipo->codigo }} </div>
      </div>
      <div class="row">
        <div class="col-2">Sector</div>
        |<div class="col">{{ $equipo->sector->nombre }} </div>
      </div>
      <div class="row">
        <div class="col-2">Ubicación</div>
        |<div class="col">{{ $equipo->ubicacion }} </div>
      </div>
      <div class="row">
        <div class="col-2">Estado</div>
        |<div class="col">{{ $equipo->estado->nombre }} </div>
      </div> -->


      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          </tbody>
            <tr>
              <td class="col-4">Código</td><td class="col-8"> {{ $equipo->codigo }} </td>
            </tr>
            <tr>
              <td>Nombre</td><td> {{ $equipo->nombre }} </td>
            </tr>
            <tr>
              <td>Procesador</td><td> {{ $equipo->procesador }} </td>
            </tr>
            <tr>
              <td>Ram</td><td> {{ $equipo->ram }} </td>
            </tr>
            <tr>
              <td>HDD</td><td> {{ $equipo->hdd }} </td>
            </tr>
            <tr>
              <td>Placa madre</td><td> {{ $equipo->placa_madre }} </td>
            </tr>
            <tr>
              <td>Sistema operativo</td><td> {{ $equipo->codigo }} </td>
            </tr>
            <tr>
              <td>Sector</td><td> {{ $equipo->sector->nombre }} </td>
            </tr>
            <tr>
              <td>Ubicación</td><td> {{ $equipo->ubicacion }} </td>
            </tr>
            <tr>
              <td>Estado</td><td> {{ $equipo->estado->nombre }} </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
  </div>
@endsection ('content')

