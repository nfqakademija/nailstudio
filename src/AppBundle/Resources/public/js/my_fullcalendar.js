$(function () {
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay, listWeek'
        },
        displayEventTime: true,
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
        navLinks: true,
        allDaySlot: false,
        selectable: true,
        editable: true,
        lazyFetching: true,
        weekends: false, // will hide Saturdays and Sundays
        weekNumbers: true,
        eventLimit: true,
        select: function(start, end) {
            var title = prompt('Event Title:');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end
                };
                $('#calendar').fullCalendar('renderEvent', eventData, true);  stick = true
            }
            $('#calendar').fullCalendar('unselect');
        },
        eventSources: [
            {
                url: '/full-calendar/load',
                type: 'POST',
                data: {title: title, start: start, end: end},
                error: function () {
                }
            }
        ]
    });
});
