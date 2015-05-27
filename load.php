<?php
//Smarty
require ('../class/dbconnect.php');
require ('../class/xajax_core/xajax.inc.php');
require ('../class/smarty/Smarty.class.php');
require ('model.php');
try {
    $xajax=new xajax();
    $xajax->configure('javascript URI', 'js/');
    date_default_timezone_set('America/Lima');
    $smarty = new Smarty;
} catch (Exception $e) {
  die ('ERROR AL CARGAR PLANTILLA: ' . $e->getMessage());
}


