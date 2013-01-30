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
	    	concat(ApellidoPaterno," ",ApellidoMaterno," ",Nombres) as NombresCompletos,
	    	Sexo,
	    	DNI,
	    	CodigoUniversitario,
	    	date_format(FechaNacimiento,"%d/%m/%Y") as FechaNacimiento,
	    	CiudadProcedencia,
	    	TelefonoFijo,
	    	Celular1,
	    	Celular2,
	    	CorreoElectronicoPersonal,
	    	CorreoElectronicoInstitucional,
	    	NumCiclo,
	    	IdCarreraProfesional',false
			);				
	    	$this->db->from('Persona');
			
		
			$this->db->limit($tamanio,$inicio);
    		if($tipo==1)
			{
    		$this->db->like('DNI',$parametro,'after');
			}
			else 
			{
			$this->db->like('concat(ApellidoPaterno," ",ApellidoMaterno," ",Nombres)',$parametro,'after');
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
			if($rowcount!=0)
			{						
						foreach ($dataBeneficiado as $value) 
						{
							$lista_coincidencias[]=$value;
						}			
						$this->db->select('count(*) as total');		
				    	$this->db->from('persona');
						if($tipo==1)
						{
			    			$this->db->like('DNI',$parametro,'after');
						}
						else 
						{
							$this->db->like('concat(ApellidoPaterno," ",ApellidoMaterno," ",Nombres)', $parametro,'after');
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
    function listarCarreraProfesional(){
    	$this->db->select("carrera_profesional.IdFacultad,facultad.NombreFacultad");
    	$this->db->from("carrera_profesional");
    	$this->db->join("facultad","facultad.IdFacultad=carrera_profesional.IdFacultad");
    	$this->db->group_by("carrera_profesional.IdFacultad");    	
    	$sqlFacultad= $this->db->get();
		$dataFacultad = $sqlFacultad->result();

		$listaOpcionesCarreraProfesional=array();
		foreach ($dataFacultad as $value) 
		{			
			$facultadOption=null;
			$this->db->select("*");
    		$this->db->from("carrera_profesional");
    		$this->db->where("carrera_profesional.IdFacultad",$value->IdFacultad);
    		$sqlCarrera= $this->db->get();
    		$dataCarrera= $sqlCarrera->result();
    		$listaCarreraProfesional=array();
    		foreach ($dataCarrera as $value1)
    		{
    			$listaCarreraProfesional[]=$value1;
    		}
    		$facultadOption->text=$value->NombreFacultad;
    		$facultadOption->children=$listaCarreraProfesional;
			$listaOpcionesCarreraProfesional[]=$facultadOption;
		}	
		return $listaOpcionesCarreraProfesional;
    }
}
?>

