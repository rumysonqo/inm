<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts/fonts.css">


<link href="<?php echo base_url();?>css/Estilo.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/Tablas.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery-ui.min.css">


<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>	


<!--
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/highcharts.js"></script>  
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/modules/exporting.js"></script>  
-->

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/amcharts.js"></script>  
<script src="<?php echo base_url();?>js/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/gauge.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/themes/light.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>js/accounting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/jquery-ui.min.js" type="text/javascript"></script>






<title>Inmunizaciones</title>
</head>


<body>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" 
            data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Menores 1 Año</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url() .'index.php/inm' ?>"><span class="icon-home3"> </span> Inicio <span class="sr-only">(current)</span></a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                aria-expanded="false">Vacuna Pentavalente <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= base_url() .'index.php/penta1' ?>"><span class="icon-stats-bars"></span> Pentavalente 1ra.</a></li>
            <li><a href="<?= base_url() .'index.php/penta2' ?>"><span class="icon-stats-bars"></span> Pentavalente 2da.</a></li>
            <li><a href="<?= base_url() .'index.php/penta3' ?>"><span class="icon-stats-bars2"></span> Pentavalente 3ra.</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                aria-expanded="false">Vacuna IPV <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= base_url() .'index.php/ipv1' ?>"><span class="icon-stats-bars2"></span> IPV 1ra. Dosis</a></li>
            <li><a href="<?= base_url() .'index.php/ipv2' ?>"><span class="icon-stats-bars2"></span> IPV 2da. Dosis</a></li>

            <li class="divider"></li>
            <li><a href="<?= base_url() .'index.php/ipv3' ?>"><span class="icon-stats-bars2"></span> Anti Polio 3ra. Dosis</a></li>
          </ul>
        </li>

		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                aria-expanded="false"> Rotavirus <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= base_url() .'index.php/rot1' ?>"><span class="icon-stats-bars"></span> Rotavirus 1ra. Dosis</a></li>
            <li><a href="<?= base_url() .'index.php/rot2' ?>"><span class="icon-stats-bars"></span> Rotavirus 2da. Dosis</a></li>
          </ul>
        </li>

		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                aria-expanded="false">Neumococo / Influenza <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= base_url() .'index.php/neumo1' ?>"><span class="icon-stats-dots"></span> Neumococo 1ra. Dosis</a></li>
            <li><a href="<?= base_url() .'index.php/neumo2' ?>"><span class="icon-stats-dots"></span> Neumococo 2da. Dosis</a></li>
            <li class="divider"></li>
            <li><a href="<?= base_url() .'index.php/influ1' ?>"><span class="icon-stats-dots"></span> Influenza 1ra. Dosis</a></li>
            <li><a href="<?= base_url() .'index.php/influ2' ?>"><span class="icon-stats-dots"></span> Influenza 2da. Dosis</a></li>
          </ul>
        </li>

      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

