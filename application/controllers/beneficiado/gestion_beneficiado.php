<?php
	class Gestion_beneficiado extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
		$this->control_session->verificarSesionConRedireccionamientoLogin();       
    }
	public function index()
	{
		
	}
	public function registroBeneficiado()
	{
			$template['header'] = $this->load->view('plantilla/header','',true);
			$template['nav'] = $this->load->view('plantilla/nav','',true);			
			$template['content'] = $this->load->view('beneficiado/registro_beneficiado','',true);			
			$this->load->view('plantilla/plantilla', $template);
	}
	public function nuevoBeneficiado()
	{		
			 $this->load->view('beneficiado/nuevo_beneficiado');
	}
	public function consultarBeneficiado()
	{
			$parametro=$this->input->get('txt_consulta_beneficiado',TRUE)."";
			$tipo=$this->input->get('rbt_tipo_consulta',TRUE)."";
			$inicio=$this->input->get('iDisplayStart',TRUE)."";
			$tamanio=$this->input->get('iDisplayLength',TRUE)."";
			$sEcho=$this->input->get('sEcho',TRUE)."";
			$this->load->model("beneficiado/gestion_beneficiado_model");
			$data=$this->gestion_beneficiado_model->consultarBeneficiados($parametro,$tipo,$inicio,$tamanio,$sEcho);
			$this->output->set_content_type('json')->set_output(json_encode($data));	
	}
	public function consultarBeneficiadoFiltro()
	{
			$parametro=$this->input->get('q',TRUE)."";
			$tipo=2;
			$inicio=$this->input->get('p',TRUE)."";
			$tamanio=$this->input->get('s',TRUE)."";
			$this->load->model("beneficiado/gestion_beneficiado_model");
			$data=$this->gestion_beneficiado_model->consultarBeneficiadosFiltro($parametro,$tipo,$inicio,$tamanio);
			$this->output->set_content_type('json')->set_output(json_encode($data));	
	}
	
	public function exportarBeneficiado()
	{
			//error_reporting(E_ALL ^ E_NOTICE);
			$parametro=$this->input->get('txt_consulta_beneficiado',TRUE)."";
			$tipo=$this->input->get('rbt_tipo_consulta',TRUE)."";
			$this->load->model("beneficiado/gestion_beneficiado_model");
			$data=$this->gestion_beneficiado_model->exportarBeneficiados('manrique',2);
			
			$this->load->library('cezpdf');
			$this->load->helper('pdf_helper');
			preparar_pdf();		
			
			//$this->cezpdf->ezText('<b>Reporte Hestia</b>');
			//$this->cezpdf->ezText('<b>Fecha:</b> '.date('Y-m-d'));
			//$this->cezpdf->ezText('');
			
			$db_data=array();
			foreach ($data as $value) 
			{
				$db_data[]=array('dni'=>$value['dni'],'nombrescompletos'=>$value['nombrescompletos'],'nombrecarreraprofesional'=>$value['nombrecarreraprofesional'],'numciclo'=>$value['numciclo'],'condicionfinal'=>$value['condicionfinal']);
			}	
			 	
			$col_names = array('dni'=>'DNI','nombrescompletos'=>'Nombres','nombrecarreraprofesional'=>'Carrera Profesional','numciclo'=>'Ciclo','condicionfinal'=>'Condicion');
			$this->cezpdf->ezTable($db_data, $col_names,'Listado busqueda',array('width'=>550,'fontSize'=>10));
			$this->cezpdf->ezStream(array('Content-Disposition'=>'name_file.pdf'));
			 
	}
	
	
	
}
?>