<?php
class GestionAsistencia extends CI_Controller {

	public function index()
	{
		
	}
	public function marcadoAsistencia()
	{
			$template['header'] = $this->load->view('plantilla/header','',true);
			$template['nav'] = $this->load->view('plantilla/nav','',true);			
			$template['content'] = $this->load->view('asistencia/marcadoAsistencia','',true);			
			$this->load->view('plantilla/plantilla', $template);
	}
	public function registrarAsistenciaPersona()
	{
			$dni=$this->input->post('txt_dni_consulta',TRUE)."";
			$this->load->model("asistencia/gestionAsistencia_model");
			$data=$this->gestionAsistencia_model->registrarAsistenciaPersona($dni);
			$this->output->set_content_type('json')->set_output(json_encode($data));
			
	}
}
?>