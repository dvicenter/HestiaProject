$(document).on("ready", readyRegistroBeneficiado);

function readyRegistroBeneficiado(){
		  
          $("#dp3").datepicker({
          	language:"es",
          	todayHighlight:"true",
          	autoclose:true,
          }).on('changeDate', function(ev){
			   
			    });
          $("input[name='txt_fec_nacimiento']").attr("disabled",true);
          $.getJSON(server+"index.php/persona/gestion_persona/listarCarreraProfesional",function(listCarreraProfesional){
          $("#sl_carrera_profesional").select2({

            id:"IdCarreraProfesional",
            data:{results:listCarreraProfesional,text:"NombreCarreraProfesional"},
            placeholder: "Seleccione una Carrera Profesional",
            width:"100%",
            formatSelection:function(item){
                if (!item.IdCarreraProfesional) {
                  return item.NombreFacultad; 
                 }
                 return item.NombreCarreraProfesional; 
            },
            formatResult:function(item){
                 if (!item.IdCarreraProfesional) {
                  return item.text; 
                 }
                 return item.NombreCarreraProfesional; 
            }

          });
          $("#sl_carrera_profesional").select2("disable");
          $('#txt_busqueda_persona').flexbox(server+"index.php/persona/gestion_persona/consultarPersonaFiltro",{
             showResults: true,  
             watermark: 'Ingrese los datos a consultar',
             displayValue:"NombresCompletos",
             hiddenValue:"IdPersona",
             width:400,
            resultTemplate:'{NombresCompletos}',
            showArrow:false,
            onSelect: function() { 
            var data_values=jQuery.parseJSON($("#txt_busqueda_persona_hidden")[0].getAttribute("data-values"));
            $("input[name='txt_apellido_paterno']").val(data_values["ApellidoPaterno"]);
            $("input[name='txt_apellido_materno']").val(data_values["ApellidoMaterno"]);
            $("input[name='txt_nombres_completos']").val(data_values["Nombres"]);
            $("input[name='txt_dni']").val(data_values["DNI"]);           
            if(data_values["Sexo"]=='M'){
              $("input[name='rbt_sexo'][value='M']").attr('checked',true);              
            }else{
              $("input[name='rbt_sexo'][value='F']").attr('checked',true);
            }
            $("input[name='txt_fec_nacimiento']").val(data_values["FechaNacimiento"]);
            $("input[name='txt_ciudad_procedencia']").val(data_values["CiudadProcedencia"]);  
            $("input[name='txt_telefono_fijo']").val(data_values["TelefonoFijo"]);  
            $("input[name='txt_celular1']").val(data_values["Celular1"]);
            $("input[name='txt_celular2']").val(data_values["Celular2"]);
            $("input[name='txt_correo_personal']").val(data_values["CorreoElectronicoPersonal"]);
            $("input[name='txt_correo_institucional']").val(data_values["CorreoElectronicoInstitucional"]);
            $("input[name='txt_carrera_profesional']").val(data_values["CarreraProfesional"]);
            $("input[name='txt_ciclo']").val(data_values["NumCiclo"]);
            $("input[name='txt_cod_univ']").val(data_values["CodigoUniversitario"]);
            $("button[name='btn_actualizar']").attr("disabled",false);

           },      
           paging: {  
                pageSize: 5,
                summaryTemplate: 'Mostrando {start}-{end} de {total} resultados'   
            }});			
	 		$("button[name='btn_nuevo']").on("click",nuevoRegistro);
	 		$("button[name='btn_actualizar']").on("click",actualizarRegistro);
	 		$("button[name='btn_cancelar']").on("click",cancelarRegistro);
			$("#txt_busqueda_persona_input").focus();
			$("#txt_busqueda_persona_input").trigger('click');
	});	
	function actualizarRegistro(){
		$("#txt_busqueda_persona_input").attr("disabled",true);
		deshabilitarForm("enable",false);
		$("button[name='btn_nuevo']").attr("disabled",true);
		$("button[name='btn_actualizar']").attr("disabled",true);
		$("input[name='txt_apellido_paterno']").focus();
    showButtons(true);
	}	
	function nuevoRegistro(){
		deshabilitarForm("enable",false);
		limpiarForm();
		$("button[name='btn_nuevo']").attr("disabled",true);
		$("input[name='txt_apellido_paterno']").focus();
		$("button[name='btn_actualizar']").attr("disabled",true);
		$("#txt_busqueda_persona_input").attr("disabled",true);
		showButtons(true);
	}
	function cancelarRegistro(){
		limpiarForm();
		deshabilitarForm("disable",true);		
		$("button[name='btn_nuevo']").attr("disabled",false);
		$("button[name='btn_actualizar']").attr("disabled",true);
		$("#txt_busqueda_persona_input").attr("disabled",false);
		showButtons(false);
		$("#txt_busqueda_persona_input").focus();
	}
	function showButtons(value){
		var heightButton=$(".buttons").height();
		var heightForm=$(".form").height();
		var top=0;
		var offset = $("#header").height;
		 var target = $("#mod_panel").offset().top;
        $('html, body').animate({scrollTop:target}, 1000);
        var newHeight=0;
        if(value){
        newHeight=heightButton+heightForm;	
        }
        else{
        	newHeight=heightForm-heightButton;	
        }
        
		$(".form").animate({height:newHeight},1000);
	}
	function deshabilitarForm(tag,value){
			$("input[name='txt_apellido_paterno']").attr("disabled",value);
	    	$("input[name='txt_apellido_materno']").attr("disabled",value);
	    	$("input[name='txt_nombres_completos']").attr("disabled",value);	  
        $("input[name='rbt_sexo'][value='F']").attr("disabled",value);        
        $("input[name='rbt_sexo'][value='M']").attr("disabled",value);
	    	$("input[name='txt_dni']").attr("disabled",value);
	    	$("input[name='btn_nuevo']").attr("disabled",value);
	    	$("input[name='txt_cod_univ']").attr("disabled",value);
	    	$("input[name='txt_carr_prof']").attr("disabled",value);
	    	$("input[name='txt_ciclo']").attr("disabled",value);
        $("input[name='txt_fec_nacimiento']").attr("disabled",value);
        $("input[name='txt_ciudad_procedencia']").attr("disabled",value);
        $("input[name='txt_telefono_fijo']").attr("disabled",value);
        $("input[name='txt_celular1']").attr("disabled",value);
        $("input[name='txt_celular2']").attr("disabled",value);
        $("input[name='txt_correo_personal']").attr("disabled",value);
        $("input[name='txt_correo_institucional']").attr("disabled",value);
    		$("#sl_carrera_profesional").select2(tag);
	}
	function limpiarForm(){
        $("#txt_busqueda_persona_input").attr("value","");
        $("input[name='txt_apellido_paterno']").attr("value","");
        $("input[name='txt_apellido_materno']").attr("value","");
        $("input[name='txt_nombres_completos']").attr("value","");
        $("input[name='txt_dni']").attr("value","");
        $("input[name='txt_cod_univ']").attr("value","");
        $("input[name='txt_carr_prof']").attr("value","");
        $("input[name='txt_ciclo']").attr("value","");
        $("input[name='txt_fec_nacimiento']").attr("value","");
        $("input[name='txt_ciudad_procedencia']").attr("value","");
        $("input[name='txt_telefono_fijo']").attr("value","");
        $("input[name='txt_celular1']").attr("value","");
        $("input[name='txt_celular2']").attr("value","");
        $("input[name='txt_correo_personal']").attr("value","");
        $("input[name='txt_correo_institucional']").attr("value","");                
        $("input[name='rbt_sexo'][value='F']").attr('checked',false);
        $("input[name='rbt_sexo'][value='M']").attr('checked',false);
	}
}
  