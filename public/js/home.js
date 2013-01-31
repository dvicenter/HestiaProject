$(document).on("ready", readyHome);
var oTable
var server="http://localhost:81/HestiaProject/";
function readyHome (ev)
{	
	$.ajaxSetup({
  	cache: false
	});

	// arreglo de ciclos
	var ciclos=['I','II','III','IV','V','VI','VII','VIII','IX','X']
   /**
    *  Script del Nav
    */
   var win_location=window.location+"";
   var id = win_location.match(/\/([^\/]+)[\/]?$/);   
   
        var target = $("#mod_panel").offset().top;
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
    