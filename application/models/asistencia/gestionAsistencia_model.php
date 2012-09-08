<?php
class GestionAsistencia_model extends CI_Model {
 
 
    function __construct()
    {
        parent::__construct();
    }    
  	function registrarAsistenciaPersona($dni)
    {
    	
    	  	$this->db->select('IdBeneficiado,IdPersona,NombresCompletos,IdCarreraProfesional,NumCiclo,curdate() as FechaActual');			
			$this->db->where('DNI',$dni);			
			$sqlBeneficiado = $this->db->get('beneficiado');
			$dataBeneficiado = $sqlBeneficiado->result();  
			$siNoExistePersona=false;
				if($sqlBeneficiado->num_rows()!=0)
				{
					$siNoExistePersona=true;
					$IdBeneficiado=$dataBeneficiado[0]->IdBeneficiado;
					$IdPersona=$dataBeneficiado[0]->IdPersona;
					$NombresCompletos=$dataBeneficiado[0]->NombresCompletos;
					$IdCarreraProfesional=$dataBeneficiado[0]->IdCarreraProfesional;
					$NumCiclo=$dataBeneficiado[0]->NumCiclo;
					$FechaActual=$dataBeneficiado[0]->FechaActual;
					$TipoAtendido="COMENSAL INSCRITO";
				} 
				else
				{
					$this->db->select('IdPersona,concat(`ApellidoPaterno`,`ApellidoMaterno`,`NombresCompleto`) as NombresCompletos,IdCarreraProfesional,NumCiclo,curdate() as FechaActual',false);			
					$this->db->where('DNI',$dni);			
					$sqlPersona = $this->db->get('persona');
					$dataPersona = $sqlPersona->result();
					if($sqlPersona->num_rows()!=0)
					{
						$siNoExistePersona=true;
						$IdPersona=$dataBeneficiado[0]->IdPersona;
						$NombresCompletos=$dataBeneficiado[0]->NombresCompletos;
						$IdCarreraProfesional=$dataBeneficiado[0]->IdCarreraProfesional;
						$NumCiclo=$dataBeneficiado[0]->NumCiclo;
						$FechaActual=$dataBeneficiado[0]->FechaActual;
						$TipoAtendido="COMENSAL INVITADO";
					}  
					else
					{
						//Error no existe persona 
						$idError=1;
					}
				}
					if($siNoExistePersona!=false)
					{
						$this->db->select('NombreCarreraProfesional');			
						$this->db->where('IdCarreraProfesional',$IdCarreraProfesional);			
						$sqlCarrera= $this->db->get('carrera_profesional');			
						$dataCarrera = $sqlCarrera->result();  
						$NombreCarreraProfesional=$dataCarrera[0]->NombreCarreraProfesional;
						$this->db->select('curtime() as HoraMarcado,now() as FechaMarcado,IdTiempo');			
						$this->db->where('Fecha',$FechaActual);			
						$sqlTiempo = $this->db->get('tiempo');			
						$dataTiempo = $sqlTiempo->result();  
						$IdTiempo=$dataTiempo[0]->IdTiempo;
						$HoraMarcado=$dataTiempo[0]->HoraMarcado;
						$FechaMarcado=$dataTiempo[0]->FechaMarcado;						
				     	$data = array(
									   'IdCentroAtencion' => $this->session->userdata("IdCentroAtencion") ,
									   'IdPersona' =>$IdPersona,
									   'IdBeneficiado' => $IdBeneficiado,
									   'IdTiempo'=>$IdTiempo,
									   'HoraAtencion'=>$FechaMarcado
									);
							$this->db->insert('atencion', $data);
							$resultado=$this->db->affected_rows();
							if($resultado>0)
							{
								//No hay error 
								$idError=0;				
								$Mensaje=$HoraMarcado." - ASISTENCIA REGISTRADA";
							}	
							else{
								$this->db->select('time(HoraAtencion) as HoraAtencion');			
								$this->db->where('IdTiempo',$IdTiempo);
								$this->db->where('IdPersona',$IdPersona);
								$sqlHoraAtencion= $this->db->get('atencion');			
								$dataHoraAtencion = $sqlHoraAtencion->result();  
								$HoraMarcado=$dataHoraAtencion[0]->HoraAtencion;
								$Mensaje=$HoraMarcado." - DUPLICADO DE ASISTENCIA";
								//Error Duplicado de Asistencia
								$idError=2;	
							}
								
						$resultadoMensaje->mensaje=$Mensaje;
						$resultadoMensaje->nombresCompletos=$NombresCompletos;
						$resultadoMensaje->carreraProfesional=$NombreCarreraProfesional;
						$resultadoMensaje->numCiclo=$NumCiclo;
						$resultadoMensaje->success="true";
						$resultadoMensaje->dni=$dni;
						$resultadoMensaje->idError=$idError;
						$resultadoMensaje->tipoAtendido=$TipoAtendido;
								
					}	
					else
					{
						$resultadoMensaje->mensaje="CODIGO NO IDENTIFICADO";	
						$resultadoMensaje->idError=$idError;					
					}
					return $resultadoMensaje;
    }

}
?>

