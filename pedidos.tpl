{extends file="base.tpl"}

{block name=content}
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
                //columna uno tipo string (para ignorar etiquetas html)
                $('#dt_pedidos').dataTable({
                    "bLengthChange": false,
                    "oLanguage": {
                        "sUrl": "static/js/js_DataTables/es_ES.txt"
                    },
                    "aoColumnDefs": [
                        { "sType": 'string', 'aTargets': [0] }
                    ],
                    'bJQueryUI': true,
                    'bPaginate': true,
                    'bSort': false, //ordenar por columnas
                    'sPaginationType': 'full_numbers',
                    'iDisplayLength': 1,

                });
                // $('#dt_pedidos_length').remove();
    } );
</script>
  <h3>Detalle de Registros</h3>
  {$pedidosShow}
{/block}