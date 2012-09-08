<?php
class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('login');
	}
	public function cerrarSesion()
	{
		$this->session->sess_destroy();
	   	redirect('login', 'refresh');	
	}
}
?>