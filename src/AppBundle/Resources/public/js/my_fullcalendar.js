$(function () {
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },
        displayEventTime: true,
        navLinks: true,
        minTime: '09:00',
        maxTime: '20:00',
       // timezone: ('Europe/Vilnius'),
        businessHours: {
            start: '09:30',
            end: '18:30',
            dow: [1, 2, 3, 4, 5]
        },
        firstDay: 1,
        resourceEditable: true,
        allDaySlot: false,
        defaultView: 'agendaWeek',
        timeFormat: 'H(:mm)',
        selectable: true,
        selectHelper: true,
        editable: true,
        eventDurationEditable: true,
        lazyFetching: true,
        eventResourceEditable: true, // except for between resources
        // weekends: false, // will hide Saturdays and Sundays
        weekNumbers: true,
        eventLimit: true,

        select: function(start, end) {
            var title = prompt('Event Title:');
            if (title) {
                start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
                end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
                $.ajax({
                     url: '/full-calendar/load',
                    data: 'title='+ title+'&start='+ start +'&end='+ end ,
                    type: "POST",
                    success: function(json) {
                        alert('OK');
                    }
                });
                calendar.fullCalendar('renderEvent',
                    {
                        title: title,
                        start: start,
                        end: end,
                        //allDay: allDay
                    },
                    true // make the event "stick"
                );
            }
            //calendar.fullCalendar('unselect');
        },
        eventClick: function(event) {
            var adate = new moment(); //current time
            // Here a "A" or "P" instead of "T"
            alert(event.start.format('YYYY-MM-DDTHH:mm:ss'));
            // here the expected behavior
            alert(adate.format('YYYY-MM-DDTHH:mm:ss'));
            //same object
            alert(event.start instanceof moment);
            alert(adate instanceof moment);
        },
        events: [
            {
                title: 'event2',
                start: '2017-12-01T12:30:00',
                end: '2017-12-01T13:30:00',
                editable: true,
                resourceEditable: true,
            },
        ],
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
