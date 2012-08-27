$(document).on("ready", evento);
function evento (ev)
{
   $('input[name="boton_registrar_login"]').button();
   $('input[name="boton_recuperar_pass_login"]').button();
   $('#editar_button').tooltip({animation:true,placement:'right'});
   $(".collapse").collapse();
   $(".nav-header").click(function(){	
   		$('.nav-header-active').removeClass('nav-header-active');
   		$(this).addClass('nav-header-active');
   });
   
}
