      document.addEventListener('DOMContentLoaded', function() {
        let formulario=document.querySelector("#myform");
              var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          themeSystem: 'bootstrap',
          initialView: 'dayGridWeek',
          locale:"es",
          displayEventTime:false,
          eventColor:"#E71C1C",
          headerToolbar:{
            left:'prev,next,today',
            center:'title',
            right:'dayGridWeek,dayGridMonth',
          },
          views: {
            week: {
              // options apply to dayGridWeek and timeGridWeek views
              contentHeight: 200
            },

          },

            //events:"http://sicove.test/home/mostrar" ,
          eventSources:{
            url:baseURL+"/home/mostrar",
            method:"POST",
            extraParams:{
              _token:formulario._token.value,
            }
          },


          dateClick:function(info){

            formulario.reset();
            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;

            $("#evento").modal("show");
          },

          eventClick:function(info){
            var evento=info.event;
            axios.post(baseURL+"/home/editar/"+info.event.id).
            then(
              (respuesta)=>{
                formulario.id.value=respuesta.data.id;
                formulario.title.value=respuesta.data.title;
                formulario.descripcion.value=respuesta.data.descripcion;
                formulario.start.value=respuesta.data.start;
                formulario.end.value=respuesta.data.end;
                $("#evento").modal("show");
              }
              ).catch(
              error=>{
                if(error.response){
                  console.log(error.response.data);
                }
              }
              )

            }

          });
        calendar.render();
        calendar.updateSize();

        document.getElementById("modificar").addEventListener("click",function(){

          enviarDatos("/home/actualizar/"+formulario.id.value);
        });


        document.getElementById("btnGuardar").addEventListener("click",function(){

          enviarDatos('/home/agregar');
        });

        document.getElementById("btnEliminar").addEventListener("click",function(){
          enviarDatos("/home/eliminar/"+formulario.id.value);

        });


        function enviarDatos(url){
          const datos = new FormData(formulario);
          const nuevaURL=baseURL+url;
          axios.post(nuevaURL,datos).
          then(
            (respuesta)=>{
              calendar.refetchEvents();
              $("#evento").modal("hide");
            }
            ).catch(
            error=>{
              if(error.response){
                console.log(error.response.data);
              }
            }
            )
          }



        });

