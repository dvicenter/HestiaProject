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
        <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/bootstrap/css/bootstrap.min.css")?>">
        <link rel="stylesheet" href="<?php echo base_url("public/css/login.css")?>">
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
		<div class="panel_principal">
			<div class="login">
				<form action="<?php echo base_url("index.php/login/verificarCredenciales")?>" method="POST">
				<div class="cuerpo_login">
					
						<label>Usuario</label>
						<input autocomplete="OFF" autofocus required min="0" placeholder="72324881" type="number" name="txt_usuario"/>
						<label>Contraseña</label>
						<input autocomplete="OFF" required type="password" name="txt_password"/>				
				</div>
				<div class="botones_login">
					<button class="btn btn-warning btn-large" type="submit"><i class="icon-white icon-lock"></i>Entrar</button>
				 	<input class="btn btn-large btn-inverse " type="button" name="boton_recuperar_pass_login" value="Olvide Contraseña"/>
				</div>
				</form>
			</div>
		</div>
        <script src="<?php echo base_url("public/js/vendor/jquery-1.8.0.min.js")?>"></script>
        <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootstrap.min.js")?>"></script>        
        <script>window.jQuery || document.write('<script src="<?php echo base_url("public/js/vendor/jquery-1.8.0.min.js")?>"><\/script>')</script>
        <script src="<?php echo base_url("public/js/plugins.js")?>"></script>
        <script src="<?php echo base_url("public/js/login.js")?>"></script>

    </body>
</html>
