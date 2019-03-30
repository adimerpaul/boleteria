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
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
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
        events: "ProgramacionCtrl/datos",
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
            $('#calendarModal').modal();
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
});