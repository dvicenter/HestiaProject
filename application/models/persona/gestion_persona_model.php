<?php
class Gestion_persona_model extends CI_Model { 
 
    function __construct()
    {
        parent::__construct();
    }
    
    function consultarPersonaPorFiltro($parametro,$tipo,$inicio,$tamanio)
    {

	    	$this->db->select(
	    	'IdPersona,
	    	ApellidoPaterno,
	    	ApellidoMaterno,
	    	Nombres,
	    	Sexo,
	    	DNI,
	    	CodigoUniversitario,
	    	FechaNacimiento,
	    	CiudadProcedencia,
	    	TelefonoFijo,
	    	Celular1,
	    	Celular2,
	    	CorreoElectronicoPersonal,
	    	CorreoElectronicoInstitucional,
	    	NumCiclo,
	    	IdCarreraProfesional'
			);				
	    	$this->db->from('Persona');
			
		
			$this->db->limit($tamanio,$inicio);
    		if($tipo==1)
			{
    		$this->db->like('DNI',$parametro,'after');
			}
			else 
			{
			$this->db->like('NombresCompletos', $parametro,'after');
			}
			
			$sqlBeneficiado= $this->db->get();
		    $dataBeneficiado = $sqlBeneficiado->result();
			$rowcount = $sqlBeneficiado->num_rows();
			$lista_coincidencias=array();
			
			$ouput=null;
			$output = array(						
						"total" => 0,						
						"results" => array()
					);
			if($sqlBeneficiado->num_rows()!=0)
			{
						
						foreach ($dataBeneficiado as $value) 
						{
							$lista_coincidencias[]=$value;
						}			
						$this->db->select('count(*) as total');		
				    	$this->db->from('beneficiado');
						if($tipo==1)
						{
			    			$this->db->like('DNI',$parametro,'after');
						}
						else 
						{
							$this->db->like('NombresCompletos', $parametro,'after');
						}
						$sqlTotal= $this->db->get();
					    $dataTotal = $sqlTotal->result();
						$output = array(
							"total" => $dataTotal[0]->total,
							"results" => $lista_coincidencias
						);
				
			}
			return $output ;
    }
}
?>

