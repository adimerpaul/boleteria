
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