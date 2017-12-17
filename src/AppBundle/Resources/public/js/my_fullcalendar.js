$(document).ready(function () {
    var initialLocaleCode = 'lt';

    $('#calendar-holder').fullCalendar({
        locale: initialLocaleCode,
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'agendaWeek, agendaDay, listWeek'
        },
        events: [
            {
                start: '2014-11-10T10:00:00',
                end: '2017-12-17T24:00:00',
                rendering: 'background',
                overlap: false,
            }
        ],
        minTime: '09:30',
        maxTime: '19:00',
        timezone: 'Europe/Vilnius',
        businessHours: {

            start: '09:30',
            end: '18:30',
            dow: [1, 2, 3, 4, 5]
        },
        slotEventOverlap: false,
        selectOverlap: false,
        showNonCurrentDays: false,
        weekNumbersWithinDays:true,
        theme: true,
        themeSystem: 'jquery-ui',
        themeName: 'Start',
        firstDay: 1,
        defaultView: 'agendaWeek',
        constraint: 'businessHours',
        // defaultDate: moment().format('LT'),
        rendering: 'background',
        navLinks: true,
        // dragRevertDuration: 1000,
        forceEventDuration: true,
        allDay: false,
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
        // resizable: true,
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
        drop: function (start, end, jsEvent, view) {
            // console.log(moment(start).format(), );return false;
            var title = $('#some-title').data('title');
            var user = $('#some-user').data('user');
            var service = $('#some-service').data('service');
            // var duration = moment.duration($('#some-duration').data('duration'), 'minutes');
            // var startas = moment(start).format('YYYY/MM/DD hh:mm');
            // var end = startas + duration;
            //  var title = prompt('Event Title:');
            // var start = event.start.format('YYYY-MM-DD');
            // var end = (event.end == null) ? start : event.end.format('YYYY-MM-DD');
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end,
                    user: user,
                    service: service,
                    overflow: false,
                    businessHours: true,
                    allDay: false

                },
                    $.ajax({
                        url: '/calendar/reserve-time',
                        data: {
                            "title": title,
                            "start": moment(start).format(),
                            "end": moment(end).format(),
                            "user": user,
                            "service": service,
                        },
                        type: "POST",
                        success: function (json) {
                            console.log(json);
                            // alert('OK');
                        }
                    });
                $(this).remove();

                $('#calendar-holder').fullCalendar('renderEvent',
                    start = moment(start).format('YYYY/MM/DD hh:mm'),
                    end = moment(end).format('YYYY/MM/DD hh:mm'),
                    eventData, true); // stick? = true
            }
            $('#calendar-holder').fullCalendar('unselect');
        },
        eventSources: [
            {
                url: '/full-calendar/load',
                allDay: false,
                overflow: false,
                constraint: 'businessHours',
                type: 'POST',
                timezone: 'Europe/Vilnius',
                color: '#257e4a'
            }
        ],
        eventClick: function (calEvent, jsEvent, view) {
            // console.log('Event: ' + calEvent.id);
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
        $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
        $("#eventInfo").html(event.description);
        $("#eventLink").attr('href', event.url);
        $("#eventContent").dialog({ modal: true, title: event.title, width:350});
    });

});
