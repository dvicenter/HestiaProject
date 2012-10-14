<?php
class Gestion_beneficiado_model extends CI_Model {
 
 
    function __construct()
    {
        parent::__construct();
    }    
	 function consultarBeneficiadosFiltro($parametro,$tipo,$inicio,$tamanio)
    {

	    	$this->db->select('DNI,NombresCompletos');				
	    	$this->db->from('beneficiado');
			
		
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
  	function consultarBeneficiados($parametro,$tipo,$inicio,$tamanio,$sEcho)
    {

	    	$this->db->select('DNI,NombresCompletos,NombreCarreraProfesional,NumCiclo,CondicionFinal');				
	    	$this->db->from('beneficiado');
			$this->db->join('carrera_profesional', 'beneficiado.IdCarreraProfesional = carrera_profesional.IdCarreraProfesional');
		
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
						"sEcho" => intval($sEcho),
						"iTotalRecords" => 0,
						"iTotalDisplayRecords" => 0,
						"aaData" => array()
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
							"sEcho" => intval($sEcho),
							"iTotalRecords" => $rowcount,
							"iTotalDisplayRecords" => $dataTotal[0]->total,
							"aaData" => $lista_coincidencias
						);
				
			}
			return $output ;
    }
	
	function exportarBeneficiados($parametro,$tipo)
    {

	    	$this->db->select('DNI,NombresCompletos,NombreCarreraProfesional,NumCiclo,CondicionFinal');				
	    	$this->db->from('beneficiado');
			$this->db->join('carrera_profesional', 'beneficiado.IdCarreraProfesional = carrera_profesional.IdCarreraProfesional');
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
			$output=null;
			if($sqlBeneficiado->num_rows()!=0)
			{
						$indice = 0;
						foreach ($dataBeneficiado as $value) 
						{
							$lista_coincidencias[$indice]['dni']=$value->DNI;
							$lista_coincidencias[$indice]['nombrescompletos']=$value->NombresCompletos;
							$lista_coincidencias[$indice]['nombrecarreraprofesional']=$value->NombreCarreraProfesional;
							$lista_coincidencias[$indice]['numciclo']=$value->NumCiclo;
							$lista_coincidencias[$indice]['condicionfinal']=$value->CondicionFinal;
							$indice++;
						}			
				$output = $lista_coincidencias;
				
			}
			return $output ;
    }
}
?>

