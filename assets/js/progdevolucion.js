

var actual = window.location+'';
//Se realiza la división de la URL
var split = actual.split("/");
//Se obtiene el ultimo valor de la URL
var id = parseInt( split[split.length-1]);


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    if (isNaN(id)){
        var datos="programacion1";
    }else{
        var datos="../../VentaCtrl/programacion2/"+id;
    }
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'timeGrid' ],
        header: {
            right: 'dayGridMonth,timeGridWeek,dayGridDay',
            center: 'title',
            left: 'prev,next'
        },
        footer: {
            //left: 'custom1,custom2',
            center: '',
            right: 'prev,next'
        },
        locale:'es',
        defaultView: 'timeGridWeek',
        events:datos ,
        eventTimeFormat:{
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
        },
        displayEventTime:true,
        displayEventEnd:true,
        eventTextColor:'white',

        eventClick: function(info) {

            idsala2=info.event._def.extendedProps.idSala;
            idpelicula2=info.event._def.extendedProps.idPelicula;
            fecha12=info.event._def.extendedProps.fecha;
            hora2=info.event._def.extendedProps.horaInicio;
            subtitulada2=info.event._def.extendedProps.subtitulada;
            numerada2=info.event._def.extendedProps.numerada;
            idtarifa2=info.event._def.extendedProps.idTarifa;
            if (info.event._def.extendedProps.tipo==1) tipo2='3D'; else tipo2='2D';
            
            nombre2=info.event._def.extendedProps.nombre;
            nsala=info.event._def.extendedProps.nroSala;
            nfuncion=info.event._def.extendedProps.nroFuncion;
            venta=info.event._def.extendedProps.vendido;
            devuelto=info.event._def.extendedProps.devuelto;
            id2=info.event.id;

            //console.log(idsala2);

            $('#exampleModalLabel').html(hora2+" - "+ nombre2+' ['+tipo2+']');
            $('#titulo').html(nombre2);
            $('#tipo2').html(tipo2);
            $('#nsala').html("Sala "+ nsala);
            $('#nfuncion').html(nfuncion);
            $('#fechora').html(fecha12+' '+hora2);
            $('#vendidas').html(venta);
            $('#devueltas').html(devuelto);
            $('#idsala2').val(idsala2);
            $('#idpelicula2').val(idpelicula2);
            $('#fecha12').html(fecha12);
            $('#hora2').val(hora2);
            $('#subtitulada2').bootstrapToggle(subtitulada2);
            $('#numerada2').bootstrapToggle(numerada2);
            //console.log(idtarifa2);
            $('#idtarifa2').val(idtarifa2);
            //console.log(id2);
            $('#idfuncion2').val(id2);
            $('#calendarModal').modal();
            $('#devFuncion').click(function(){
                
            });
        }

    });

    calendar.render();
});