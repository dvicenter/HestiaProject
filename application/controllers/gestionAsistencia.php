<?php
class GestionAsistencia extends CI_Controller {

	public function index()
	{
		
	}
	public function marcadoAsistencia()
	{
			$template['header'] = $this->load->view('home_header','',true);
			$template['nav'] = $this->load->view('home_nav','',true);			
			$template['content'] = $this->load->view('marcadoAsistencia','',true);			
			$this->load->view('plantilla', $template);
	}
}
?>