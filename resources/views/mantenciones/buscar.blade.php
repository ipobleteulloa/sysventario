@extends ('layouts.main')

@section ('content')
  
  <div class="card card-register mx-auto mt-5">
      <div class="card-header">Buscar equipo</div>
      <div class="card-body">
        
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <form method="POST" id="searchForm" action="">
                {{ csrf_field() }}
                
                <label for="buscar">Buscar:</label>
                <input class="form-control" id="buscar">
                <input class="form-control" type="hidden" id="codigo">
                <br/>
                <a href="#" id="boton" class="btn btn-primary">Agregar mantención</a>
                <!-- <input type="submit"> -->
                <script type="text/javascript">
                      $( document ).ready(function() {
                        var options = {
                        //url: "{{ route('autocomplete') }}",
                        url: "{{ URL::to('mantenciones/autocomplete/') }}",
                        categories: [{
                            listLocation: "equipos",
                            maxNumberOfElements: 3,
                            header: "Equipos"
                        }, {
                            listLocation: "impresoras",
                            maxNumberOfElements: 3,
                            header: "Impresoras"
                        }, {
                            listLocation: "okidatas",
                            maxNumberOfElements: 4,
                            header: "Okidatas"
                        }, {
                            listLocation: "zebras",
                            maxNumberOfElements: 4,
                            header: "Zebras"
                        }],

                        getValue: function(element) {
                            return element.nombre;
                        },

                        template: {
                            type: "description",
                            fields: {
                                description: "codigo"
                            }
                        },

                        list: {
                            maxNumberOfElements: 12,

                            match: {
                                enabled: true
                            },
                            sort: {
                                enabled: true
                            },
                            onSelectItemEvent: function() {
                              var value = $("#buscar").getSelectedItemData().codigo;

                              $("#codigo").val(value).trigger("change");

                              var tipo=0;
                              //var codigo = $("#codigo").val();
                              var cod = value.substr(0, 3);
                              var num = value.substr(3, 3);
                              //num.replace(/^0+/, '');
                              num = num.replace(/^0+/, '');
                              
                              /*switch (cod) {
                                  case CMP:
                                      tipo = "equipos";
                                      break;
                                  case IMP:
                                      tipo = "impresoras";
                                      break;
                                  case OKI:
                                      tipo = "okidatas";
                                      break;
                                  case ZEB:
                                      tipo = "zebras";
                                      break;
                              }*/
                              if (cod=="CMP")
                                tipo = "equipos";
                              if (cod=="IMP")
                                tipo = "impresoras";
                              if (cod=="OKI")
                                tipo = "okidatas";
                              if (cod=="ZEB")
                                tipo = "zebras";
                              //alert(tipo);
                              //var aurl = '\{\{ URL::asset(\' /' + tipo + '/' + num + '/mantencion\') \}\}';
                              var aurl = '../' + tipo + '/' + num + '/mantencion';
                              $("#boton").attr("href", aurl);
                              //alert(aurl);
                            }
                        },

                    };

                    $("#buscar").easyAutocomplete(options);
                  });
                </script>
                
              </form>
            </div>
          </div>
        </div> 
        <br/>
      </div>
    </div>

@endsection
