document.addEventListener('DOMContentLoaded', function() {

    var Draggable = FullCalendar.Draggable;
    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'nl',
        timeZone: 'local',
        editable: true,
        droppable: true,
        initialView: 'timeGridWeek',
        hiddenDays: [0],
        firstDay: '1',
        slotMinTime: '10:00:00',
        slotMaxTime: '21:00:00',
        slotDuration: '00:30',
        defaultTimedEventDuration:'00:30',
        allDaySlot: false,
        nowIndicator: true,
        navLinks: true,
        eventOverlap: false,

        buttonText: {
            today:  'vandaag',
            week:   'week',
            day:    'dag',
            list:   'lijst',
        },

        headerToolbar: {
            start:  'today',
            center: 'title',
            end:    'prev,next timeGridWeek,timeGridDay'
        },

        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: false
        },

        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: false
        },

        businessHours: [
            {
                daysOfWeek: [1, 2, 3, 4, 5],
                startTime: '10:00',
                endTime: '18:00'
            },
            {
                daysOfWeek: [5],
                startTime: '19:00',
                endTime: '21:00'
            },
            {
                daysOfWeek: [6],
                startTime: '10:00',
                endTime: '15:00'
            }
        ],

        drop: function(info) {
            info.draggedEl.parentNode.removeChild(info.draggedEl);
        },
        
        eventSources: [
            {
                url: 'calenderFeeder.php',
                color: '#333',
                textColor: '#333',
                borderColor: '#333',
                editable: false

            }
        ],
        // events: '/calenderFeeder.php'
        events: [
            {
                startTime: '18:00:00',
                endTime: '21:00:00',
                daysOfWeek: ['1', '2', '3','4'],
                color: '#333',
                textColor: '#333',
                borderColor: '#333',
                editable: false,
            },
            {
                startTime: '18:00:00',
                endTime: '19:00:00',
                daysOfWeek: ['5'],
                color: '#333',
                textColor: '#333',
                borderColor: '#333',
                editable: false,
            },
            {
                startTime: '15:00:00',
                endTime: '21:00:00',
                daysOfWeek: ['6'],
                color: '#333',
                textColor: '#333',
                borderColor: '#333',
                editable: false,
            },
            {
                title: 'Test2',
                start: '2021-05-27T11:00:00',
                end: '2021-05-27T11:30:00',
                color: 'red'
            },
            {
                title: 'Test',
                start: '2021-05-26T11:00',
                end: '2021-05-26T11:30',
                editable: false
            }
        ],

    });

    calendar.render();
    
    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText
          };
        }
      });
  });