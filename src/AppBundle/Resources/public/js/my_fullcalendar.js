$(document).ready(function () {
    $('#calendar-holder').fullCalendar({
        locale: "lt",
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
        defaultDate: new Date(),
        // rendering: 'background',
        navLinks: true,
        allDay: true,
        allDaySlot: false,
        startEditable: true,
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
        overflow: false,
        draggable: true, // this allows things to be dropped onto the calendar
        // dayClick: function(date, allDay, jsEvent, view) {
        //     $('#calendar-holder').fullCalendar('clientEvents', function(event) {
        //         if(event.start <= date && event.end >= date) {
        //             return true;
        //         }
        //         return false;
        //     });
        // },
        select: function (start, end) {
            var title = prompt('Event Title:');
            // var start = event.start.format('YYYY-MM-DD');
            // var end = (event.end == null) ? start : event.end.format('YYYY-MM-DD');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end,
                    businessHours: true,
                    allDay: false
                },
                // {
                //     url: '/full-calendar/create',
                //     data: { title: title, start: start, end: end },
                //     type: 'POST',
                //     dataType: 'json',
                //     // success: console.log('ok')
                // },
                //     // error: function(e){
                //     //     revertFunc();
                //     //     alert('Error processing your request: '+e.responseText);
                //     // }
                // });
                // $.ajax({
                //     url: '/full-calendar/change',
                //     data: 'title='+ title+'&start='+ start +'&end='+ end ,
                //     type: "POST",
                //     success: function(json) {
                //         alert('OK');
                //     }
                // });
            //     calendar.fullCalendar('renderEvent',
            //         {
            //             title: title,
            //             start: start,
            //             end: end,
            //             // allDay: allDay
            //         },
            //         true // make the event "stick"
            //     );
            // }
                // $.ajax({
                //     type: "POST",
                //     data: { title: title, start: start, end: end },
                //     url: '/full-calendar/load'
                // })
                $('#calendar-holder').fullCalendar('renderEvent', eventData, true); // stick? = true
            }
            $('#calendar-holder').fullCalendar('unselect');
        },
        // this allows things to be dropped onto the calendar
        drop: function () {
            // is the "remove after drop" checkbox checked?
            // if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            // }
        },
        eventSources: [
            {
                url: '/full-calendar/load',
                allDay: false,
                constraint: 'businessHours',
                type: 'POST',
                // error: function() {
                //     $('#script-warning').show();
                // }
            }
        ],
        // events:
        //     {
        //         url:Routing.generate('fullcalendar_loadevents', { month: moment().format('MM'), year: moment().format('YYYY') }),
        //         color: 'blue',
        //         textColor:'white',
        //         error: function() {
        //             alert('Error receving events');
        //         }
        //     },
        // eventDrop: function(event,delta,revertFunc) {
        //     var newData = event.start.format('YYYY-MM-DD');
        //     //var end = (event.end == null) ? start : event.end.format('YYYY-MM-DD');
        //     $.ajax({
        //         url: '/full-calendar/create',
        //         data: { id: event.id, newDate: newData },
        //         type: 'POST',
        //         dataType: 'json',
        //         success: function(response){
        //             console.log('ok');
        //         },
        //         error: function(e){
        //             revertFunc();
        //             alert('Error processing your request: '+e.responseText);
        //         }
        //     });
        // },
        // eventResize: function(event, delta, revertFunc) {
        //
        //     var newData = event.end.format('YYYY-MM-DD');
        //     $.ajax({
        //         url: Routing.generate('fullcalendar_resizedate'),
        //         data: { id: event.id, newDate: newData },
        //         type: 'POST',
        //         dataType: 'json',
        //         success: function(response){
        //             console.log('ok');
        //         },
        //         error: function(e){
        //             revertFunc();
        //             alert('Error processing your request: '+e.responseText);
        //         }
        //     });

        // },
        eventClick: function (calEvent, jsEvent, view) {
            console.log('Event: ' + calEvent.title);
            console.log('Event: ' + calEvent.start);
            console.log('Event: ' + calEvent.end);
        },
    });
    $('#external-events .fc-event').each(function () {

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
});
