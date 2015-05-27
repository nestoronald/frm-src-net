{extends file="./base.tpl"}

{block name=content}
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
                //columna uno tipo string (para ignorar etiquetas html)
                var sug = ['Ancon','Arequipa','Chiclayo','Huancayo','Jicamarca','Mayorasgo'];

                // $('#dt_ListPedidos').dataTable({
                //     "bJQueryUI": false,
                //     "bLengthChange": false,
                //     "oLanguage": {
                //         "sUrl": "static/js/js_DataTables/es_ES.txt",
                //     },
                //     "aaSorting": [ [1,"desc"] ],
                //     "aoColumnDefs": [
                //         { "sType": 'string', 'aTargets': [0] }
                //     ],
                //     'bJQueryUI': true,
                //     'bPaginate': true,
                //     // 'bSort': false, //ordenar por columnas
                //     'sPaginationType': 'full_numbers',
                //     'iDisplayLength': 10,
                // });
                // $('#dt_pedidos_length').remove();
    } );
</script>
  <h3>Lista de Registros</h3>
  {$ListaPedidosShow}
{/block}