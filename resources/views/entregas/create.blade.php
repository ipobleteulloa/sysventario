@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Asignar {{ $notebook->marca }} {{ $notebook->modelo}} </div>
      <div class="card-body">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">  
              <label for="buscar">Usuario a asignar:</label>
              <form method="POST" action="{{ URL::asset('/entregas') }}">
                {{ csrf_field() }}
                <input class="form-control" id="buscar">
                <input class="form-control" type="hidden" id="usuario_id" name="usuario_id">
                <input class="form-control" type="hidden" id="codigo" name="codigo" value="{{ $notebook->codigo }}">
                <br/>
                <!-- <a href="#" id="boton" class="btn btn-primary">Confirmar</a> -->
                <script type="text/javascript">
                  $( document ).ready(function() {
                    var options = {
                      url: "{{ URL::to('entregas/autocomplete/') }}",      
                      getValue: function(element) {
                        return element.run+" "+element.nombre+" "+element.apellidos;
                      },
                      list: {
                        maxNumberOfElements: 8,
                        match: {
                            enabled: true
                        },
                        sort: {
                            enabled: true
                        },
                        onSelectItemEvent: function() {
                          var value = $("#buscar").getSelectedItemData().id;
                          $("#usuario_id").val(value).trigger("change");
                        }
                      },
                    };
                    $("#buscar").easyAutocomplete(options);
                  });
                </script>
                <input class="btn btn-primary btn-block" id="EntregaSubmit" type="submit" value="Asignar">
              </form>
            </div>
          </div>
        </div> 
        <br/>
      </div>
    </div>

@endsection
