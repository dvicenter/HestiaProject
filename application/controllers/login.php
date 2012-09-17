<?php
class Login extends CI_Controller {

	public function index()
	{
		$this->control_session->verificarSesionConRedireccionamientoHome();
		$this->load->view('login');
	}
	public function verificarCredenciales()
	{
		$this->load->model("seguridad/login_model");
		$usuario=$this->input->post('txt_usuario',TRUE)."";
		$password=$this->input->post('txt_password',TRUE)."";
		$valor=$this->login_model->verificarCredenciales("$usuario","$password");	
		redirect('home', 'refresh');
	}
	public function cerrarSesion()
	{
		$this->session->sess_destroy();
	   	redirect('login', 'refresh');	
	}
}
?>