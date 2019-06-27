/*
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'timeGrid' ],
        header: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay custom1',
            center: 'title',
            right: 'custom2 prevYear,prev,next,nextYear'
        },
        footer: {
            left: 'custom1,custom2',
            center: '',
            right: 'prev,next'
        },

        locale:'es',

        plugins: [ 'interaction', 'dayGrid' ],
        defaultView: 'dayGridWeek',
        firstDay:4,
        events: "ProgramacionCtrl/datos",
        eventTimeFormat:{
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
        },
        displayEventTime:true,
        displayEventEnd:true


    });

    calendar.render();
});
*/

var actual = window.location+'';
//Se realiza la división de la URL
var split = actual.split("/");
//Se obtiene el ultimo valor de la URL
var id = parseInt( split[split.length-1]);


document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    if (isNaN(id)){
        var datos="ProgramacionCtrl/datos";
    }else{
        var datos="../../ProgramacionCtrl/dato/"+id;
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
            //alert('Event: ' + info.event.title);
            //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            //alert('View: ' + info.view.type);

            //console.log(info.event._def.extendedProps.sala);
            idsala2=info.event._def.extendedProps.idSala;
            idpelicula2=info.event._def.extendedProps.idPelicula;
            fecha12=info.event._def.extendedProps.fecha;
            hora2=info.event._def.extendedProps.horaInicio;
            subtitulada2=info.event._def.extendedProps.subtitulada;
            numerada2=info.event._def.extendedProps.numerada;
            idtarifa2=info.event._def.extendedProps.idTarifa;
            id2=info.event.id;

            //console.log(idsala2);
            $('#idsala2').val(idsala2);
            $('#idpelicula2').val(idpelicula2);
            $('#fecha12').html(fecha12);
            $('#hora2').val(hora2);
            $('#subtitulada2').bootstrapToggle(subtitulada2);
            $('#numerada2').bootstrapToggle(numerada2);
            //console.log(idtarifa2);
            //$('#idtarifa2').val(idtarifa2);
            //console.log(id2);
            $('#idfuncion2').val(id2);
            $('#eliminar2').prop('href',url+"ProgramacionCtrl/delete/"+id2);
            $.ajax({
                data: 'idfuncion='+id2,
                type: 'POST',
                url: 'ProgramacionCtrl/verifi',
                success:function (e) {
                    $('#contenedor').html(e);
                },
                beforeSend:function (e) {
                    $('#contenedor').html('cargando...');
                }
            });
            $('#calendarModal').modal(
            );
            //console.log(url);



            //$('#')
            /*var event = calendar.getEventById(info.event.id) // an event object!
            var start = event.start // a property (a Date object)
            console.log(start.toISOString()) // "2018-09-01T00:00:00.000Z"*/
            // change the border color just for fun
            //info.el.style.borderColor = 'red';
        }

        /*
        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);

            console.log(event.format());
            $('#calendarModal').modal();
        },*/
    });

    calendar.render();
    $('#hora').keyup(function (e) {
        var hora=$('#hora').val();
        //console.log(hora);
        if ($('#idsala').val()=='' || $('#idpelicula').val()==''){
            alert('selecionar sala o pelicula');
        }else {
            var minutos = $('#idpelicula').children(":selected").attr("minutos");
            var horafin=moment($('#hora').val(),"hh:mm:ss").add(minutos,'minutes').format('hh:mm:ss');
            //console.log (horafin);


            var datos={
                'idsala':$('#idsala').val(),
                'fecha':$('#fecha1').val(),
                'horainicio':$('#hora').val(),
                'horafin':horafin
            }
            $.ajax({
                url:'ProgramacionCtrl/verificar',
                type:'POST',
                data:datos,
                success:function (e) {
                    $('#estado').html(e);
                    //console.log(e);
                    if (e=='Sala libre'){
                        $('#aceptar').show();
                    } else {
                        $('#aceptar').hide();
                    }
                }
            });

        }
    });
    $('#exampleModal').on('show.bs.modal', function (e) {
        //$('#aceptar').removeAttr('disabled');
        //$('#aceptar').attr('disabled');
        $('#aceptar').hide();
    })
    $('#calendarModal').on('show.bs.modal', function (e) {
        var parametros = {
                            "idf" : $('#idfuncion2').val()
                    };
                    $.ajax({
                            data:  parametros,
                            url:   'ProgramacionCtrl/boletovendido',
                            type:  'post',
                       
                            success:  function (response) {
                                console.log(response);
                                if(response){
                                $('#mfuncion').hide();
                                $('#eliminar2').hide();
                                }
                                else{
                                $('#mfuncion').show();
                                $('#eliminar2').show();
                                }
                            }})
    })

});