<?php
require ('../class/dbconnect.php');
require ('../class/xajax_core/xajax.inc.php');
require ('../class/smarty/Smarty.class.php');
require ('model.php');
$xajax=new xajax();
$xajax->configure('javascript URI', 'js/');
date_default_timezone_set('America/Lima');

function pedidosShow(){
  $result = pedidosSQL();

  $dictionary = array("sede_igp"=>"Sede descentralizada","are_igp"=>"Area solicitante", "personal_igp"=>"Responsable de la actividad/proyecto",
    "service_name"=>"Nombre  del servicio/proyecto","service_des"=>"Descripcion  del servicio/proyecto",
    "acceso"=>"Permitir acceso a: nombre/numero ip del equipo / servidor (s)","r_recepcion"=>"Recepción","r_transmision"=>"Transmisión","r_otros"=>"Recepción","t_otros"=>"Transmisión","vol"=>"Volumen de transferencia",
    "puertos"=>"Puertos accesibles ( tcp/udp )","fx_ini"=>"Fecha de inicio del servicio/proyecto",
    "fx_fin"=>"Fecha de fin del servicio/proyecto","observation"=>"Obervaciones","fx_entrega"=>"Fecha entrega informacion");
  // $data_array = xmlToArray($result["data"][0]);
  for ($i=0; $i < count($result["data"]); $i++) {
    $data_array[$i] = xmlToArray($result["data"][$i]);
  }
  // print_r(count($data_array));
  $html = "<table id='dt_pedidos' width='100%' class='listAuthor tablacebra-2' cellspacing='0' cellpadding='0' border='0'>
            <tbody>
            ";
  for ($i=0; $i < count($data_array); $i++) {
    $html .= "<tr>
              <td>
               <div class='list_block' id='d-info'>
                <div class='conte-table'>
                ";
    if ($result["id"][$i]>0 and $result["id"][$i]<10 ) {
      $result["id"][$i] = "0".$result["id"][$i];
    }
    // $html .= "  <p class='row-igp'>
    //               <span class='block_2' style='min-height: 21px;'>
    //                 <span><b>Número de pedido</b></span>
    //               </span>
    //                 ".$result["id_sede"][$i]."
    //             </p>";
    $html .= "  <dl class='dl-horizontal'>
                  <dt>
                    <b>Número de pedido</b>
                  </dt>
                  <dd>
                    ".$result["id_sede"][$i]."
                  </dd>
                </dl>";
    foreach ($data_array[$i] as $key => $value) {
      foreach ($dictionary as $key1 => $value2) {
        if ($key == $key1 ) {
          $key = $value2;
        }
      }
      // $html .= "<p class='row-igp'>
      //             <span class='block_2' style='min-height: 21px;'>
      //               <span><b>".$key.": </b></span>
      //             </span>
      //               ".$value."
      //         </p>";
      $html .= "<dl class='dl-horizontal'>
                  <dt>
                    <b>".$key.": </b>
                  </dt>
                  <dd>
                    ".$value."
                  </dd>
              </dl>";
    }
    $html .= "  <p class='center'><a href='resultado.php?id=".$result["id"][$i]."&id_sede=".$result["id_sede"][$i]."' target='_blank'><span>PDF<span></a></p>
                </div>
               </div>
              </td>
            </tr>";
  }
  $html .="</tbody>
        </table>";

  return $html;
}

function arrayToXml($array,$lastkey='root'){
    $buffer="";
    $buffer.="<".$lastkey.">";
    if (!is_array($array)){
        $buffer.=$array;}
    else{
        foreach($array as $key=>$value){
            if (is_array($value)){
                if ( is_numeric(key($value))){
                    foreach($value as $bkey=>$bvalue){
                        $buffer.=arrayToXml($bvalue,$key);
                    }
                }
                else{
                    $buffer.=arrayToXml($value,$key);
                }
            }
            else{
                    $buffer.=arrayToXml($value,$key);
            }
        }
    }
    $buffer.="</".$lastkey.">\n";
    return $buffer;
}
function xmlToArray($xml=""){
    $xmlt = simplexml_load_string($xml);
    if (!$xmlt) {

        foreach(libxml_get_errors() as $error) {
            echo "\t", $error->message;
        }
        return "Error cargando XML \n";
    }
    $json = json_encode($xmlt);
    $array= json_decode($json,TRUE);
    return $array;
}


$xajax->registerFunction('personalShow');
$xajax->processRequest();

$smarty = new Smarty;
$smarty->assign("xajax",$xajax->printJavascript());
$smarty->assign("pedidosShow",pedidosShow());
$smarty->display('pedidos.tpl');
?>

