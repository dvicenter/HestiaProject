<?php
class Gestion_asistencia extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
		$this->control_session->verificarSesionConRedireccionamientoLogin();       
    }
	public function index()
	{
		
	}
	public function marcadoAsistencia()
	{
			$template['header'] = $this->load->view('plantilla/header','',true);
			$template['nav'] = $this->load->view('plantilla/nav','',true);			
			$template['content'] = $this->load->view('asistencia/marcado_asistencia','',true);			
			$this->load->view('plantilla/plantilla', $template);
	}
	public function registrarAsistenciaPersona()
	{
			$dni=$this->input->post('txt_dni_consulta',TRUE)."";
			$this->load->model("asistencia/gestion_asistencia_model");
			$data=$this->gestionasistencia_model->registrarAsistenciaPersona($dni);
			$this->output->set_content_type('json')->set_output(json_encode($data));
	}
}
?>