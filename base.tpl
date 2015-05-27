<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <link href="static/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMATO DE USO DE RECURSOS Y SERVICIOS DE INTERNET </title>
        <!--     Boostrap de twitter -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/jquery-ui-1.8.17.custom.css">
    <link rel="stylesheet" href="static/css/demo_table_jui.css">

    <script type="text/javascript" src="static/js/jquery-1.7.2.js"></script>
    <script type="text/javascript" src="static/js/jquery-ui-1.8.17.custom.min.js"></script>
    <script type="text/javascript" src="static/js/jquery-ui-datepicker-es.js"></script>
    <script type="text/javascript" src="static/js/jquery.maskedinput-1.2.2-co.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>

    <!-- <script src="/static/js/bootstrap-collapse.js"></script>
    <script src="/static/js/bootstrap-tooltip.js"></script> -->
    <script src="static/js/bootstrap-popover.js"></script>
    <script src="static/js/typeahead.js"></script>
    <script src="static/js/js_DataTables/jquery.dataTables.min.js" language="javascript" type="text/javascript"></script>
    <script src="static/js/main-igp.js"></script>

    {$xajax}
</head>
<body >
  <div id="form" name="form"></div>
    <div class = "container main-igp">
        <div id="header" class="cabecera">
            <div class="row-fluid">
                <div class="span4"><br>
                    <img src="static/img/logo-minan-igp_2012.png"/>
                </div>
                <div class="span2 offset6">
                    <img src="static/img/igp-trans.png">
                </div>
            </div>
            <div class="container main-menu">

                    <div class="navbar navbar-inverse">
                        <div class="navbar-inner">
                            <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="caret"></span>
                               <span>Menu</span>
                            </button>
                            <div class="nav-collapse collapse">
                                <ul id="menu" class=" nav"></ul>
                                <ul class="nav nav-pills pullright">
                                    <li><a href="./index.php">Inicio</a></li>
                                    <li><a href="./ListaPedidos.php">Lista de registros</a></li>
                                    <li><a href="./pedidos.php">Detalle de registros</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="container main-title">
            <div class="row-fluid" >
                <div class="span12">
                    <div class="container-fluid">
                        <h3 class="cblanco fcenter"> FORMATO DE USO DE RECURSOS Y SERVICIOS DE INTERNET  </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        </div>
          <hr class="space">
          <div class="last container-fluid" id="contenido_inv">
                <div class="row-fluid">
                  {block name=content}{/block}

                </div>
          </div>
        <div class="container">
            <div class="row-fluid">
             <div class="contenedor-pie">
                <br>
                <p>Calle Badajoz # 169 - Mayorazgo IV Etapa - Ate Vitarte | Central Telefónica: 317-2300 |
                <a class="mostaza" href="#">Contacto </a>| Escríbenos a: <a rel="propover" class="mostaza" href="mailto:web@igp.gob.pe" >web@igp.gob.pe</a>
                </p><br>
             </div>
            </div>
        </div>
  </div>

<!-- <script src="/static/js/modal.js"></script> -->
<!-- <script src="/static/js/bootstrap-scrollspy.js"></script> -->
</body>
</html>
