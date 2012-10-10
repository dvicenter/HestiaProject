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
	
	public function exportarBeneficiadoold()
	{
			$parametro=$this->input->get('txt_consulta_beneficiado',TRUE)."";
			$tipo=$this->input->get('rbt_tipo_consulta',TRUE)."";
			$this->load->model("beneficiado/gestion_beneficiado_model");
			$data=$this->gestion_beneficiado_model->exportarBeneficiados('manrique',1);
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

	public function exportarBeneficiado()
	{
			$parametro=$this->input->get('txt_consulta_beneficiado',TRUE)."";
			$tipo=$this->input->get('rbt_tipo_consulta',TRUE)."";
			$this->load->model("beneficiado/gestion_beneficiado_model");
			$data=$this->gestion_beneficiado_model->exportarBeneficiados('manrique',2);
			$this->load->library('fpdf');
			$this->fpdf->Open();
			$this->fpdf->AddPage('P' , 'A4'); //mi formato de pagina 
			$this->fpdf->SetFont('Arial','B',15);
			$this->fpdf->Cell(80);
			$this->fpdf->Image('http://4.bp.blogspot.com/_BSRFkkxuSEI/TDih0WqUGTI/AAAAAAAAGj4/fg0WTNspPxQ/s320/UNJFSC.png',10,10,-300,'PNG').
			// Framed title
			$title= utf8_decode("Universidad Nacional José Faustino Sánchez Carrión");
		    $this->fpdf->Cell(30,10,$title,0,0,'C');
		    // Line break
		    $this->fpdf->Ln(20);
			$this->fpdf->SetFont('Arial','',10); //mi fuente
			foreach ($data as $resultado){ //usando los datos de mysql
			$this->fpdf->Cell(20,5,$resultado['dni'],1,0,'C'); 
			$this->fpdf->Cell(80,5,$resultado['nombrescompletos'],1,0,'L'); 
			$this->fpdf->Cell(50,5,$resultado['nombrecarreraprofesional'],1,0,'C'); 
			$this->fpdf->Cell(10,5,$resultado['numciclo'],1,0,'C'); 
			$this->fpdf->Cell(25,5,$resultado['condicionfinal'],1,0,'C');
			$this->fpdf->Ln(); // salto de linea		
			}
			$this->fpdf->SetY(270);
		    // Select Arial italic 8
		    $this->fpdf->SetFont('Arial','I',8);
		    // Print centered page number
		    date_default_timezone_set('Etc/GMT+5');
			// fecha
			$foot = utf8_decode("Fecha de impresión:".date("Y-m-d H:i:s"));
			
		    $this->fpdf->Cell(0,5,$foot,1,0,'C');
			//
			$this->fpdf->Cell(0,5,'Pagina '.$this->fpdf->PageNo(),1,0,'R');
			//finaliza y muestra en pantalla pdf
			$this->fpdf->Output(); // si se deja Output() asi "solo" el archivo al guardarlo tiene el nombre doc.pdf y el parametro 'D' obliga a guardarlo , que era lo que yo necesitaba!!
			
	}
	
}
?>