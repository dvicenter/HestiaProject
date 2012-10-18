<?php
class Login_model extends CI_Model {
 
 
    function __construct()
    {
        parent::__construct();
    }    
  	function verificarCredenciales($usuario,$password)
    {    
	     	$this->db->select('Password,NombreUsuario,IdPersona,IdCentroAtencion,IdUsuario');
			$this->db->where('NombreUsuario',$usuario);
			$sql = $this->db->get('usuario');
			$data = $sql->result();
			if($data[0]->Password==$password){
			$this->session->set_userdata('IdUsuario',$data[0]->IdUsuario);
			$this->session->set_userdata('Validado',"true");
			$this->session->set_userdata('NombreUsuario',$data[0]->NombreUsuario);
			$this->session->set_userdata('IdPersona',$data[0]->IdPersona);
			$this->session->set_userdata('IdCentroAtencion',$data[0]->IdCentroAtencion);
			// Consulta de datos de persona
		  	$this->db->select('ApellidoPaterno,ApellidoMaterno,Nombres');
			$this->db->where('IdPersona',$data[0]->IdPersona);
			$sqlPersona = $this->db->get('persona');
			$dataPersona= $sqlPersona->result();
			$this->session->set_userdata('Persona',$dataPersona[0]->ApellidoPaterno." ".$dataPersona[0]->ApellidoMaterno);
				
			//Fin de consulta
			// Consulta de datos de sucursal
		  	$this->db->select('NombreCentroAtencion');
			$this->db->where('IdCentroAtencion',$data[0]->IdCentroAtencion);
			$sqlCentroAtencion = $this->db->get('centro_atencion');
			$dataCentroAtencion= $sqlCentroAtencion->result();
			$this->session->set_userdata('CentroAtencion',$dataCentroAtencion[0]->NombreCentroAtencion);			
			//Fin de consulta sucursal
			return true;
		}
		return false;
    }

}
?>