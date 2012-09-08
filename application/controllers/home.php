<?php
class Home extends CI_Controller {


	public function index()
	{
		if($this->session->userdata("Validado")!="true")
		{
			$this->load->model("seguridad/login_model");
			$usuario=$this->input->post('txt_usuario',TRUE)."";
			$password=$this->input->post('txt_password',TRUE)."";
			$valor=$this->login_model->verificarCredenciales("$usuario","$password");
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
			else{
				redirect('login', 'refresh');
			}
		}
		
		else{
				$template['header'] = $this->load->view('plantilla/header','',true);
				$template['nav'] = $this->load->view('plantilla/nav','',true);			
				$template['content'] = "";			
				$this->load->view('plantilla/plantilla', $template);
						
		}
	}
}
?>