<?php
class Home extends CI_Controller {
	
	public function index()
	{
			$this->control_session->verificarSesionConRedireccionamientoLogin();
			$valor=$this->session->userdata('Validado')=='true'?true:false;
			
			if($valor)
			{
				$template['header'] = $this->load->view('plantilla/header','',true);				
				$config = array('IdUsuario'=>$this->session->userdata('IdUsuario'));				
				$this->load->library('acl',$config);				
				$this->session->set_userdata('Acl',$this->acl->getPermisos());
			    $template['nav'] = $this->load->view('plantilla/nav','',true);							
				$template['content'] = "";			
				$this->load->view('plantilla/plantilla', $template);
			}
	}
}
?>