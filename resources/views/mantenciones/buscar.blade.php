@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Buscar equipo</div>
      <div class="card-body">
        
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="buscar">Buscar:</label>
              <input class="form-control" id="buscar">
              <script>
                var options = {
                  url: "{{ URL::to('/mantenciones/autocomplete') }}",
                  getValue: "nombre",
                  maxNumberOfElements: 10,
                  template: {
                    type: "description",
                    fields: {
                            description: "codigo"
                        }
                  },
                  theme: "plate-dark"
                };
                $("#buscar").easyAutocomplete(options);
              </script>

            </div>
          </div>
        </div> 
        <br/>
      </div>
    </div>

@endsection