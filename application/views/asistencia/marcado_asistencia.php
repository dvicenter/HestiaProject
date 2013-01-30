<div class="panel_trabajo">
	<div class="marcado_asistencia_primero">
		<div class="asistencia_fecha_sistema">
			<p id="marcado_asistencia_fecha"></p>
		</div>
	</div>
	<div class="marcado_asistencia_segundo">		
		<div class="asistencia_hora_sistema">		
			<p id="marcado_asistencia_hora"></p>
		</div>
	</div>
	<div class="marcado_asistencia_tercero">	
			<div class="asistencia_consulta">
				<form id="marcado_asistencia_form" method="post" action="<?php echo base_url("index.php/asistencia/gestion_asistencia/registrarAsistenciaPersona")?>"> 
					<div class="input-append">
	  				<input class="span2" id="codigo_consultar" name="txt_dni_consulta" size="16" type="number">
	  				<button class="btn " id="boton_consultar"type="submit"><i class="icon-search icon-black"></i></button>
					</div>
				</form>
			</div>	
	</div>			
	<div class="marcado_asistencia_cuarto">		
		<div class="asistencia_foto">
			<div class="polaroid">				
					<img src="<?php echo base_url("public/img/usuario_demo.png")?>"/>
					<p name="dni"></p>
			</div>
		</div>
		<div class="asistencia_datos">			
			<div class="asistencia_mensaje">	
				<img id="imagen_mensaje"/>
				<p name="mensaje"></p>
			</div>			
			<div class="asistencia_tipo">
				<p name="tipo_atendido"></p>
			</div>
			<div class="asistencia_ape_nom">
				<p name="nombres_atendido"></p>
			</div>
			<div class="asistencia_car_cic">
				<p name="carrera_atendido"></p>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url("public/js/asistencia/marcado_asistencia.js")?>"></script>