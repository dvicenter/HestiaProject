<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Hestia - Sistema de Gestión de Servicio Alimentario UNJFSC</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url("public/css/normalize.css")?>">
        <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/bootstrap/css/bootstrap.css")?>">
        <link rel="stylesheet" href="<?php echo base_url("public/css/home.css")?>">
        <script src="<?php echo base_url("public/js/vendor/modernizr-2.6.1.min.js")?>"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <header>        	
        	<div class="header_text">
        		<img src="<?php echo base_url("public/img/logo.png")?>"/>        	
        		<h1>Hestia</h1>
        	</div>
        	<p>Sistema de Gestión de Servicio Alimentario</p>               	
        </header>
		<div class="seccion_marcado_asistencia">	
			<div class="marcado_asistencia_primero">
				<div class="asistencia_fecha_sistema"></div>
			</div>
			<div class="marcado_asistencia_segundo">
				<div class="asistencia_consulta"></div>
				<div class="asistencia_hora_sistema"></div>
			</div>
			<div class="marcado_asistencia_tercero"></div>
		</div>        
        <script src="<?php echo base_url("public/js/vendor/jquery-1.8.0.min.js")?>"></script>
        <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootstrap.min.js")?>"></script>
        <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootstrap-tooltip.js")?>"></script>
        <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootstrap-transition.js")?>"></script>  
        <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootstrap-collapse.js")?>"></script>          
        <script>window.jQuery || document.write('<script src="<?php echo base_url("public/js/vendor/jquery-1.8.0.min.js")?>"><\/script>')</script>
        <script src="<?php echo base_url("public/js/plugins.js")?>"></script>
        <script src="<?php echo base_url("public/js/home.js")?>"></script>

    </body>
</html>
