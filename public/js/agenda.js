document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#formularioEventos");

    var calendarEl = document.getElementById('agenda');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      initialView: 'dayGridMonth',

      locale: 'es',
      displayEventTime:false,
      headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,dayGridWeek,listMonth'
      },

      //events:baseURL+"/evento/mostrar",
      eventSources:{
          url: baseURL+"/evento/mostrar",
          method:"POST",
          extraParams: {
              _token: formulario._token.value,
          }
      },

      dateClick:function(info){
        formulario.reset();

        formulario.start.value=info.dateStr;
        formulario.end.value=info.dateStr;

          $("#evento").modal("show");
      },
      eventClick:function(info){
        $("#evento").modal("show"); 
        var evento = info.event;
        console.log(evento);

        axios.post(baseURL+"/evento/editar/"+info.event.id).
        then(
            (respuesta) =>{
                formulario.id.value= respuesta.data.id;

                formulario.color.value= respuesta.data.color;

                formulario.title.value= respuesta.data.title;

                formulario.descripcion.value= respuesta.data.descripcion;

                formulario.start.value= respuesta.data.start;
                formulario.end.value= respuesta.data.end;

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

    document.getElementById("btnGuardar").addEventListener("click",function(){
        
        enviarDatos("/evento/agregar");

    });
    document.getElementById("btnEliminar").addEventListener("click",function(){

        enviarDatos("/evento/borrar/"+formulario.id.value);

    });

    document.getElementById("btnModificar").addEventListener("click",function(){

        enviarDatos("/evento/actualizar/"+formulario.id.value);

    });

    function enviarDatos(url){

        const datos= new FormData(formulario);

        const nuevaURL = baseURL+url;

        axios.post(nuevaURL, datos).
        then(
            (respuesta) =>{
                calendar.refetchEvents();  //actualizar los datos 
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