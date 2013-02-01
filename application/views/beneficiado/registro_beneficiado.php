
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
		<div class="row-fluid fila_datos" id="mensaje_div">

		</div>
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
				<label class="etiqueta">Cod. Univ.</label>
				<input  class="span12" disabled="disabled" name="txt_cod_univ" size="16" type="text" >						
			</div>				  
		</div>
		<div class="row-fluid fila_datos" >
			<div class="span8">
				<label class="etiqueta">Carrera Prof.</label>
				<input type="hidden" id="sl_carrera_profesional">
			</div>
			<div class="span2">
				<label class="etiqueta">Ciclo</label>
				<input  class="span12" disabled="disabled" name="txt_ciclo" type="number" max="12" min="1" value="1" >						
			</div>
		</div>		
		<div class="buttons">				
				<div>
					<a role="button" data-toggle="modal" href="#myModal"  name="btn_guardar" class="btn btn-success">Guardar</a>
					<button type="reset" name="btn_cancelar1"class="btn btn-danger">Cancelar</button>
				</div>
		</div>
	</fieldset>	
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	    <h3 id="myModalLabel">Ventana de Confirmación</h3>
	  </div>
	  <div class="modal-body">
	    <p>¿Esta seguro de registrar al beneficiado?</p>
	  </div>
	  <div class="modal-footer">
	  	<div class="row-fluid fila_datos" >
		  	<div class="progress progress-striped span7">
			  <div class="bar"></div>
			</div>
			<div>
				<button type="submit" name="btn_confirmar" class="btn btn-primary">Guardar</button>
		    	<button type="button"name="btn_cancelar2"  class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			</div>		  					
	  	</div>	  	    
	  </div>
	</div>
	</form>		
</div>		
<script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootbox.min.js")?>"></script>
<script src="<?php echo base_url("public/js/vendor/flexBox/js/jquery.flexbox.js")?>"></script>
<script src="<?php echo base_url("public/js/vendor/datepicker/js/bootstrap-datepicker.js")?>"></script>
<script src="<?php echo base_url("public/js/vendor/select2/select2.min.js")?>"></script>
<script src="<?php echo base_url("public/js/beneficiado/registro_beneficiado.js")?>"></script>