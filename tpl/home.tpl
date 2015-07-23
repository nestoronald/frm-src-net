{extends file="./base.tpl"}
{block name=content}
<script type="text/javascript">
  $(document).ready(function() {
    $("input[name='r_recepcion']").change(function(){
      if($('input:radio[name=r_recepcion]:checked').val() == "otros"){
        $('.r_otros.none').addClass('divblock');
          }
      else{
        $('.r_otros.none').removeClass('divblock');
      }
    });
    $("input[name='r_transmision']").change(function(){
      if($('input:radio[name=r_transmision]:checked').val() == "otros"){
        $('.t_otros.none').addClass('divblock');
          }
      else{
        $('.t_otros.none').removeClass('divblock');
      }
    });
  } );

</script>
<h3>Formulario de Pedido</h3>
<div id="frm_data">
  <form action="" name="frm_data" id="frm_data">
  <div><small class="muted text-right">(*) Campos obligatorios</small></div>
  <table>
      <tr class="">
      <td class="label01">SEDE DESCENTRALIZADA <small class="muted">(*)</small>: </td> <td><span id="sede_cbo"></span></td>
      </tr>
      <tr class="">    <td class="label01">AREA SOLICITANTE <small class="muted">(*)</small>:</td> <td><span id="area_cbo">
          <select name='are_igp' id='area_igp'>
          </select>
          </span> </td>
      </tr>
      <tr class="">    <td class="label01">UNIDAD FUNCIONAL <small class="muted">(*)</small>:</td> <td><span id="subarea_cbo">
          <select name='subare_igp' id='subare_igp'>
          </select>
          </span> </td>
      </tr>
      <tr class="">
           <td class="label01">RESPONSABLE DE LA ACTIVIDAD / PROYECTO <small class="muted">(*)</small>: </td> <td> <span class="none"><input type="text" id="empleado_name"/></span>
              <span id="personal_cbo">
                  <select name='ṕersonal_igp' id='personal_igp'>
                  </select>
              </span>
              </td>
      </tr>
      <tr class="">    <td class="label01">NOMBRE  DEL SERVICIO / PROYECTO <small class="muted">(*)</small>:</td> <td><textarea name="service_name" id="service_name" ></textarea> </td></tr>
      <tr class="">    <td class="label01">DESCRIPCIÓN  DEL SERVICIO / PROYECTO <small class="muted">(*)</small>:</td> <td> <textarea name="service_des" id="service_des" ></textarea> </td></tr>
      <tr class="">    <td class="label01">PERMITIR ACCESO A: NOMBRE / NUMERO IP DEL EQUIPO / SERVIDOR (S) <small class="muted">(*)</small>:  </td> <td> <textarea name="acceso" id="acceso" ></textarea> </td></tr>
      <tr class="">    <td class="label01"> TIPO DE DATOS</td> <td> </td></tr>
      <tr class="">    <td class="t-rigth">RECEPCIÓN <small class="muted">(*)</small>: &nbsp &nbsp &nbsp &nbsp</td>
              <td> <span class="rb_igp">Rafaga <input type="radio" name="r_recepcion" value="rafaga" /></span>
              <span class="rb_igp">Contínua <input type="radio" name="r_recepcion" value="continua" /></span>
              <span class="rb_igp">Otros <input type="radio" name="r_recepcion" value="otros" /></span><br />
              <span class="r_otros none">
                  <textarea name="r_otros" id="r_otros" placeholder="Ingrese descripción" ></textarea>
              </span> </td>
      </tr>
      <tr class="">    <td class="t-rigth">TRANSMISIÓN <small class="muted">(*)</small>: &nbsp &nbsp &nbsp &nbsp</td>
              <td> <span class="rb_igp">Rafaga <input type="radio" name="r_transmision" value="rafaga" /></span>
              <span class="rb_igp">Contínua <input type="radio" name="r_transmision" value="continua" /></span>
              <span class="rb_igp">Otros <input type="radio" name="r_transmision" value="otros" /></span><br />
              <span class="t_otros none ">
                  <textarea name="t_otros" id="t_otros" placeholder="Ingrese descripción" ></textarea>
              </span> </td>
      </tr>
      <tr class="">    <td class="label01"> &nbsp </td> <td> &nbsp </td></tr>
      <tr class="">    <td class="label01">VOLUMEN DE TRANSFERENCIA ( Expresado en GB, MB, KB, por unidad de tiempo) <small class="muted">(*)</small>: </td> <td> <input type="text" name="vol" placeholder=" GB, MB ó KB" /></td></tr>
      <tr class="">    <td class="label01">PUERTOS ACCESIBLES (TCP / UDP):</td> <td> <textarea name="puertos" id="puertos" ></textarea></td></tr>
      <tr class="">    <td class="label01">FECHA DE INICIO DEL SERVICIO/PROYECTO <small class="muted">(*)</small>:</td> <td> <input class="calendar" type="text" name="fx_ini" /></td></tr>
      <tr class="">    <td class="label01">FECHA DE FIN DEL SERVICIO/PROYECTO <small class="muted">(*)</small>:</td> <td><input class="calendar" type="text" name="fx_fin" /> </td></tr>
      <tr class="">    <td class="label01">OBERVACIONES :</td> <td> <textarea name="observation" id="" ></textarea> </td></tr>
      <tr class="">    <td class="label01"> &nbsp </td> <td> <p class="text-error" id="frm_msj"></p> </td></tr>
      <tr class="">    <td class="label01"> &nbsp </td> <td> <input type="hidden"  name="fx_entrega" class="datenow" value="{'Y-m-d'|date}"/> </td></tr>
      <tr class="">    <td class="label01"></td> <td> <input type="button" value="Guardar" class="btn" onclick="xajax_guardar(xajax.getFormValues('frm_data')); return false;" /> </td></tr>

  </table>


  </form>
  <script>xajax_sedeShow(); xajax_areaShow(); xajax_subareaShow();xajax_personalShow();</script>
</div>

{/block}