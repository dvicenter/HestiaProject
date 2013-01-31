
<link rel="stylesheet" href="<?php echo base_url("public/js/vendor/flexBox/css/jquery.flexbox.css")?>">
 <link href="<?php echo base_url("public/js/vendor/select2/select2.css")?>" rel="stylesheet"/>
 <link href="<?php echo base_url("public/js/vendor/datepicker/css/datepicker.css")?>" rel="stylesheet"/>

<div class="form">
	<fieldset>
	<legend>			
		<p>Registrar a Beneficiado</p>
	</legend>
		<div name="busqueda">
		  	<label class="radio inline"><input type="radio" name="rbt_tipo_consulta" value="1" >DNI</label>	  		
			<label id="lbl_tipo_consulta_ap" class="radio inline"><input type="radio" name="rbt_tipo_consulta" value="2" checked="true">Apellidos y Nombres</label>
	  		<div class="inline"id="txt_busqueda_persona"></div>
	  		<button name="btn_nuevo" class="btn btn-small"><i class="icon-plus"></i>Nuevo Alumno</button>
	  		<button name="btn_actualizar" class="btn btn-small" disabled><i class="icon-edit"></i>Actualizar datos</button>		
		</div>
		<form action="">
		<div class="row-fluid fila_datos">
			<div class="span8 inline">
				<div class="row-fluid">
					<div class="span6">
						<label class="etiqueta">Apellido Paterno</label>
						  <input class="span12" disabled="disabled" name="txt_apellido_paterno" size="16" type="text"> 					
					</div>
					<div class="span6">
						  <label class="etiqueta">Apellido Materno</label>
						  <input class="span12" disabled="disabled" name="txt_apellido_materno" size="16" type="text">
					</div>
				</div>
				<div class="row-fluid fila_datos">				  
					  <div class="span8">
						<label class="etiqueta">Nombres Completos</label>
						<input  class="span12" disabled="disabled" name="txt_nombres_completos" size="16" type="text">						
					</div>
					<div class="span4">
						<label class="etiqueta">DNI</label>
						<input  class="span12" disabled="disabled" name="txt_dni" size="16" type="text">
					</div>
				</div>
				<div class="row-fluid fila_datos" >
					<div class="span5">
						<label class="etiqueta">Sexo</label>
						<label class="radio inline"> 
							  <input type="radio" name="rbt_sexo" value="M" disabled="disabled">MASCULINO
						</label>
						 <label class="radio inline"> 
							  <input type="radio" name="rbt_sexo" value="F" disabled="disabled">FEMENINO
						</label>
					  </div>
					  <div class="span3">
						  	<label class="etiqueta">Fecha Nacimiento</label>
						  	<div class="input-append date" id="dp3"  data-date-format="dd/mm/yyyy">
							  <input class="span9" size="16" type="text" name="txt_fec_nacimiento" placeholder="dd/mm/yyyy">
							  <span class="add-on"><i class="icon-th"></i></span>
							</div>
					  </div>
					  <div class="span4">
						<label class="etiqueta">Ciudad Procedencia</label>			
						<input  class="span12" disabled="disabled" name="txt_ciudad_procedencia"  type="text">					
					</div>
				</div>
				<div class="row-fluid fila_datos" >					
					<div class="span4">
						<label class="etiqueta">Telefono Fijo</label>
						<input  class="span12" disabled="disabled" name="txt_telefono_fijo" type="text" placeholder="012395044">						
					</div>
					<div class="span4">
						<label class="etiqueta">Celular 1</label>
						<input  class="span12" disabled="disabled" name="txt_celular1"  type="text" placeholder="966418283">
					</div>
					<div class="span4">
						<label class="etiqueta">Celular 2</label>
						<input  class="span12" disabled="disabled" name="txt_celular2"  type="text" placeholder="973812019">						
					</div>					
				</div>
			</div>
			<div class="span4 inline">
				<img class="span12 foto_persona">
			</div>
		</div>
		<div class="row-fluid fila_datos">
			<div class="span5">
				<label class="etiqueta">Correo Electronico Personal</label>
				<input  class="span12" disabled="disabled" name="txt_correo_personal" size="16" type="email" placeholder="usuario@dominio.com">					
			</div>
			<div class="span5">
				<label class="etiqueta">Correo Electronico Institucional</label>
				<input  class="span12" disabled="disabled" name="txt_correo_institucional" size="16" type="email" placeholder="alumno@unjfsc.edu.pe" >
			</div>					
			<div class="span2">
				<label class="etiqueta">Cod. Universitario</label>
				<input  class="span12" disabled="disabled" name="txt_cod_univ" size="16" type="text" >						
			</div>				  
		</div>
		<div class="row-fluid fila_datos" >
			<div class="span8">
				<label class="etiqueta">Carrera Profesional</label>
				<input type="hidden" id="sl_carrera_profesional">
			</div>
			<div class="span2">
				<label class="etiqueta">Ciclo</label>
				<input  class="span12" disabled="disabled" name="txt_ciclo" type="number" max="12" min="1" value="1" >						
			</div>
		</div>		
		<div class="buttons">
				<div id="mensaje" class="alert pull-left">
				 
				</div>
				<div>
					<button type="submit" name="btn_guardar" class="btn btn-success">Guardar</button>
					<button name="btn_cancelar"class="btn btn-danger">Cancelar</button>
				</div>
		</div>
		</form>		
	</fieldset>
</div>
		
 <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootbox.min.js")?>"></script>
 <script src="<?php echo base_url("public/js/vendor/flexBox/js/jquery.flexbox.js")?>"></script>
 <script src="<?php echo base_url("public/js/vendor/datepicker/js/bootstrap-datepicker.js")?>"></script>
 <script src="<?php echo base_url("public/js/vendor/select2/select2.min.js")?>"></script>
 <script src="<?php echo base_url("public/js/beneficiado/registro_beneficiado.js")?>"></script>