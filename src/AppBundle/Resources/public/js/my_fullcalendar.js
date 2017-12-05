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
        select: function(start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end,
                    businessHours: true
                };
                // $.ajax({
                //     type: "POST",
                //     data: { title: title, start: start, end: end }
                // })
                $('#calendar-holder').fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            $('#calendar-holder').fullCalendar('unselect');
        },

        eventSources: [
            {
                constraint: 'businessHours',
                url: '/full-calendar/load',
                type: 'POST',

                error: function () {
                }
            }
        ]
    });
});
