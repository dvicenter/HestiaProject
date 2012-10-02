<div class="panel_trabajo">	
	<div class="busqueda_registro_beneficiado">
	
			<fieldset>
			<legend>Búsqueda</legend>	
			<form id="consultar_beneficiado" action="<?php echo base_url("index.php/beneficiado/gestion_beneficiado/consultarBeneficiado")?>" method="post" style="display: inline">	
				<div class="input-append busqueda_caja">
				 	<label class="radio inline"> 
				  		<input type="radio" name="rbt_tipo_consulta" value="1" >DNI
					</label>
				 	<label class="radio inline"> 
				  		<input type="radio" name="rbt_tipo_consulta" value="2" checked="true">Apellidos y Nombres
					</label>
				  	<input class="span2" autofocus="true" id="txt_consulta_beneficiado" name="txt_consulta_beneficiado" size="100" type="text">
				  	<button class="btn" name="btn_opcion_export" type="input">Buscar</button>						 
				</div>  
			</form>	
			<div class="btn-group boton_exportar busqueda_caja">
			  <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
			    <i class="icon-print icon-white"></i>Exportar	
			    <span class="caret"></span>
			  </a>
			  <ul style="top:initial" class="dropdown-menu">
			    <li><a>PDF</a></li>
			    <li><a>Excel</a></li>
			  </ul>
			</div>	
			
		  	</fieldset>
	</div>
	<div class="menu_registro_beneficiado">		
		 <button id="btn_agregar_beneficiado" class="btn btn-small" type="button"> <i class="icon-plus icon-black"></i>Nuevo Registro</button>
		 <button class="btn btn-small" type="button"> <i class="icon-edit icon-black"></i>Editar Registro</button>
		 <button class="btn btn-small" type="button"> <i class="icon-minus-sign icon-black"></i>Deshabilitar Registro</button>
	</div>	
	<div class="tabla_registro_beneficiado">
	</div>	
	<div id="form_beneficiado" class="modal hide fade">
    <!-- dialog contents -->
    <div  class="modal-body">		
		<fieldset>
			<legend>Registrar a Beneficiado</legend>
			 	<label class="radio inline"> 
			  		<input type="radio" name="rbt_tipo_consulta" value="1" >DNI
				</label>
			 	<label class="radio inline"> 
			  		<input type="radio" name="rbt_tipo_consulta" value="2" checked="true">Apellidos y Nombres
				</label>
				<div id="ffb2"></div>	
				<div class="input-prepend">
				<div class="div_form_beneficiado">
					<div class="inline_div_form_beneficiado">
						<label>Apellido Paterno</label>
						<div class="block_div_form_beneficiado">
  							<span class="add-on"><i class="icon-user"></i></span><input class="span2" id="prependedInput" size="16" type="text" placeholder="Apellido Paterno">
  						</div>
  					</div>
  					<div style="margin-left: 5px" class="inline_div_form_beneficiado">
  						<label>Apellido Materno</label>
  						<div class="block_div_form_beneficiado">
  							<span class="add-on"><i class="icon-user"></i></span><input class="span2" id="prependedInput" size="16" type="text" placeholder="Apellido Paterno">
  						</div>
  					</div>
  				</div>
  				<div class="div_form_beneficiado">
					<label>Nombres Completos</label>
					<div class="cien_div_form_beneficiado">
						<span class="add-on"><i class="icon-user"></i></span><input class="span2" id="prependedInput" size="16" type="text" placeholder="Apellido Paterno">
					</div>
				</div>
				<div class="div_form_beneficiado">
					<label>Carrera Profesional</label>
					<div class="cien_div_form_beneficiado">
						<span class="add-on"><i class="icon-user"></i></span><input class="span2" id="prependedInput" size="16" type="text" placeholder="Apellido Paterno">
					</div>
				</div>
		</fieldset>			  	
    </div>
    <!-- dialog buttons -->
    <div class="modal-footer">
    	<button type="submit" class="btn btn-success">Guardar</button>
    	<button id="btn_cancelar_form_beneficiado"class="btn btn-danger">Cancelar</button>    	
    </div>
</div>
</div>
 <script src="<?php echo base_url("public/js/vendor/datatable/js/jquery.dataTables.js")?>"></script> 
 <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootstrap-modal.js")?>"></script>
 <script src="<?php echo base_url("public/js/vendor/bootstrap/js/bootbox.min.js")?>"></script>
 <script src="<?php echo base_url("public/js/vendor/flexBox/js/jquery.flexbox.js")?>"></script>
 <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/flexBox/css/jquery.flexbox.css")?>">
 <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/datatable/css/jquery.dataTables.css")?>">
 <link rel="stylesheet" href="<?php echo base_url("public/css/jquery/jquery-ui-1.8.23.custom.css")?>">
 <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/datatable/css/jquery.dataTables_themeroller.css")?>">
 <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/datatable/css/demo_table.css")?>">
 