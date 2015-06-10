<?php
require ('load.php');
//Smarty
function sedeShow(){
    $sede_dic =["ANC"=>"Ancón","ARE"=>"Arequipa","CHI"=>"Chiclayo","HYO"=>"Huancayo","JIC"=>"Jicamarca","MAY"=>"Mayorasgo"];
    $objresponse = new xajaxResponse();
    // $result = comboSedeSQL();
    $html = "<select name='sede_igp' id='sede_igp' >";
    foreach ($sede_dic as $key => $value) {
        $html .="<option value='".$value."' >".$value."</option>";
    }

    $html .= "</select>";
    $objresponse->assign("sede_cbo","innerHTML",$html);
    return $objresponse;
}

function areaShow($id_sede=0){
    $objresponse = new xajaxResponse();
    //$result = comboAreaSQL($id_sede);
    $result = comboAreaSQL();
    //$html = "<select name='are_igp' id='area_igp' onchange='xajax_personalShow($id_sede,this.value)'>";
    $html = "<select name='are_igp' id='area_igp'>";
    for ($i=0; $i < count($result["area_description"]); $i++) {
       $html .="<option value='".$result["area_description"][$i]."'>
                ".$result["area_description"][$i]."
                </option>";
    }
    $html .= "</select>";
    $objresponse->assign("area_cbo","innerHTML",$html);
    return $objresponse;
}

function personalShow(){
    $objresponse = new xajaxResponse();
    $result = comboPersonalSQL();
    $html = "<select name='personal_igp' id='personal_igp'>";
    for ($i=0; $i < count($result["empleado_surname"]); $i++) {
       $names = $result["empleado_surname"][$i].", ".$result["empleado_name"][$i];
       $html .="<option value='".$names."'>
                ".$names."
                </option>";
    }
    $html .= "</select>";
    $objresponse->assign("personal_cbo","innerHTML",$html);
    return $objresponse;
}

function guardar($form=""){
    $objresponse = new xajaxResponse();
    // $objresponse->alert(print_r($form,TRUE));
    //transmision
    if (isset($form["t_otros"]) ) {
        if (empty($form["t_otros"])) {
            unset($form["t_otros"]);
        }
        else{
            unset($form["t_recepcion"]);
        }
    }
    //recepcion
    if (isset($form["r_otros"]) ) {
        if (empty($form["r_otros"])) {
            unset($form["r_otros"]);
        }
        else{
            unset($form["r_recepcion"]);
        }
    }
    $vacio = 0;
    foreach ($form as $key => $value) {
        if (empty($value) and $key!="observation") {
            $vacio += 1;
        }
    }
    if (isset($form["observation"]) and empty($form["observation"])) {
        $form["observation"] = "-";
    }
    //validar campos vacios

    if ($vacio==0) {
        $sede_dic =["ANC"=>"Ancón","ARE"=>"Arequipa","CHI"=>"Chiclayo","HYO"=>"Huancayo","JIC"=>"Jicamarca","MAY"=>"Mayorasgo"];

        $data_xml = arrayToXml($form);
        foreach ($sede_dic as $key => $value) {
            if ($form["sede_igp"]==$value) {
                $result_count = SedeCount($key);
                if ($result_count["Error"]==100) {
                    $form["sede_igp_count"] = $key."-".($result_count["Count"]+1);
                }
                else{
                    $form["sede_igp_count"] = $key."-1";
                }
            }
        }
        if (isset($form["sede_igp_count"],$data_xml)) {
            $result = guardarfrmSQl($form["sede_igp_count"],$data_xml);
            if ($result["Error"]==0) {
                $html = "<div class='block_5'><p class='text-info'><i class='icon-ok-circle'></i> Pedido guardado correctamente</p>
                                </div><div class='clear'></div>
                                <a class='btn' href='./index.php' title='clic aquí para insertar nuevo pedido'>Nuevo Pedido</a><hr>";
            }
            else{
                $html = "<p class='error'>Intente mas tarde hubo problemas estamos trabajando para solucionarlo</p>";
            }
            $objresponse->assign("frm_msj","innerHTML","");
            $objresponse->assign("frm_data","innerHTML",$html);
        }


    }
    else{
        $msj = "<small>(*)</small> Verifique si todo los campos obligatorios no estan vacios";
        $objresponse->assign("frm_msj","innerHTML",$msj);
    }


    return $objresponse;
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

$xajax->registerFunction('sedeShow');
$xajax->registerFunction('areaShow');
$xajax->registerFunction('guardar');
$xajax->registerFunction('personalShow');
$xajax->processRequest();

$smarty->assign("xajax",$xajax->printJavascript());
$smarty->display('./tpl/home.tpl');

?>
