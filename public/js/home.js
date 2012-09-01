$(document).on("ready", evento);
function evento (ev)
{
   var win_location=window.location+"";
   var id = win_location.match(/\/([^\/]+)[\/]?$/);   
   
   if(id["1"]!="")
   {	
   	var itemSeleccionado=id["1"];   	
   	console.log()
   	$('.active_sub_menu').removeClass('active_sub_menu');   	
   	$('a[data-id="'+itemSeleccionado+'"]').parent().addClass('active_sub_menu');
   }
   $(".item_menu_nav").click(function(){
	   
	   	location.reload(true);
	   
   });   

   $('input[name="boton_registrar_login"]').button();
   $('input[name="boton_recuperar_pass_login"]').button();
   $('#editar_button').tooltip({animation:true,placement:'right'});
   $(".collapse").collapse();
   $(".nav-header").click(function(){	
   		$('.nav-header-active').removeClass('nav-header-active');
   		$(this).addClass('nav-header-active');
   });
   
}
