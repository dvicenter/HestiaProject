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
			$parametro=$this->input->get('txt_consulta_beneficiado',TRUE)."";
			$tipo=$this->input->get('rbt_tipo_consulta',TRUE)."";
			$this->load->model("beneficiado/gestion_beneficiado_model");
			$data=$this->gestion_beneficiado_model->exportarBeneficiados($parametro,$tipo);
			$this->load->library('cezpdf');
			$this->load->helper('pdf_helper');
			preparar_pdf();		
			$this->cezpdf->ezText('<b>Reporte Hestia</b>');
			$this->cezpdf->ezText('<b>Fecha:</b> '.date('Y-m-d'));
			$this->cezpdf->ezText('');		
			foreach ($data as $value) {
				$db_data[]=array('dni'=>$value['dni'],'nombrescompletos'=>$value['NombresCompletos'],'nombrecarreraprofesional'=>$value['NombreCarreraProfesional'],'numciclo'=>$value['NumCiclo'],'condicionfinal'=>$value['CondicionFinal']);
			}
			
			$col_names = array('dni'=>'DNI','nombrescompletos'=>'Nombres','nombrecarreraprofesional'=>'Carrera Profesional','numciclo'=>'Ciclo','condicionfinal'=>'Condicion');
			$this->cezpdf->ezTable($db_data, $col_names,'Listado busqueda',array('width'=>550));
			$this->cezpdf->ezStream(array('Content-Disposition'=>'name_file.pdf'));
	}
	
	
	function hello_world()
{
	$this->load->library('cezpdf');
	$this->cezpdf->ezText('Hello World',12,array('justification'=>'justify'));
	$this->cezpdf->ezSetDy(-10);
	$content = 'Primero un saludo y me da gusto encontrat una comunidad de codeigniter en español, bueno vamos a lo que me interesa, mi consulta es si alguien a realizado algun reporte en pdf con codeigniter dado que soy nuevo en el uso de es te y deseo su se puede me den una mano con este asunto, de antemano agradesco su ayuda.';
	$this->cezpdf->ezText($content,10);
	$this->cezpdf->ezStream();
}

function tables()
{
	$this->load->library('cezpdf');
	$db_data[] = array('name'=>'Cesar Mandamiento','phone'=>'980312797','email'=>'cesaramdaniento@gmail.com');
	
	$col_names = array(
		'name' => 'Name',
		'phone' => 'Phone Number',
		'email' => 'E-Mail'
	);
	$this->cezpdf->ezTable($table_data,$col_names,'Contact List',array('width'=>550));
	$thiz->cezpdf->ezStream();
}

function headers()
{
	$this->load->library('cezpdf');
	$this->load->helper('pdf');
	preparar_pdf();
	
	$db_data[] = array('name'=>'Cesar Mandamiento','phone'=>'980312797','email'=>'cesaramdaniento@gmail.com');
	$col_names = array(
		'name' => 'Name',
		'phone' => 'Phone Number',
		'email' => 'E-Mail'
	);
	$this->cezpdf->ezTable($table_data,$col_names,'Contact List',array('width'=>550));
	$thiz->cezpdf->ezStream();
}

public function generar_pdf()
{
	$this->load->database();
	$this->load->library('cezpdf');
	$this->load->helper('pdf_helper');
	preparar_pdf();
	
	$this->cezpdf->ezText('<b>Prueba:</b> Hestia');
	$this->cezpdf->ezText('<b>Fecha:</b> '.date('Y-m-d'));
	$this->cezpdf->ezText('');
	
	$mes = $this->input->post('txtmes');
	
	$this->load->model('reporte_model');
	
	$listar_reporte = $this->reporte_model->listar_reporte($mes);
	
	foreach ($listar_reporte as $value) {
		$db_data[]=array('id'=>$value['id']);
	}
	
	$col_names = array('id'=>'ID USERNAME');
	$this->cezpdf->ezTable($db_data, $col_names,'Listado busqueda',array('width'=>600));
	$this->cezpdf->ezStream(array('Content-Disposition'=>'name_file.pdf'));
}
	
}
?>