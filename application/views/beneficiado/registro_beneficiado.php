<div class="panel_trabajo">	
	
	
	<div class="busqueda_registro_beneficiado">
	
			<fieldset>
			<legend>Búsqueda</legend>			
			<div class="input-append busqueda_caja">
			 	<label class="radio inline"> 
			  	<input type="radio" name="tipo_consulta"value="">DNI
				</label>
			 	<label class="radio inline"> 
			  		<input type="radio" value="">Apellidos y Nombres
				</label>
			  	<input class="span2" id="txt_consulta_beneficiado" size="100" type="text">
			  	<button class="btn" name="tipo_consulta" type="input">Buscar</button>						 
			</div>  
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
		 <button class="btn btn-small" type="button"> <i class="icon-plus icon-black"></i>Nuevo Registro</button>
		 <button class="btn btn-small" type="button"> <i class="icon-edit icon-black"></i>Editar Registro</button>
		 <button class="btn btn-small" type="button"> <i class="icon-minus-sign icon-black"></i>Deshabilitar Registro</button>
	</div>	
	<div class="tabla_registro_beneficiado">
	</div>	
</div>
 <script src="<?php echo base_url("public/js/vendor/datatable/js/jquery.dataTables.min.js")?>"></script>
 <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/datatable/css/jquery.dataTables.css")?>">
 <link rel="stylesheet" href="<?php echo base_url("public/css/jquery/jquery-ui-1.8.4.custom.css")?>">
 <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/datatable/css/jquery.dataTables_themeroller.css")?>">
 <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/datatable/css/demo_table.css")?>">
 