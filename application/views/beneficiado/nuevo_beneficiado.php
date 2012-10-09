
		<fieldset>
			<legend>Registrar a Beneficiado</legend>
			 	<label class="radio inline"> 
			  		<input type="radio" name="rbt_tipo_consulta" value="1" >DNI
				</label>
			 	<label class="radio inline"> 
			  		<input type="radio" name="rbt_tipo_consulta" value="2" checked="true">Apellidos y Nombres
				</label>
				<div id="ffb2"></div>	
				<button class="btn btn-primary">Nuevo</button>
				
				<div class="input-prepend">
				<div class="div_form_beneficiado">
					<div class="inline_div_form_beneficiado">
						<label>Apellido Paterno</label>
						<div class="block_div_form_beneficiado">
  							<span class="add-on"><i class="icon-user"></i></span><input class="span2" disabled="disabled" id="prependedInput" size="16" type="text" placeholder="Apellido Paterno">
  						</div>
  					</div>
  					<div style="margin-left: 5px" class="inline_div_form_beneficiado">
  						<label>Apellido Materno</label>
  						<div class="block_div_form_beneficiado">
  							<span class="add-on"><i class="icon-user"></i></span><input class="span2"  disabled="disabled" id="prependedInput" size="16" type="text" placeholder="Apellido Paterno">
  						</div>
  					</div>
  				</div>
  				<div class="div_form_beneficiado">
					<label>Nombres Completos</label>
					<div class="cien_div_form_beneficiado">
						<span class="add-on"><i class="icon-user"></i></span><input class="span2" disabled="disabled" id="prependedInput" size="16" type="text" placeholder="Apellido Paterno">
					</div>
				</div>
				<div class="div_form_beneficiado">
					<div class="inline_div_form_beneficiado_3">
  						<label>Sexo</label>
  						<label class="radio inline"> 
					  	<input type="radio" name="rbt_sexo" value="M" disabled="disabled"  checked="true">MASCULINO
						</label>
					 	<label class="radio inline"> 
					  		<input type="radio" name="rbt_sexo" value="F" disabled="disabled"  checked="true">FEMENINO
						</label>
  					</div>
  					<div style="margin-left: 5px" class="inline_div_form_beneficiado_3">
  						<label>DNI</label>
  						<div class="block_div_form_beneficiado">
  							<span class="add-on"><i class="icon-user"></i></span><input class="span2" id="prependedInput" disabled="disabled"  size="16" type="number" placeholder="DNI">
  						</div>
  					</div>  					
  					<div style="margin-left: 6%" class="inline_div_form_beneficiado_3">
  						<label>Código Universitario</label>
  						<div class="block_div_form_beneficiado">
  							<span class="add-on"><i class="icon-birrete"></i></span><input class="span2" id="prependedInput" disabled="disabled"  size="16" type="number" placeholder="Codigo Universitario">
  						</div>
  					</div>
				</div>
				<div class="div_form_beneficiado">
					<div class="inline_div_form_beneficiado" style="width:60%">
						<label>Carrera Profesional</label>
						<div class="cien_div_form_beneficiado">
							<span class="add-on"><i class="icon-birrete"></i></span><input data-provide="typeahead" class="span2" disabled="disabled"  id="prependedInput" size="16" type="text" placeholder="Carrera Profesional">
						</div>
					</div>
					<div style="margin-left: 7%;width:30%" class="inline_div_form_beneficiado">
  						<label>Ciclo</label>
  						<div class="block_div_form_beneficiado">
  							<span class="add-on"><i class="icon-birrete"></i></span><input class="span2" id="prependedInput" disabled="disabled"  size="16" type="number" placeholder="Ciclo">
  						</div>
  					</div>
				</div>
		</fieldset>			  	
    </div>
    <div class="modal-footer">
    	<button type="submit" class="btn btn-success">Guardar</button>
    	<button id="btn_cancelar_form_beneficiado"class="btn btn-danger">Cancelar</button>    	
    </div> 
  <link rel="stylesheet" href="<?php echo base_url("public/js/vendor/flexBox/css/jquery.flexbox.css")?>">
