@extends('layouts.admin')
@section('contenido')
    
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
              <h3>Agenda de trabajos y reuniones<small>Click para añadir/editar eventos</small></h3>
            </div>
          </div>
          {{-- {!!Form::open(array('url'=>'eventos/evento','method'=>'POST','autocomplete'=>'off' ))!!}
          {!! Form::token() !!} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {!! Form::close() !!} --}}
    </div>
</div>


 <!-- calendar modal -->
 <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">Datos del nuevo Evento</h4>
        </div>
        <div class="modal-body">
          <div id="testmodal" style="padding: 5px 20px;">
            <form id="antoform" class="form-horizontal calender" role="form">

                {{-- <div class="form-group">
                    <label class="col-sm-3 control-label">ID </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="txtID" name="txtID">
                    </div>
                </div> --}}
                <div class="hidden">
                {{-- <div class="form-group"> --}}
                  <label class="col-sm-3 control-label">ID evento: </label>
                  {{-- <div class="col-sm-9"> --}}
                    <input type="text" class="form-control" id="txtId_evento" name="txtId_evento">
                  {{-- </div> --}}
                {{-- </div> --}}
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label">Titulo: </label>
                  <input type="text" class="form-control" id="txtTitulo" name="txtTitulo">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <label class="control-label">Fecha inicio: </label>
                  <input type="text" class="form-control" id="txtFecha" name="txtFecha">
                </div>
            
                <div class="col-sm-6">
                  <label class="control-label">Hora inicio: </label>
                  <input type="time" min="07:00" max="19:00" step="600" class="form-control" id="txtHora" name="txtHora">
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Fecha fin: </label>
                  <input type="text" class="form-control" id="txtFecha2" name="txtFecha2">
                </div>

                <div class="col-sm-6">
                  <label class="control-label">Hora fin: </label>
                  <input type="time" min="07:00" max="19:00" step="600" class="form-control" id="txtHora2" name="txtHora2">
                </div>
              </div>
              
                <div class="form-group">
                  <div class="col-sm-12" >
                    <label for="" class="control-label">Cliente:</label>
                    <select name="txtCliente" class="form-control selectpicker" id="txtCliente" data-live-search="true" title="seleccionar cliente">
                        @foreach ($personas as $persona)
                        <option value="{{$persona->id_persona}}">{{$persona->nombre}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label" >Descripción:</label>
                  <textarea class="form-control" style="height:55px;" id="txtDescripcion" name="txtDescripcion"></textarea>
                </div>
              </div>

              
              <div class="form-group">
                <div class="col-sm-12" >
                  <label for="" class="control-label">Importancia del Evento:</label>
                  <select name="txtColor" class="form-control selectpicker" id="txtColor" data-live-search="false" title="seleccionar cliente">
                      <option value="#FF0000">Muy Importante</option>
                      <option value="#FFA500">Importante</option>
                      <option value="#006400">Normal</option>
                  </select>
                </div>
              </div>

              {{-- <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label">Color: </label>
                  <input type="color" class="form-control" id="txtColor" name="txtColor">
                </div>
              </div> --}}

            </form>
          </div>
        </div>
        <div class="modal-footer">
            @can('Evento.create')
            <button id="btnAgregar" class="btn btn-success">Agregar</button>
            @endcan
            @can('Evento.edit')
            <button id="btnModificar" class="btn btn-warning">Modificar</button>
            @endcan
            @can('Evento.destroy')
            <button id="btnEliminar" class="btn btn-danger">Eliminar</button>
            @endcan
            <button id="btnCancelar" class="btn btn-default antoclose" data-dismiss="modal">Cancelar</button>


          {{-- <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary antosubmit">Guardar cambios</button> --}}
        </div>
      </div>
    </div>
  </div>

{{-- modal para la edicion de eventos  --}}

  <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel2">Editar datos del evento</h4>
        </div>
        <div class="modal-body">

          <div id="testmodal2" style="padding: 5px 20px;">
            <form id="antoform2" class="form-horizontal calender" role="form">
              <div class="form-group">
                <label class="col-sm-3 control-label">Titulo</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="title2" name="title2">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Descripcion</label>
                <div class="col-sm-9">
                  <textarea class="form-control" style="height:55px;" id="descripcion" name="descr"></textarea>
                </div>
              </div>

            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" >Eliminar</button>
          <button type="button" class="btn btn-primary antosubmit2">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>

  {{-- <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
  <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div> --}}
  <!-- /calendar modal -->


@endsection

@section('scripts1')
<!-- FullCalendar -->
<script src="{{asset("../vendors/moment/min/moment.min.js")}}" defer></script>
<script src="{{asset("../vendors/fullcalendar/dist/fullcalendar.min.js")}}" defer></script>

<script src="{{asset("../vendors/fullcalendar/dist/fullcalendar.js")}}" defer></script>
<script src="{{asset("../vendors/moment/min/locales.js")}}" defer></script>


<script >

    var date = new Date(),
              d = date.getDate(),
              m = date.getMonth(),
              y = date.getFullYear(),
              h = date.getHours(),
              started,
              categoryClass;
    
    
    
      $(function() {
        var calendar =$('#calendar').fullCalendar({
             locale: 'es',
              header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay,listMonth'
              },
    
    
              selectable: true,
              selectHelper: true,
    
    
              // dayClick: function(date, jsEvent, view)
              // {
            //alert('seleccionado en: ' + date.format());
            //alert("Vista actual: " + view.name);
            // $(this).css('background-color','green');
           // $('#fc_create').click();  #CalenderModalNew
            // $('#CalenderModalNew').modal('toggle');

            //     dia = (date.getDate());
            //     mes = (date.getMonth()+1);
            //     anio = (date.getFullYear());
            //     hora = (date.getHours()+":"+date.getMinutes());
                


            //     $('#txtFecha').val(anio+"-"+mes+"-"+dia);
            //     $('#txtHora').val(hora);
            //    // $('txt')
    
            //   },

dayClick: function(date, jsEvent, view)
{
  limpiarFormulario();
  
  $('#txtFecha').val(date.format());  //date.y()+"-"+date.m()+"-"+date.d()
  $('#txtFecha2').val(date.format());
// $("#btnAgregar").prop("disabled",false);
// $("#btnModificar").prop("disabled",true);
// $("#btnEliminar").prop("disabled",true);
$("#btnAgregar").show();
$("#btnModificar").hide();
$("#btnEliminar").hide();

$('#txtCliente').selectpicker('refresh');
  $('#CalenderModalNew').modal('toggle');
},


              //DEL ORIGINAL
    
    //           select: function(start, end, allDay) {
    //           $('#fc_create').click();
    //             $('#txtFecha').val(info.dateStr);

    //           started = start;
    //           ended = end;
    // //
    //           $(".antosubmit").on("click", function() {
    //             var title = $("#title").val();
    //             if (end) {
    //             ended = end;
    //             }
    
    //             categoryClass = $("#event_type").val();
    
    //             if (title) {
    //             calendar.fullCalendar('renderEvent', {
    //               title: title,
    //               start: started,
    //               end: end,
    //               allDay: allDay
    //               },
    //               true // make the event "stick"
    //             );
    //             }
    
    //             $('#title').val('');
    
    //             calendar.fullCalendar('unselect');
    
    //             $('.antoclose').click();
    
    //             return false;
    //           });
    //           },
    
    
    // // cuado le das click a un evento existente 
    //           eventClick: function(calEvent, jsEvent, view) {
    //           $('#fc_edit').click();
    //           $('#title2').val(calEvent.title);
    //           $('#descripcion').val(calEvent.descripcion);
    
    // //es para la categoria o clase del evento
    //           categoryClass = $("#event_type").val();
    // // guarda los cambio del evento, hace referencia al boton de guardar cambios
    //           $(".antosubmit2").on("click", function() {
    //             calEvent.title = $("#title2").val();
    // // actualiza la informacion del evento con el metodo update Event
    //             calendar.fullCalendar('updateEvent', calEvent);
    //             $('.antoclose2').click();
    //           });
    
    //           calendar.fullCalendar('unselect');
    //           },


              eventClick: function(calEvent,jsEvent,view)
              {
                // $("#btnAgregar").prop("disabled",true);
                // $("#btnModificar").prop("disabled",false);
                // $("#btnEliminar").prop("disabled",false);

                $("#btnAgregar").hide();
                $("#btnModificar").show();
                $("#btnEliminar").show();
                //$('#fc_edit').click();
                $('#CalenderModalNew').modal('toggle');
                 dia = calEvent.start.get('date');
                 mes = calEvent.start.get('month')+1;
                 anio = calEvent.start.get('year');

                mes=(mes<10)?"0"+mes:mes;
                dia=(dia<10)?"0"+dia:dia;
                
                 hora = calEvent.start.get('hour');
                 minutos = calEvent.start.get('minute');
                
                hora=(hora<10)?"0"+hora:hora;
                minutos=(minutos<10)?"0"+minutos:minutos;

                $('#txtFecha').val(anio+"-"+mes+"-"+dia);
                $('#txtHora').val(hora+":"+minutos);
                console.log(calEvent);

                dia2 = calEvent.end.get('date');
                 mes2 = calEvent.end.get('month')+1;
                 anio2 = calEvent.end.get('year');

                mes2=(mes2<10)?"0"+mes2:mes2;
                dia2=(dia2<10)?"0"+dia2:dia2;
                
                 hora2 = calEvent.end.get('hour');
                 minutos2 = calEvent.end.get('minute');
                
                hora2=(hora2<10)?"0"+hora2:hora2;
                minutos2=(minutos2<10)?"0"+minutos2:minutos2;

                $('#txtFecha2').val(anio2+"-"+mes2+"-"+dia2);
                $('#txtHora2').val(hora2+":"+minutos2);




              
                $('#txtTitulo').val(calEvent.title);
                $('#txtId_evento').val(calEvent.id_evento);
                //$('#txtId_evento').;
                
                $('#txtCliente').val(calEvent.id_persona) ;
                $('#txtCliente').selectpicker('val');
                $('#txtCliente').selectpicker('render');

                $('#txtDescripcion').val(calEvent.descripcion);
                $('#txtColor').val(calEvent.color);
               
              },
    
    
              editable: true,
    
    //son los eventos de prueba para el ejemplo se pueden modificar e incluso pner color 
            /*  events: [{
              title: 'mantenimiento de hogar',
              descripcion:'!aun puedo lograrla!',
              start: new Date(y, m, 1),
              color:"#fff000",
              textColor:"#000000"
              }, {
              title: 'revisar refrigerador',
              descripcion:"!aun puedo lograrla! 2",
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2)
              }, {
              title: 'instalacion de aire acondicionado',
              descripcion:"!aun puedo lograrla! 3",
              start: new Date(y, m, d, 10, 30),
              allDay: false
              }, {
              title: 'Lunch',
              descripcion:"!aun puedo lograrla! 4",
              start: new Date(y, m, d + 14, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
              }, {
              title: 'fiesta de cumple',
              descripcion:"!aun puedo lograrla  5!",
              start: new Date(y, m, d + 1, 20, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              color:"red",
              textColor:"yellow"
              },
              {
              title: 'partido de futbol',
              descripcion:"!aun puedo lograrla  800!",
              start: new Date(y, m, d + 1, 23, 0),
              end: new Date(y, m, d + 1, 23, 30),
              allDay: false,
              color:"black",
              textColor:"yellow"
              },
    
               {
              title: 'Click for Google',
              descripcion:"!aun puedo lograrla  6!",
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://google.com/'
              }]
*/

              events:"{{url('eventos/evento/show')}}"
  
        });

      });
      
 $('#btnAgregar').click(function(){
  ObjEvento=recolectarDatosGUI("POST");
  EnviarInformacion2("{{route('evento.store')}}",ObjEvento);
  //EnviarInformacion2('',ObjEvento);
 });

$('#btnEliminar').click(function(){
  ObjEvento=recolectarDatosGUI("DELETE");
  EnviarInformacion('/'+$('#txtId_evento').val(),ObjEvento);
 // EnviarInformacion("{{route('evento.destroy',"+$('#txtId_evento').val()+")}}",ObjEvento);
});

$('#btnModificar').click(function(){
  ObjEvento=recolectarDatosGUI("PATCH");
  EnviarInformacion('/'+$('#txtId_evento').val(),ObjEvento);
  //EnviarInformacion("{{route('evento.update',"+$('#txtId_evento').val()+")}}",ObjEvento);
});

function recolectarDatosGUI(method)
  {
    nuevoEvento={
      id_evento:$('#txtId_evento').val(),
      id_persona:$('#txtCliente').val(),   //$('#txtCliente').val()
      title:$('#txtTitulo').val(),
      descripcion:$('#txtDescripcion').val(),
      color:$('#txtColor').val(),
      textColor:'#ffffff',
      start:$('#txtFecha').val()+" "+$('#txtHora').val(),
      end:$('#txtFecha2').val()+" "+$('#txtHora2').val(),

      '_token':$("meta[name='csrf-token']").attr("content"),
      '_method':method
    }
    return (nuevoEvento);
     console.log(nuevoEvento);
  }

  function EnviarInformacion(accion,objEvento){
    $.ajax(
      {
        type:"POST",
        url:"{{url('eventos/evento')}}" + accion,
        //url:  accion,
        data:objEvento,
        success:function(msg)
        {
          console.log(msg);
          
        //  $('#fc_create').click();
        $('#CalenderModalNew').modal('toggle');
          //calendar.refetchEvents();
         // calendar.fullCalendar('updateEvent', calEvent);
         $('#calendar').fullCalendar( 'refetchEvents');
          //calendar.fullCalendar( 'rerenderEvents' );
        },

        error:function(){ alert("hay un error");}
      }
    );
  }

  function EnviarInformacion2(accion,objEvento){
    $.ajax(
      {
        type:"POST",
        //url:"{route('evento.store')}}" + accion,
        url:  accion,
        data:objEvento,
        success:function(msg)
        {
          console.log(msg);
          
        //  $('#fc_create').click();
        $('#CalenderModalNew').modal('toggle');
          //calendar.refetchEvents();
         // calendar.fullCalendar('updateEvent', calEvent);
         $('#calendar').fullCalendar( 'refetchEvents');
          //calendar.fullCalendar( 'rerenderEvents' );
        },

        error:function(){ alert("hay un error");}
      }
    );
  }

function limpiarFormulario(){
  
  $('#txtFecha').val("");
  $('#txtHora').val("07:00");
  $('#txtFecha2').val("");
  $('#txtHora2').val("08:00");
  $('#txtTitulo').val("");
  $('#txtId_evento').val("");
  $('#txtCliente').val("");
 
  $('#txtDescripcion').val("");
  $('#txtColor').val("");
}

    </script>
@endsection