$(function () {
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay, listWeek'
        },
        minTime: '09:00',
        maxTime: '20:00',
        timezone: 'Europe/Vilnius',
        businessHours: {
            start: '09:30',
            end: '18:30',
            dow: [1, 2, 3, 4, 5]
        },
        firstDay: 1,
        defaultView: 'agendaWeek',
        constraint: 'businessHours',
        navLinks: true,
        allDay: false,
        allDaySlot: false,
        selectable: true,
        selectHelper: true,
        editable: true,
        lazyFetching: true,
        displayEventTime: true,
        weekends: false, // will hide Saturdays and Sundays
        weekNumbers: true,
        eventLimit: true,
        resizable: true,
        droppable: true,
        dayClick: function(date, allDay, jsEvent, view) {
            $('#calendar-holder').fullCalendar('clientEvents', function(event) {
                if(event.start <= date && event.end >= date) {
                    return true;
                }
                return false;
            });
        },
        select: function(start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end,
                    businessHours: true,
                    allDay: false
                };
                // $.ajax({
                //     type: "POST",
                //     data: { title: title, start: start, end: end }
                // })
                $('#calendar-holder').fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            $('#calendar-holder').fullCalendar('unselect');
        },
    // this allows things to be dropped onto the calendar
        drop: function() {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },

        eventSources: [
            {

                url: '/full-calendar/load',
                allDay: false,
                constraint: 'businessHours',
                type: 'POST',

                error: function () {
                }
            }
        ]

    });
});

$('#external-events .fc-event').each(function() {

    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });

    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
    });

});
