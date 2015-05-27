$(document).ready(function() {
  $( '.calendar' ).datepicker({
      showOn: 'button',
      buttonImage: './static/img/calendar.gif',
      buttonImageOnly: true,
      changeMonth: true,
      changeYear: true,
      dateFormat:'yy-mm-dd',
      //minDate: '-15Y', maxDate: '+1M +10D',
      yearRange: '-70:+0'
  }).mask('9999-99-99');

})


// $("input[name='r_recepcion']").change(function(){
//   if($('input:radio[name=r_recepcion]:checked').val() == "otros"){
//     $('.r_otros.none').addClass('divblock');
//       }
//   else{
//     $('.r_otros.none').removeClass('divblock');
//   }
// });
// $("input[name='r_transmision']").change(function(){
//   if($('input:radio[name=r_transmision]:checked').val() == "otros"){
//     $('.t_otros.none').addClass('divblock');
//       }
//   else{
//     $('.t_otros.none').removeClass('divblock');
//   }
// });
// var sug = ['ronald loyola', 'juan perez'];
// $("input#empleado_name").typeahead({source: sug});

// $('#dt_pedidosss').dataTable();
// $('#dt_pedidos').dataTable({
//                             'bJQueryUI': true,
//                             'bPaginate': true,
//                             'bSort': false, //ordenar por columnas
//                             'sPaginationType': 'full_numbers',
//                             'iDisplayLength': 10,
//                             // 'aoColumnDefs': [
//                             //     { 'sType': 'string', 'aTargets': [1] }
//                             // ],
//                             // 'aoColumns': [
//                             //                   null,
//                             //                  {'sType': 'fecha','bVisible': false }
//                             //                 ],
//                             //'aoColumns': [null,{'bVisible': false}],
//                             'oLanguage': {'sUrl': 'static/js/js_DataTables1.9.4/es_ES.txt'}
//                           });