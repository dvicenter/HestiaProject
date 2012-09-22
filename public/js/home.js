$(document).on("ready", evento);
function evento (ev)
{
	
	// arreglo de ciclos
	var ciclos=['I','II','III','IV','V','VI','VII','VIII','IX','X']
   /**
    *  Script del Nav
    */
   var server="http://localhost:81/HestiaProject/";
   var win_location=window.location+"";
   var id = win_location.match(/\/([^\/]+)[\/]?$/);   
   
   if(id["1"]!="")
   {	
   	var itemSeleccionado=id["1"];
   	$('.active_sub_menu').removeClass('active_sub_menu');   	
   	$('a[data-id="'+itemSeleccionado.toLowerCase()+'"]').parent().addClass('active_sub_menu');
   }
   $(".item_menu_nav").click(function(){
	   
	   	location.reload(true);
	   
   });   

   $('input[name="boton_registrar_login"]').button();
   $('input[name="boton_recuperar_pass_login"]').button();
   $('.link_dato_usuario').tooltip({animation:true,placement:'bottom'});
   $(".collapse").collapse();
   $(".nav-header").click(function(){	
   		$('.nav-header-active').removeClass('nav-header-active');
   		$(this).addClass('nav-header-active');
   });
   /**
    * Fin Script Nav 
    */
   
   /**
    *Script de marcado de asistencia 
    */
    var nombreMeses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre']; 
   	var currentTime = new Date();
	var month = currentTime.getMonth();
	var day = currentTime.getDate();
	var year = currentTime.getFullYear();	
    $("#marcado_asistencia_fecha").text("Huacho,"+day+" de "+nombreMeses[month]+" del "+year);
   
   // Actualizar Reloj   
	actualizarReloj();
    setInterval('actualizarReloj()', 1000 );   
    
    /**
     *Evento  de submit para marcado de asistencia 
     */
    $('#marcado_asistencia_form').submit(function(e) {
       
	   $.ajax({
			  url: $(this).attr('action'),
			  type: "POST",
			  data: $(this).serialize(),
			  dataType: "json",
			  success:function(data){
			  	$("p[name='mensaje']").text(data.mensaje);
			  	$("#codigo_consultar").val("");
			  	if(data.idError==0 || data.idError==2)
			  	{
			  		if(data.idError==2)
			  		{
			  			$("#imagen_mensaje").attr("src",server+"public/img/error_64x64.png");
			  			$("p[name='mensaje']").css("color","#BE4730");
			  		}
			  		else
			  		{
			  			$("#imagen_mensaje").attr("src",server+"public/img/check_64x64.png");
			  			$("p[name='mensaje']").css("color","#51A351");
			  		}
			  		$("p[name='dni']").text(data.dni);				  	
				  	$("p[name='tipo_atendido']").text(data.tipoAtendido);
				  	$("p[name='nombres_atendido']").text(data.nombresCompletos);
				  	$("p[name='carrera_atendido']").text(data.carreraProfesional+"-"+ciclos[data.numCiclo-1]);	
			  	}
			  	else{
			  		if(data.idError==1)
				  	{
				  		$("#imagen_mensaje").attr("src",server+"public/img/error_64x64.png");
			  			$("p[name='mensaje']").css("color","#BE4730");
				  		$("p[name='dni']").text("");				  	
					  	$("p[name='tipo_atendido']").text("");
					  	$("p[name='nombres_atendido']").text("");
					  	$("p[name='carrera_atendido']").text("");	
				  	}
			  	}
			  	
			  }
			  
			}).done(function(data){ 
				console.log("Query Marcado de Asistencia hecha");
			});	 
			return false; 
	});
	/**
	 *Fin script Marcado Asistencia 
	 */
	$('.tabla_registro_beneficiado').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla"></table>' );
	$('#tabla').dataTable( {
		 "sDom": '<"toolbar">frtip',
		"oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ records por página",
            "sZeroRecords": "No hay registros",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 de 0 of 0 registros"
       },
		"bJQueryUI": true,
        "sPaginationType": "full_numbers",
		 "aaData": [
            /* Reduced data set */
            [ "Trident", "Internet Explorer 4.0", "Win 95+", 4, "X" ],
            [ "Trident", "Internet Explorer 5.0", "Win 95+", 5, "C" ],
            [ "Trident", "Internet Explorer 5.5", "Win 95+", 5.5, "A" ],
            [ "Trident", "Internet Explorer 6.0", "Win 98+", 6, "A" ],
            [ "Trident", "Internet Explorer 7.0", "Win XP SP2+", 7, "A" ],
            [ "Gecko", "Firefox 1.5", "Win 98+ / OSX.2+", 1.8, "A" ],
            [ "Gecko", "Firefox 2", "Win 98+ / OSX.2+", 1.8, "A" ],
            [ "Gecko", "Firefox 3", "Win 2k+ / OSX.3+", 1.9, "A" ],
            [ "Webkit", "Safari 1.2", "OSX.3", 125.5, "A" ],
            [ "Webkit", "Safari 1.3", "OSX.3", 312.8, "A" ],
            [ "Webkit", "Safari 2.0", "OSX.4+", 419.3, "A" ],
            [ "Webkit", "Safari 3.0", "OSX.4+", 522.1, "A" ]
        ],
        "aoColumns": [
            { "sTitle": "Engine" },
            { "sTitle": "Browser" },
            { "sTitle": "Platform" },
            { "sTitle": "Version", "sClass": "center" },
            {
                "sTitle": "Grade",
                "sClass": "center",
                "fnRender": function(obj) {
                    var sReturn = obj.aData[ obj.iDataColumn ];
                    if ( sReturn == "A" ) {
                        sReturn = "<b>A</b>";
                    }
                    return sReturn;
                }
            }
        ]
    });
    
}
 function actualizarReloj(){
 		var currentTime = new Date();
    	var currentHours = currentTime.getHours ( );
	    var currentMinutes = currentTime.getMinutes ( );
	    var currentSeconds = currentTime.getSeconds ( );
	    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
	    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
	    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
	   	$("#marcado_asistencia_hora").text(currentTimeString);   
    }