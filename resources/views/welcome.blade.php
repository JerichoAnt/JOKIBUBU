@extends('layout.adminlte')

@section('tempat_konten')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
          <div id="external-events"></div>
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar/main.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        // $(this).draggable({
        //   zIndex        : 1070,
        //   revert        : true, // will cause the event to go back to its
        //   revertDuration: 0  //  original position after the drag
        // })

      })
    }

    // ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------


    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        //Fasilitas
        @foreach($data_jadwal_fasilitas as $d)
        {
          title          : '{{$d->nama_kegiatan}}',
          start          : new Date('{{$d->durasiMulai}}'.substring(0,4), '{{$d->durasiMulai}}'.substring(5,7)-1, '{{$d->durasiMulai}}'.substring(8,10), '{{$d->durasiMulai}}'.substring(11,13), '{{$d->durasiMulai}}'.substring(14,16)),
          end            : new Date('{{$d->durasiSelesai}}'.substring(0,4), '{{$d->durasiSelesai}}'.substring(5,7)-1, '{{$d->durasiSelesai}}'.substring(8,10), '{{$d->durasiSelesai}}'.substring(11,13), '{{$d->durasiSelesai}}'.substring(14,16)),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        @endforeach

        //Barang
        @foreach($data_jadwal_barang as $d)
        {
          title          : '{{$d->nama_kegiatan}}',
          start          : new Date('{{$d->durasiMulai}}'.substring(0,4), '{{$d->durasiMulai}}'.substring(5,7)-1, '{{$d->durasiMulai}}'.substring(8,10), '{{$d->durasiMulai}}'.substring(11,13), '{{$d->durasiMulai}}'.substring(14,16)),
          end            : new Date('{{$d->durasiSelesai}}'.substring(0,4), '{{$d->durasiSelesai}}'.substring(5,7)-1, '{{$d->durasiSelesai}}'.substring(8,10), '{{$d->durasiSelesai}}'.substring(11,13), '{{$d->durasiSelesai}}'.substring(14,16)),
          allDay         : false,
          backgroundColor: '#f2c335', //Yellow
          borderColor    : '#f2c335' //Yellow
        },
        @endforeach
      ],
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>