

		<fieldset>
			<legend>Registrar a Beneficiado</legend>
			 	<label class="radio inline"> 
			  		<input type="radio" name="rbt_tipo_consulta" value="1" >DNI
				</label>
			 	<label class="radio inline"> 
			  		<input type="radio" name="rbt_tipo_consulta" value="2" checked="true">Apellidos y Nombres
				</label>
				<div id="ffb2"></div>	
				<button name="btn_nuevo" class="btn btn-primary"><i name="icon_accion" class="icon-plus-sign icon-white"></i><i name="lbl_accion">Nuevo</i></button>
				
				<div class="row-fluid" style="margin-top: 2%">
					<div class="span3">
						<label class="inline">Apellido Paterno</label>
						<div class="input-prepend inline">
  							<span class="add-on"><i class="icon-user"></i></span>
  							<input class="span10" disabled="disabled" name="txt_apellido_paterno" size="16" type="text" placeholder="Apellido Paterno">
  						</div>
  					</div>
  					<div class="span3">
  						<label class="inline">Apellido Materno</label>
  						<div class="input-prepend inline">
  							<span class="add-on"><i class="icon-user"></i></span>
  							<input class="span10" disabled="disabled" name="txt_apellido_materno" size="16" type="text" placeholder="Apellido Paterno">
  						</div>
  					</div>
  					<div class="span4">
						<label class="inline">Nombres Completos</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_nombres_completos" size="16" type="text" placeholder="Nombres Completos">
						</div>
					</div>
					<div class="span2">
						<label class="inline">DNI</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
				</div>
				<div class="row-fluid" style="margin-top: 2%">
					<div class="span3">
						<label class="inline">Sexo</label>
						<label class="radio inline"> 
					  		<input type="radio" name="rbt_sexo" value="M" disabled="disabled"  checked="true">MASCULINO
						</label>
					 	<label class="radio inline"> 
					  		<input type="radio" name="rbt_sexo" value="F" disabled="disabled"  checked="true">FEMENINO
						</label>
  					</div>
  					<div class="span3">
  						<label class="inline">Fecha Nacimiento</label>
  						<div class="input-prepend inline">
  							<span class="add-on"><i class="icon-user"></i></span>
  							<input class="span10" disabled="disabled" name="txt_apellido_materno" size="16" type="datetime" placeholder="Apellido Paterno">
  						</div>
  					</div>
  					<div class="span4">
						<label class="inline">Ciudad Procedencia</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_nombres_completos" size="16" type="text" placeholder="Nombres Completos">
						</div>
					</div>
					<div class="span2">
						<label class="inline">Telefono Fijo</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
				</div>
				<div class="row-fluid" style="margin-top: 2%">
					<div class="span2">
						<label class="inline">Celular 1</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
					<div class="span2">
						<label class="inline">Celular 2</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
					<div class="span4">
						<label class="inline">Correo Electronico Personal</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
					<div class="span4">
						<label class="inline">Correo Electronico Institucional</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-user"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
				</div>
				<div class="row-fluid" style="margin-top: 2%">
					<div class="span6">
						<label class="inline">Carrera Profesional</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-birrete"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
					<div class="span2">
						<label class="inline">Ciclo</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-birrete"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
					<div class="span3">
						<label class="inline">Cod. Universitario</label>
						<div class="input-prepend inline">
							<span class="add-on"><i class="icon-birrete"></i></span>
							<input  class="span10" disabled="disabled" name="txt_dni" size="16" type="text" placeholder="DNI">
						</div>
					</div>
				</div>
				
		</fieldset>		
<div class="modal-footer">
	<button type="submit" class="btn btn-success">Guardar</button>
	<button id="btn_cancelar_form_beneficiado"class="btn btn-danger">Cancelar</button>    	
</div> 
<link rel="stylesheet" href="<?php echo base_url("public/js/vendor/flexBox/css/jquery.flexbox.css")?>">
