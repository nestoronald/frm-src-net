<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
<link href="static/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Template IGP</title>
    <!--     Boostrap de twitter -->
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="./static/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="./static/css/colorbox_3.css" />
    <link rel="stylesheet" href="./static/css/global.css" type="text/css">
    <link rel="stylesheet" href="./static/css/style.css" type="text/css">
    <link rel="stylesheet" href="./static/css/prettify.css" type="text/css">
    <script src="static/js/jquery-1.7.2.min.js"></script>
    {$xajax}
</head>
<body>
  <div class = "container igp-main">
    <div id="header">
      <div class="container top">
          <div class="span4"><a href="/"><img alt="logo minam igp" src="static/img/logo-minan-igp-2012.png"></a></div>
          <div class="span6"> <h1 class="fcenter">FORMATO DE USO DE RECURSOS Y SERVICIOS DE INTERNET</h1>
          </div>
          <div class="span2"><a href="http://www.igp.gob.pe" alt="logo igp"><img src="static/img/logo-igp-102-78.png"></a></div>
      </div>
      <div class="main-menu navbar navbar-inverse">
            <div class="navbar-inner">
              <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <span class="caret"></span>
                <span>Menu</span>
              </button>
              <div class="nav-collapse collapse">
                  <ul id="menu" class=" nav">
                      {include file="./menu.tpl"}
                  </ul>
                  <ul class="navigp" id="menu_rigth"></ul>
              </div>
            </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="container-fluid igp-content">
        {block name="content"}{/block}
      </div>
    </div>
    <div class="container row-fluid">
      <div class="span12 igp-foot">
              <div class="fcenter">
                  {include file="./foot-info.tpl"}
              </div>
      </div>
    </div>
  </div>
  <script src="static/js/bootstrap.min.js"></script>
  <script type="text/javascript" language="javascript" src="static/js/datatable/jquery.dataTables.min.js"></script>
  <script src="static/js/colorbox/jquery.colorbox-min.js"></script>
  <script src="static/js/igp.min.js"></script>
</body>
</html>
