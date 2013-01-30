$(document).on("ready", readyConsultaBeneficiado);

function readyConsultaBeneficiado(){
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
            { "sTitle": "Ciclo" , "mDataProp":'NumCiclo',"sWidth":"50px"},
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
        window.location = server+"index.php/beneficiado/gestion_beneficiado/registroBeneficiado"      
      });
}