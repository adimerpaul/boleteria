
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        locale:'es',
        plugins: [ 'interaction', 'dayGrid' ],
        defaultView: 'dayGridWeek',
        right: 'month,basicWeek,basicDay',
        firstDay:4,
        events: "ProgramacionCtrl/datos",
        classNames:['eventos']
    });

    calendar.render();
});