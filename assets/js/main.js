$(function(){
        $('#calendar').fullCalendar( {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,month,agendaDay,listWeek'
            },
            defaultView: 'agendaWeek',
            defaultDate: '2017-02-12',
            navLinks: true, // can click day/week names to navigate views
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: base_url+'agenda/listarEventos',
            
            eventClick: function(calEvent, jsEvent, view) {
                // Set currentEvent variable according to the event clicked in the calendar
              //  currentEvent = calEvent;
               // alert('calEvent');
                // Open modal to edit or delete event
/*                modal({
                    // Available buttons when editing
                    buttons: {
                        delete: {
                            id: 'delete-event',
                            css: 'btn-danger',
                            label: 'Delete'
                        },
                        update: {
                            id: 'update-event',
                            css: 'btn-success',
                            label: 'Update'
                        }
                    },
                    title: 'Edit Event "' + calEvent.title + '"',
                    event: calEvent
                });*/
            }



        // end fullcalendar()
        });
    function modal(data) {
        alert('modal')
/*        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })*/
        //Show Modal
       // $('.modal').modal('show');
    }

// end function()
});