
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        locale:'es',
        plugins: [ 'interaction', 'dayGrid' ],
        defaultView: 'dayGridWeek',
        firstDay:4,
        events: [
            {
                title: 'All Day Event',
                start: '2019-03-21'
            }
        ],
        eventColor:'red'
    });

    calendar.render();
});