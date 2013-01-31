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
	public function consultaBeneficiado()
	{
			$template['header'] = $this->load->view('plantilla/header','',true);
			$template['nav'] = $this->load->view('plantilla/nav','',true);			
			$template['content'] = $this->load->view('beneficiado/consulta_beneficiado','',true);			
			$this->load->view('plantilla/plantilla', $template);
	}
	public function registroBeneficiado()
	{		
		$template['header'] = $this->load->view('plantilla/header','',true);
			$template['nav'] = $this->load->view('plantilla/nav','',true);			
			$template['content'] = $this->load->view('beneficiado/registro_beneficiado','',true);			
			$this->load->view('plantilla/plantilla', $template);
			 
	}
	public function registrarBeneficiado()
	{		
		$IdPersona=$this->input->post('IdPersona',TRUE)."";
		$DNI=$this->input->post('DNI',TRUE)."";
		$CodigoUniversitario=$this->input->post('CodigoUniversitario',TRUE)."";
		$IdCarreraProfesional=$this->input->post('IdCarreraProfesional',TRUE)."";
		$NumCiclo=$this->input->post('NumCiclo',TRUE)."";
		$ApellidoPaterno=$this->input->post('ApellidoPaterno',TRUE)."";
		$ApellidoMaterno=$this->input->post('ApellidoMaterno',TRUE)."";
		$Nombres=$this->input->post('Nombres',TRUE)."";
		$Sexo=$this->input->post('Sexo',TRUE)."";
		$FechaNacimiento=$this->input->post('FechaNacimiento',TRUE)."";
		$CiudadProcedencia=$this->input->post('CiudadProcedencia',TRUE)."";
		$TelefonoFijo=$this->input->post('TelefonoFijo',TRUE)."";
		$Celular1=$this->input->post('Celular1',TRUE)."";
		$Celular2=$this->input->post('Celular2',TRUE)."";
		$CorreoElectronicoPersonal=$this->input->post('CorreoElectronicoPersonal',TRUE)."";
	    $CorreoElectronicoInstitucional=$this->input->post('CorreoElectronicoInstitucional',TRUE)."";
	    $this->load->model("beneficiado/gestion_beneficiado_model");
	    if($IdPersona=="false"){
	    $data=$this->gestion_beneficiado_model->registrarBeneficiado($IdPersona);	
	    }
	    else{
	    $data=$this->gestion_beneficiado_model->registrarBeneficiado($IdPersona,
									$DNI,
									$CodigoUniversitario,
									$IdCarreraProfesional,
									$NumCiclo,
									$ApellidoPaterno,
									$ApellidoMaterno,
									$Nombres,
									$Sexo,
									$FechaNacimiento,
									$CiudadProcedencia,
									$TelefonoFijo,
									$Celular1,
									$Celular2,
									$CorreoElectronicoPersonal,
								    $CorreoElectronicoInstitucional
	    	);
	    }
	    $this->output->set_content_type('json')->set_output(json_encode($data));	
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
	public function exportarBeneficiadoPDF()
	{
		$this->load->library('tcpdf/tcpdf');
		$this->load->helper('tcpdf_helper');
		$parametro=$this->input->get('txt_consulta_beneficiado',TRUE)."";
		$parametro = 'pa';
		$tipo=$this->input->get('rbt_tipo_consulta',TRUE)."";
		$tipo = 2;
		$this->load->model("beneficiado/gestion_beneficiado_model");
		$data=$this->gestion_beneficiado_model->exportarBeneficiados($parametro,$tipo);
        headerPDF('UNIVERSIDAD NACIONAL JOSÉ FAUSTINO SÁNCHEZ CARRIÓN', 'UNIDAD DE COMEDOR UNIVERSITARIO');	
		footerPDF(' Hestia');
		$this->tcpdf->AddPage();
        $table = 'Resultados de la consulta: '.$parametro.'<br /><br />';
        $table .= '<table border="1" align="center" style="font-size:26px;"><tr bgcolor="#F7F8E0" ><td width="5%"></td><td width="10%">DNI</td><td width="40%">APELLIDOS Y NOMBRES</td><td width="25%">CARRERA PROFESIONAL</td><td width="7%">CICLO</td><td width="13%">ESTADO</td></tr>';
		$count = 1;
		foreach ($data as $resultado){
		if($count%2==0)$table .= '<tr bgcolor="#F7F8E0">';
		else $table.='<tr>';
		$table .=
			'<td width="5%">'.$count.'</td>'.
			'<td width="10%">'.$resultado['dni'].'</td>'.
			'<td width="40%">'.$resultado['nombrescompletos'].'</td>'.
			'<td width="25%">'.$resultado['nombrecarreraprofesional'].'</td>'.
			'<td width="7%">'.cicloRomano($resultado['numciclo']).'</td>'.
			'<td width="13%">'.$resultado['condicionfinal'].'</td></tr>';
		$count++;
		}
		$table.='</table><br /><br />Se han encontrado '.count($data).' Coincidencias';
        $this->tcpdf->writeHTML($table, true, 0, true, 0);
		$this->tcpdf->lastPage();
		$this->tcpdf->writeHTML('Reporte emitido por Hestia : '.date("d/m/Y H:i:s"),true,0,true,0);
        $this->tcpdf->Output('ReporteHestia.pdf', 'I'); 
     }

	public function exportarBeneficiadoExcel(){
		
		header("Content-Type: application/vnd.ms-excel");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("content-disposition: attachment;filename=Reportes.xls");
		$this->load->helper('tcpdf_helper');
		$parametro=$this->input->get('txt_consulta_beneficiado',TRUE)."";
		$parametro = 'pa';
		$tipo=$this->input->get('rbt_tipo_consulta',TRUE)."";
		$this->load->model("beneficiado/gestion_beneficiado_model");
		$data=$this->gestion_beneficiado_model->exportarBeneficiados($parametro,2);
		iniciaExcel();
		$count = 1;
		$table = '<table CELLPADDING="1" CELLSPACING="1" border="1"><tr align="center" bgcolor="#F7F8E0" ><td></td><td>DNI</td><td>APELLIDOS Y NOMBRES</td><td>CARRERA PROFESIONAL</td><td>CICLO</td><td>ESTADO</td></tr>';
		foreach ($data as $resultado){ //usando los datos de mysql
		if($count%2==0)$table .= '<tr bgcolor="#F7F8E0" align="center">';
		else $table.='<tr align="center">';
		$table .=
			'<td>'.$count.'</td>'.
			'<td>'.$resultado['dni'].'</td>'.
			'<td>'.$resultado['nombrescompletos'].'</td>'.
			'<td>'.$resultado['nombrecarreraprofesional'].'</td>'.
			'<td>'.cicloRomano($resultado['numciclo']).'</td>'.
			'<td>'.$resultado['condicionfinal'].'</td></tr>';
		$count++;
		}
		echo $table;
		echo '</table>';
		cierraExcel();
	}   
}
?>