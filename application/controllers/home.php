<?php
class Home extends CI_Controller {


	public function index()
	{
		$this->load->model("login_model");
		$valor=$this->login_model->verificarCredenciales("","");
		if($valor)
		{
			$template['header'] = $this->load->view('home_header','',true);
			$template['nav'] = $this->load->view('home_nav','',true);			
			$template['content'] = "";			
			$this->load->view('plantilla', $template);
			
		}
	}
}
?>