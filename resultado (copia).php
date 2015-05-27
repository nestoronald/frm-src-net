<?php
//require_once("librerias/html2pdf/dompdf_config.inc.php");

require_once("../class/dompdf_0.6.0/dompdf_config.inc.php");
require ('../class/dbconnect.php');
require ('model.php');
$dompdf = new DOMPDF();


$html='
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <style>


@page {
	margin: 0.5cm;
}

body {
  font-family: sans-serif;
	margin: 0.5cm 0;
	text-align: justify;
}

#header,
#footer {
  position: fixed;
  left: 0;
	right: 0;
	color: #aaa;
	font-size: 0.9em;
}

#header {
  top: 0;
	border-bottom: 0.1pt solid #aaa;
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}

#header table,
#footer table {
	width: 100%;
	border-collapse: collapse;
	border: none;
}

#header td,
#footer td {
  padding: 0;
	width: 50%;
}

.page-number {
  text-align: center;
}

.page-number:before {
  content: "Page " counter(page);
}

hr {
  page-break-after: always;
  border: 0;
}

div.absolute {

	border: 2pt ;
	position: absolute;
	padding: 0.5em;
	text-align: center;
	vertical-align: middle;
}

        .contenedor-tabla{

        display: table;

        }

        .contenedor-fila{

        display: table-row;

        }

        .contenedor-columna{

        display: table-cell;

        }

        .nombre{
            width:43%;
        }

        table {
          margin-top: 2em;
        }

        thead {
          background-color: #000000;
          color:#ffffff;
        }

        tbody {
          background-color: #ffffee;
        }

        th,td {
          padding: 3pt;
        }

        table.separate {
          border-collapse: separate;
          border-spacing: 5pt;
          border: 3pt solid #33d;
        }

        table.separate td {
          border: 2pt solid #33d;
        }

        table.collapse {
          border-collapse: collapse;
          border: 1pt solid black;

        }


        table.collapse thead td {
          font-weight: bold;
        }
        table.collapse td {
          border: 1pt solid black;
        }


        </style>

        </head>

<body>
<div id="header">
  <table>
    <tr>
      <td>USO DE RECURSOS Y SERVICIOS DE INTERNET</td>
      <td style="text-align: right;">Tue, 04 Mar 2014 12:32:58</td>
    </tr>
  </table>
</div>
<div id="footer">
  <div class="page-number"></div>
</div>

<div class="absolute" style="top: 40px; left: 20px; right: 20px;">

</div>
    <div class="absolute" style="top: 100px; left: 20px; right: 20px; bottom: 160px; "><center><h2><b>Nueva  pedido de recursos y servicios de internet</b></h2></center>
      <table class="collapse" align="center">';
$html .= pedidosShow();
$html .= '

    </table>
    <br>
  </div>
  </body>
</html>

    ';
function pedidosShow(){
  $result = pedidosSQL();

  $dictionary = array("sede_igp"=>"sede","are_igp"=>"area", "personal_igp"=>"personal",
    "service_name"=>"Nombre  del servicio/proyecto","service_des"=>"Descripcion  del servicio/proyecto",
    "acceso"=>"Permitir acceso a: nombre/numero ip del equipo / servidor (s)","vol"=>"Volumen de transferencia",
    "puertos"=>"Puertos accesibles ( tcp/udp )","fx_ini"=>"Fecha de inicio del servicio/proyecto",
    "fx_fin"=>"Fecha de fin del servicio/proyecto","observation"=>"Obervaciones","fx_entrega"=>"Fecha entrega informacion");
  $data_array = xmlToArray($result["data"][0]);
  for ($i=0; $i < count($result["data"]); $i++) {
    $data_array[$i] = xmlToArray($result["data"][0]);
  }
  $html = "";
  for ($i=0; $i < count($data_array); $i++) {
    foreach ($data_array as $key => $value) {
      foreach ($dictionary as $key1 => $value2) {
        if ($key == $key1 ) {
          $key = $value2;
        }
      }

      $html .= "<tr>
                  <td>
                    <span><b>".$key."</b></span>
                  </td>
                  <td>
                    ".$value."
                  </td>
              </tr>";
    }
  }

  return $html;
}


//$html = file_get_contents("pdf.html");
$dompdf->load_html($html);
//$dompdf->load_html_file("pdf.html");
$dompdf->render();

//$dompdf->stream("resultado.pdf");


//fopen("pdf".".html","w+");
/*
header('Content-type: application/pdf'); //ponemos la cabecera para PDF
echo $dompdf->output(); //se imprime el documento PDF
*/

$dompdf->stream("mypdffile.pdf",array('Attachment'=>0));
// $dompdf->stream("resultado.pdf");

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

?>
