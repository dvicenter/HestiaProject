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
		<div class="seccion_principal">
			<div class="seccion_left">
				<div class="datos_usuarios">
					<div class="imagen_dato_usuario">
					<img src="<?php echo base_url("public/img/demo.jpg")?>"/>
					</div>
					<div class="divisor"></div>
					<div class="texto_dato_usuario">
					<p>
						<b>Código:</b>
						<i>0333081003</i><br>
						<b>Usuario:</b>
						<i>Elizabeth Manrique</i><br>
						<b>Sucursal:</b>
						<i>Central</i>
					</p>
					</div>
					<div class="edit_dato_usuario">
					<a  href="#editar" ><img  id="editar_button" title="Editar datos" class="edit_dato_usuario_imagen"src="<?php echo base_url("public/img/editar_datos.png")?>"></a>
					</div>
				</div>
				<nav>
					<ul class="nav nav-list">
						  <div id="p_gestion_menu"data-toggle="collapse" data-target="#gestion_menu"><li class="nav-header nav-header-active"><img src="<?php echo base_url("public/img/menu_16x16.png")?>">Gestión de Menu</li></div>
						  <div id="gestion_menu" class="collapse out" data-parent="#p_gestion_menu">
							  <li class="divider"></li>
							  <li class="active_sub_menu"><a href="#">Lorem Ipsum</a></li>						  
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
						  </div>
						  <div id="p_gestion_asistencia" data-toggle="collapse" data-target="#gestion_asistencia"><li class="nav-header"><img src="<?php echo base_url("public/img/asistencia_16x16.png")?>">Gestión de Asistencia</li></div>
						  <div id="gestion_asistencia" class="collapse out" data-parent="#p_gestion_asistencia">
							  <li class="divider"></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>						  
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
						  </div>
						   <div id="p_gestion_reportes" data-toggle="collapse" data-target="#gestion_reportes"><li class="nav-header"> <img src="<?php echo base_url("public/img/reporte_16x16.gif")?>"> Gestión de Reportes</li></div>
						  <div id="gestion_reportes" class="collapse in" data-parent="#p_gestion_reportes">
							  <li class="divider"></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
						  </div>
						  
					</ul>
				</nav>
			</div>
			<div class="seccion_right">
				<div class="mensaje_datos">
					
				</div>
				<div class="seccion_datos">
					
				</div>	
			</div>
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
