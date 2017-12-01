$(function () {
    $('#calendar-holder').fullCalendar({


        eventResourceEditable: true, // except for between resources
        eventClick: function(calEvent, jsEvent, view) {

            alert('Event: ' + calEvent.title);
            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            alert('View: ' + view.name);

            // change the border color just for fun
            $(this).css('border-color', 'red');

        },
        events: [
            {
                title: 'event2',
                start: '2017-12-01T12:30:00',
                end: '2017-12-01T13:30:00',
                allDay : false, // will make the time show
                resourceEditable: false
            },
        ],
        weekends: false, // will hide Saturdays and Sundays
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },
        timezone: ('Europe/Vilnius'),
        businessHours: {
            start: '09:30',
            end: '18:30',
            dow: [1, 2, 3, 4, 5]
        },
        allDaySlot: false,
        defaultView: 'agendaWeek',
        lazyFetching: true,
        firstDay: 1,
        selectable: true,
        timeFormat: 'H(:mm)',
        selectHelper: true,
        editable: true,
        eventDurationEditable: true,
        eventSources: [
            {
                url: '/full-calendar/load',
                type: 'POST',
                data: {},
                error: function () {
                }
            }
        ]
    });
});
