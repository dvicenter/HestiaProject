<?php
class Gestion_beneficiado_model extends CI_Model {
 
 
    function __construct()
    {
        parent::__construct();
    }   
	
  	function consultarBeneficiados($parametro,$tipo,$inicio,$tamanio,$sEcho)
    {

	    	$this->db->select('DNI,concat(ApellidoPaterno," ",ApellidoMaterno," ",Nombres) as NombresCompletos,NombreCarreraProfesional,NumCiclo,CondicionFinal ',false);			
	    	$this->db->from('beneficiado');
			$this->db->join('persona','beneficiado.IdPersona=persona.IdPersona');
			$this->db->join('carrera_profesional','persona.IdCarreraProfesional = carrera_profesional.IdCarreraProfesional');		
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
						$this->db->join('persona','beneficiado.IdPersona=persona.IdPersona');
						if($tipo==1)
						{
			    			$this->db->like('concat(ApellidoPaterno," ",ApellidoMaterno," ",Nombres)',$parametro,'after');
						}
						else 
						{
							$this->db->like('concat(ApellidoPaterno," ",ApellidoMaterno," ",Nombres)',$parametro,'after');
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
	function registrarAlumnoBeneficiado(
									$DNI,
									$CodigoUniversitario,
									$IdCarreraProfesional,
									$NumCiclo,
									$ApellidoPaterno,
									$ApellidoMaterno,
									$Nombres,
									$Sexo,
									$FechaNacimiento,
									$CiudadProcedencia,
									$TelefonoFijo,
									$Celular1,
									$Celular2,
									$CorreoElectronicoPersonal,
								    $CorreoElectronicoInstitucional)
	{
		$this->db->trans_start();
		$dataPersona = array(			   
			     "IdTipoPersona"=>"1",
			     "DNI"=>$DNI,
			     "CodigoUniversitario"=>$CodigoUniversitario,
			     "IdCarreraProfesional"=>$IdCarreraProfesional,
			     "NumCiclo"=>$NumCiclo,
			     "ApellidoPaterno"=>$ApellidoPaterno,
			     "ApellidoMaterno"=>$ApellidoMaterno,
			     "Nombres"=>$Nombres,
			     "Sexo"=>$Sexo,
			     "FechaNacimiento"=>$FechaNacimiento,
			     "CiudadProcedencia"=>$CiudadProcedencia,
			     "TelefonoFijo"=>$TelefonoFijo,
			     "Celular1"=>$Celular1,
			     "Celular2"=>$Celular2,
			     "CorreoElectronicoPersonal"=>$CorreoElectronicoPersonal,
			     "CorreoElectronicoInstitucional"=>$CorreoElectronicoInstitucional,
			     "FechaCreacion"=>"NOW()",
			     "FechaActualizacion"=>"NOW()"
			);
		$this->db->insert('persona', $dataPersona); 
		$IdPersona = $this->db->insert_id();

		$dataBeneficiado = array(			
				 "IdPersona"=>$IdPersona,   
			     "IdCronogramaAcademico"=>$this->session->userdata('IdCronogramaAcademicoVigente'),
			     "SiNoHabilitado"=>"1",
			     "CondicionFinal"=>"Habilitado",
			     "FechaCreacion"=>"NOW()",
			     "FechaActualizacion"=>"NOW()"
			);
		$this->db->insert('beneficiado', $dataBeneficiado); 
		$this->db->trans_complete();
		$data=null;
		if ($this->db->trans_status() === FALSE)
		{
		  	$data=array("tipoMensaje"=>"E","mensaje"=>"No se pudo registrar al beneficiado");
		}
		else{
			$data=array("tipoMensaje"=>"S","mensaje"=>"El registro del beneficiado ha sido exitoso");
		}
		return $data;
	}
	function registrarBeneficiado($IdPersona)
	{
		$dataBeneficiado = array(			
				 "IdPersona"=>$IdPersona,   
			     "IdCronogramaAcademico"=>$this->session->userdata('IdCronogramaAcademicoVigente'),
			     "SiNoHabilitado"=>"1",
			     "CondicionFinal"=>"Habilitado",
			     "FechaCreacion"=>"NOW()",
			     "FechaActualizacion"=>"NOW()"
			);
		$this->db->insert('beneficiado', $dataBeneficiado); 

	}
	function exportarBeneficiados($parametro,$tipo)
    {

	    	$this->db->select('DNI,NombresCompletos,NombreCarreraProfesional,NumCiclo,CondicionFinal');				
	    	$this->db->from('beneficiado');
			$this->db->join('carrera_profesional','beneficiado.IdCarreraProfesional = carrera_profesional.IdCarreraProfesional');
    		if($tipo==1)
			{
    		$this->db->like('DNI',$parametro,'after');
			}
			else 
			{
			$this->db->like('NombresCompletos',$parametro,'after');
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

