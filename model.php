<?php
    function comboSedeSQL($idSede=0){
        $dbh=conx27("personal","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        $i=0;
        foreach($dbh->query("SELECT * FROM sede order by sede_description asc") as $row) {
            $result["sede_description"][$i]= $row["sede_description"];
            $result["idsede"][$i]= $row["idsede"];
            // $idsede[$i]= $row["idsede"];
            $i++;
        }
        $dbh = null;
        return $result;
    }
    function comboPersonalSQL(){
        $dbh=conx27("personal","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        $i=0;
        foreach($dbh->query("SELECT * FROM v_empleado_laboral_cargo where(idempleado !=107) order by empleado_surname asc") as $row) {
            $result["empleado_surname"][$i] = $row["empleado_surname"];
            $result["empleado_name"][$i] = $row["empleado_name"];
            $result["idempleado"][$i] = $row["idempleado"];
            // $idsede[$i]= $row["idsede"];
            $i++;
        }
        $dbh = null;
        return $result;
    }

    function comboAreaSQL($idSede=0){
        $andidsede="";
        if($idSede!=0){
            $andidsede=" and idsede='$idSede' ";
        }

        $i=0;        // $area_description="";
        // $idarea="";
        // $qresult="";
        $result = array();
        $dbh=conx27("personal","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        foreach($dbh->query("SELECT DISTINCT idarea,area_description,idsede FROM areas where area_enable=1 $andidsede GROUP BY area_description asc") as $row) {
            $result["area_description"][$i]= $row["area_description"];
            $result["idarea"][$i]= $row["idarea"];
            // $area_description[$i]= $row["area_description"];
            // $idarea[$i]= $row["idarea"];
            $i++;
        }
        $dbh = null;
        // if (is_array($area_description) and is_array($idarea)){
        //     $qresult[0]=$idarea;
        //     $qresult[1]=$area_description;
        // }
        // else{
        //     $qresult[0]="Error";
        //     $qresult[1]="No existen Áreas";
        // }

        // return $qresult;
        return $result;
    }
    function comboSubAreaSQL($idArea=0){
        $andidarea="";
        if($idArea!=0){
            $andidarea=" and idarea='$idArea' ";
        }
        $i=0;
        $result = array();
        $dbh=conx27("personal","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        foreach($dbh->query("SELECT DISTINCT idoffice,office_description,idarea FROM office where office_enable=1") as $row) {
            $result["subarea_description"][$i]= $row["office_description"];
            $result["idsubarea"][$i]= $row["idoffice"];
            $i++;
        }
        $dbh = null;
        return $result;
    }
    function guardarfrmSQl($id_sede,$data){
        $dbh=conx("resources_services","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        $sql = "insert into pedidos(id_sede,data) values(";
        $sql .= "'".$id_sede."',";
        $sql .= "'".$data."'";
        $sql .=")";

        if($dbh->query($sql)){
            $result["Error"]=0;
        }
        else{
            $result["Error"]=1;
        }

        $dbh = null;
        $result["Query"]=$sql;
        return $result;

    }
    function pedidosSQL(){
        $dbh=conx("resources_services","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        $i=0;
        foreach($dbh->query("SELECT * FROM pedidos ORDER BY id DESC ") as $row) {
            $result["data"][$i]= $row["data"];
            $result["id"][$i]= $row["id"];
            $result["id_sede"][$i]= $row["id_sede"];
            $i++;
        }
        $dbh = null;
        return $result;
    }
    function pedidoPDFtoSQL($id=0){
        $dbh=conx("resources_services","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        $i=0;
        $w = ($id!=0) ? "WHERE id=$id":"";
        foreach($dbh->query("SELECT * FROM pedidos $w ORDER BY id DESC LIMIT 0 , 1") as $row) {
            $result["data"][$i]= $row["data"];
            $result["id"][$i]= $row["id"];
            // $idsede[$i]= $row["idsede"];
            $i++;
        }
        $dbh = null;
        return $result;
    }
    function SedeCount($sede_igp_abr=""){
        $dbh=conx("resources_services","wmaster","igpwmaster");
        $dbh->query("SET NAMES 'utf8'");
        $i=0;
        foreach($dbh->query("SELECT * FROM pedidos WHERE id_sede LIKE '%".$sede_igp_abr."%' ") as $row) {
            $result["data"][$i]= $row["data"];
            $result["id"][$i]= $row["id"];
            $i++;
        }
        if (isset($result["id"])) {
            $result["Count"] = count($result["id"]);
            $result["Error"] = 100;
        }
        else{
            $result["Count"] = 0;
            $result["Error"] = -100;
        }
        $dbh = null;
        return $result;
    }
 ?>