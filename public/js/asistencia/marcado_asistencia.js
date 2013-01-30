$(document).on("ready", readyMarcadoAsistencia);
var oTable
var server="http://localhost:81/HestiaProject/";
function readyMarcadoAsistencia (ev)
{
  /**
   Script Asistencia
   **/
    var nombreMeses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre']; 
    var currentTime = new Date();
  var month = currentTime.getMonth();
  var day = currentTime.getDate();
  var year = currentTime.getFullYear(); 
    $("#marcado_asistencia_fecha").text("Huacho,"+day+" de "+nombreMeses[month]+" del "+year);
   
   // Actualizar Reloj   
  actualizarReloj();
    setInterval('actualizarReloj()', 1000 );   
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

}