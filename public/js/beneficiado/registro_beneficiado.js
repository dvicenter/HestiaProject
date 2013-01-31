$(document).on("ready", readyRegistroBeneficiado);
function readyRegistroBeneficiado(){
		    var listaCarreraProfesional;
          $("#dp3").datepicker({
          	language:"es",
          	todayHighlight:"true",
          	autoclose:true,
          }).on('changeDate', function(ev){
			   
			    });

          
          $("input[name='txt_fec_nacimiento']").attr("disabled",true);
          $.getJSON(server+"index.php/persona/gestion_persona/listarCarreraProfesional",function(listCarreraProfesional){
            listaCarreraProfesional=listCarreraProfesional;
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
            jQuery.each(listaCarreraProfesional,function(i,val){   
                jQuery.each(val.children,function(a,value){   
                  if(value.IdCarreraProfesional==data_values["IdCarreraProfesional"]){
                  $("#sl_carrera_profesional").select2("data", value);
                   return false;
                 }
                });              
            });           
            $("input[name='txt_ciclo']").val(data_values["NumCiclo"]);
            $("input[name='txt_cod_univ']").val(data_values["CodigoUniversitario"]);
            $("button[name='btn_actualizar']").attr("disabled",false);

           },      
           paging: {  
                pageSize: 5,
                summaryTemplate: 'Mostrando {start}-{end} de {total} resultados'   
            }});			
      $(".form form").on("submit",guardarBeneficiado);
	 		$("button[name='btn_nuevo']").on("click",nuevoRegistro);
	 		$("button[name='btn_actualizar']").on("click",actualizarRegistro);
	 		$("button[name='btn_cancelar1']").on("click",cancelarRegistro);
      $("a[name='btn_guardar']").on("click",verificar);
			$("#txt_busqueda_persona_input").focus();
			$("#txt_busqueda_persona_input").trigger('click');
	});	

  function verificar(){
     $("button[name='btn_confirmar']").attr("disabled",false);
     $("button[name='btn_cancelar2']").attr("disabled",false);
     $(".bar").css({width:"0%"});
  }
  function guardarBeneficiado(){
    $("button[name='btn_confirmar']").attr("disabled",true);
    $("button[name='btn_cancelar2']").attr("disabled",true);

    var data_values=jQuery.parseJSON($("#txt_busqueda_persona_hidden")[0].getAttribute("data-values"));
    var IdCarreraProfesional=$("#sl_carrera_profesional").select2("val");
    var idPersona=data_values["IdPersona"];
    $(".bar").animate({width:"20%"},500,function(){
       $.post(server+"index.php/beneficiado/gestion_beneficiado/registrarBeneficiado",{
      "IdPersona":idPersona,
      "DNI":$("input[name='txt_dni']").val(),
      "CodigoUniversitario":$("input[name='txt_cod_univ']").val(),
      "IdCarreraProfesional":IdCarreraProfesional,
      "NumCiclo":$("input[name='txt_ciclo']").val(),
      "ApellidoPaterno":$("input[name='txt_apellido_paterno']").val(),
      "ApellidoMaterno":$("input[name='txt_apellido_materno']").val(),
      "Nombres":$("input[name='txt_nombres_completos']").val(),
      "Sexo":$("input[name='rbt_sexo']").val(),
      "FechaNacimiento":$("input[name='txt_fec_nacimiento']").val(),
      "CiudadProcedencia":$("input[name='txt_ciudad_procedencia']").val(),
      "TelefonoFijo":$("input[name='txt_telefono_fijo']").val(),
      "Celular1":$("input[name='txt_celular1']").val(),
      "Celular2":$("input[name='txt_celular2']").val(),
      "CorreoElectronicoPersonal":$("input[name='txt_correo_personal']").val(),
      "CorreoElectronicoInstitucional":$("input[name='txt_correo_institucional']").val()
    },function(data){
       $(".bar").animate({"width":"100%"},500,function(){
        if(data.tipoMensaje=="E"){
          $("#mensaje").html("");
          $("#mensaje").removeClass();
          $("#mensaje").addClass("alert");
          $("#mensaje").addClass("alert-error");
          $("#mensaje").append("<p>"+data.mensaje+" "+$("input[name='txt_apellido_paterno']").val()+" "+$("input[name='txt_apellido_materno']").val()+" "+$("input[name='txt_nombres_completos']").val()+"</p>");
        }
        else{
           $("#mensaje").html("");
          $("#mensaje").removeClass();
          $("#mensaje").addClass("alert");
          $("#mensaje").addClass("alert-success");
          $("#mensaje").append("<p>"+data.mensaje+" "+$("input[name='txt_apellido_paterno']").val()+" "+$("input[name='txt_apellido_materno']").val()+" "+$("input[name='txt_nombres_completos']").val()+" ha sido exitoso</p>");
        }
        $('#myModal').modal('hide')
       });        
      });
    });     
    return false;
  }
	function actualizarRegistro(){
		$("#txt_busqueda_persona_input").attr("disabled",true);
		deshabilitarForm("enable",false);
		$("button[name='btn_nuevo']").attr("disabled",true);
		$("button[name='btn_actualizar']").attr("disabled",true);
		$("input[name='txt_apellido_paterno']").focus();
    
	}	
	function nuevoRegistro(){
		deshabilitarForm("enable",false);
		limpiarForm();
		$("button[name='btn_nuevo']").attr("disabled",true);
		$("input[name='txt_apellido_paterno']").focus();
		$("button[name='btn_actualizar']").attr("disabled",true);
		$("#txt_busqueda_persona_input").attr("disabled",true);

	}
	function cancelarRegistro(){
		limpiarForm();
		deshabilitarForm("disable",true);		
		$("button[name='btn_nuevo']").attr("disabled",false);
		$("button[name='btn_actualizar']").attr("disabled",true);
		$("#txt_busqueda_persona_input").attr("disabled",false);

		$("#txt_busqueda_persona_input").focus();
	}

	function deshabilitarForm(tag,value){
       $("button[name='btn_confirmar']").attr("disabled",value);
    $("button[name='btn_cancelar2']").attr("disabled",value);
    $("button[name='btn_confirmar']").attr("disabled",value);
    $("button[name='btn_cancelar2']").attr("disabled",value);
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
        $("#sl_carrera_profesional").select2("data", "");
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
  