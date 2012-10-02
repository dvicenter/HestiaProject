$(document).on("ready", evento);
var oTable;
	

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
   
   var offset = 10;

        // Our scroll target : the top position of the
        // section that has the id referenced by our href.
        var target = $("#mod_panel").offset().top - offset;
		console.log(target);
        // The magic...smooth scrollin' goodness.
        $('html, body').animate({scrollTop:target}, 500);
	   
   
   
   if(id["1"]!="")
   {	
   	var itemSeleccionado=id["1"];
   	$('.active_sub_menu').removeClass('active_sub_menu');   	
   	$('a[data-id="'+itemSeleccionado.toLowerCase()+'"]').parent().addClass('active_sub_menu');
   }
   $(".item_menu_nav").click(function(){
	   
	   	location.reload(true);

        // An offset to push the content down from the top.
        
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
	oTable=$('#tabla').dataTable( {
		"bFilter": false,
        "bSort": false,
        "bLengthChange": false,		
		"oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ records por página",
            "sZeroRecords": "No hay registros",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sProcessing":"Procesando",
            "oPaginate": {
            	'sNext':"Siguiente",
            	'sFirst':"Primero",
            	'sLast':"Último",
            	'sPrevious':"Atrás"
            }
       },
		"bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "aoColumns": [
            { "sTitle": "DNI", "mDataProp":'DNI' },
            { "sTitle": "Apellidos y Nombres", "mDataProp":'NombresCompletos' },
            { "sTitle": "Escuela" , "mDataProp":'NombreCarreraProfesional'},
            { "sTitle": "Ciclo" , "mDataProp":'NumCiclo'},
            { "sTitle": "Estado" , "mDataProp":'CondicionFinal'}
         ],
        "bProcessing": true,
		"bServerSide": true,
		"iDisplayLength": 15,
		"sAjaxSource": server+"index.php/beneficiado/gestion_beneficiado/consultarBeneficiado",
		"fnServerData": function ( sSource, aoData, fnCallback ) {
			aoData.push(
				  {
				   'name':"txt_consulta_beneficiado",
				   'value':$("input[name='txt_consulta_beneficiado']").val()
				  });
			aoData.push(
				   {
				 	'name':"rbt_tipo_consulta",
				 	'value':$("input:radio[name='rbt_tipo_consulta']:checked").val()
				  });
			$.getJSON( sSource, aoData, function (json) { 
				fnCallback(json);
				
			} );
    	}
    });
    $("#tabla tbody tr").click( function( e ) {
        if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
        }
        else {
            oTable.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
    });
    $("#consultar_beneficiado").submit(function(e){
    	
		oTable.fnDraw();
		return false;
    });
    
    $("#form_beneficiado").on("show", function() {    // wire up the OK button to dismiss the modal when shown
	    $("#btn_cancelar_form_beneficiado").on("click", function(e) {
	        $("#form_beneficiado").modal('hide');     // dismiss the dialog
	    });
	});
	
	$("#form_beneficiado").on("hide", function() {    // remove the event listeners when the dialog is dismissed
	    $("#btn_cancelar_form_beneficiado").off("click");
	});

    
    $("#btn_agregar_beneficiado").click(function(){
    	$("#form_beneficiado").modal("show");
    });
  	$("#form_beneficiado").modal({
  	"backdrop"  : "static",
  	"keyboard"  : true,
  	"show"      : false 
	});
	$('#ffb2').flexbox(server+"index.php/beneficiado/gestion_beneficiado/consultarBeneficiadoFiltro",{
		 showResults: true,  
		 watermark: 'Ingrese los datos',
		 displayValue:"NombresCompletos",
		 hiddenValue:"DNI",
		 width:300,
		 resultTemplate:'{NombresCompletos}',
		 showArrow:false,
		 paging: {  
        	pageSize: 5  
    	}   
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