<?php
require ('../class/dbconnect.php');
require ('../class/xajax_core/xajax.inc.php');
require ('../class/smarty/Smarty.class.php');
require ('model.php');
$xajax=new xajax();
$xajax->configure('javascript URI', 'js/');
date_default_timezone_set('America/Lima');

function ListaPedidosShow(){
  $result = pedidosSQL();

  $dictionary = array("sede_igp"=>"Sede descentralizada","are_igp"=>"Area solicitante", "personal_igp"=>"Responsable de la actividad/proyecto",
    "service_name"=>"Nombre  del servicio/proyecto","service_des"=>"Descripcion  del servicio/proyecto",
    "acceso"=>"Permitir acceso a: nombre/numero ip del equipo / servidor (s)","r_recepcion"=>"Recepción","r_transmision"=>"Transmisión","r_otros"=>"Recepción","t_otros"=>"Transmisión","vol"=>"Volumen de transferencia",
    "puertos"=>"Puertos accesibles ( tcp/udp )","fx_ini"=>"Fecha de inicio del servicio/proyecto",
    "fx_fin"=>"Fecha de fin del servicio/proyecto","observation"=>"Obervaciones","fx_entrega"=>"Fecha entrega informacion");
  // $data_array = xmlToArray($result["data"][0]);
  $keys_public = ["sede_igp","are_igp","personal_igp","service_name","fx_entrega"];
  for ($i=0; $i < count($result["data"]); $i++) {
    $data_array[$i] = xmlToArray($result["data"][$i]);
  }
  // print_r(count($data_array));
  $html = "<table id='dt_ListPedidos' width='100%' class='listAuthor tablacebra-2' cellspacing='0' cellpadding='0' border='0'>
              <thead>
                <tr>
                  <th>Nro</th>
                  <th>Sede</th>
                  <th>Area</th>
                  <th>Responsable</th>
                  <th>Nombre  del servicio / proyecto</th>
                  <th>Fecha de entrega</th>
                  <th>PDF</th>
                </tr>
              </thead>
            <tbody>
            ";
  for ($i=0; $i < count($data_array); $i++) {
    $html .= "<tr>
                ";
    // if ($result["id"][$i]>0 and $result["id"][$i]<10 ) {
    //   $result["id"][$i] = "0".$result["id"][$i];
    // }
    // $html .= "<td><span>".$result["id"][$i]."</span></td>";
    $html .= "<td><span>".$result["id_sede"][$i]."</span></td>";
    foreach ($data_array[$i] as $key => $value) {
      if (in_array($key, $keys_public)) {
          $html .= "<td>".$value."</td>";
      }
    }
    $html .= "  <td><a href='resultado.php?id=".$result["id"][$i]."&id_sede=".$result["id_sede"][$i]."' target='_blank'><span><i class='icon-file'></i><span></a></td>
            </tr>";
  }
  $html .="</tbody>
        </table>";

  return $html;
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

$xajax->processRequest();

$smarty = new Smarty;
$smarty->assign("xajax",$xajax->printJavascript());
$smarty->assign("ListaPedidosShow",ListaPedidosShow());
$smarty->display('ListaPedidos.tpl');
?>

