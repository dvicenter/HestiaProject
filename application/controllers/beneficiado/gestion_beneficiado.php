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
			$data=$this->gestion_beneficiado_model->exportarBeneficiados('manrique',2);
			$this->load->library('fpdf');
			
			/* COMIENZA */
			
			$this->fpdf->AddPage('P' , 'A4'); //mi formato de pagina 
			$this->fpdf->SetFont('Arial','B',16);
			$this->fpdf->Cell(80);
			$this->fpdf->Image('http://4.bp.blogspot.com/_BSRFkkxuSEI/TDih0WqUGTI/AAAAAAAAGj4/fg0WTNspPxQ/s320/UNJFSC.png',10,10,-300,'PNG').
			// Framed title
			$title= utf8_decode("Universidad Nacional José Faustino Sánchez Carrión");
		    $this->fpdf->Cell(30,10,$title,0,0,'C');
		    $this->fpdf->Ln();
			$this->fpdf->SetFont('Arial','B',12);
			$this->fpdf->Cell(80);
			$this->fpdf->Cell(30,10,"UNIVERSIDAD DE COMEDOR UNIVERSITARIO",0,0,'C');
		    
		    // Line break
		    $this->fpdf->Ln();
			$this->fpdf->SetFonT('Arial','',10); //mi fuente
			$this->fpdf->Ln();
			
			//CABECERA TABLA
			$this->fpdf->Cell(20,5,'DNI',1,0,'C'); 
			$this->fpdf->Cell(80,5,'APELLIDOS Y NOMBRES',1,0,'C'); 
			$this->fpdf->Cell(50,5,'CARRERA PROFESIONAL',1,0,'C'); 
			$this->fpdf->Cell(20,5,'CICLO',1,0,'C'); 
			$this->fpdf->Cell(25,5,utf8_decode('CONDICIÓN'),1,0,'C');
			$this->fpdf->Ln(); // salto de linea		
			
			
			foreach ($data as $resultado){ //usando los datos de mysql
			$this->fpdf->Cell(20,5,$resultado['dni'],1,0,'C'); 
			$this->fpdf->Cell(80,5,$resultado['nombrescompletos'],1,0,'L'); 
			$this->fpdf->Cell(50,5,$resultado['nombrecarreraprofesional'],1,0,'C'); 
			$this->fpdf->Cell(20,5,$resultado['numciclo'],1,0,'C'); 
			$this->fpdf->Cell(25,5,$resultado['condicionfinal'],1,0,'C');
			$this->fpdf->Ln(); // salto de linea		
			}
			$this->fpdf->SetY(270);
		    // Select Arial italic 8
		    $this->fpdf->SetFont('Arial','I',8);
		    // Print centered page number
		    date_default_timezone_set('Etc/GMT+5');
			// fecha
			$foot = utf8_decode("Reporte emitido por Hestia - Fecha de impresión:".date("Y-m-d H:i:s"));
			
		    //$this->fpdf->Cell(0,5,$foot,1,0,'C');
			//
			//$this->fpdf->Cell(0,5,'Pagina '.$this->fpdf->PageNo(),1,0,'R');
			$this->fpdf->SetY(-15);
		    //Arial italic 8
    		$this->fpdf->SetFont('Arial','I',8);
		    //Número de página
		    $this->fpdf->Cell(0,10,'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'C');
			//finaliza y muestra en pantalla pdf
			$this->fpdf->Output(); // si se deja Output() asi "solo" el archivo al guardarlo tiene el nombre doc.pdf y el parametro 'D' obliga a guardarlo , que era lo que yo necesitaba!!
			
	}

	function Header()
    {
	    //Logo
	    $this->Image("http://4.bp.blogspot.com/_BSRFkkxuSEI/TDih0WqUGTI/AAAAAAAAGj4/fg0WTNspPxQ/s320/UNJFSC.png" , 10 ,8, 35 , 38 , "JPG" ,"http://www.mipagina.com");
	    //Arial bold 15
	    $this->SetFont('Arial','B',15);
	    //Movernos a la derecha
	    $this->Cell(80);
	    //Título
	    $this->Cell(60,10,'Titulo del archivo',1,0,'C');
	    //Salto de línea
	    $this->Ln(20);
	}
   
	   //Pie de página
	function Footer()
	{
	    //Posición: a 1,5 cm del final
	    $this->fpdf->SetY(-15);
	    //Arial italic 8
	    $this->fpdf->SetFont('Arial','I',8);
	    //Número de página
	   	$this->fpdf->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
      //Tabla coloreada
	function TablaColores($header)
	{
		//Colores, ancho de línea y fuente en negrita
		$this->fpdf->SetFillColor(255,0,0);
		$this->fpdf->SetTextColor(255);
		$this->fpdf->SetDrawColor(128,0,0);
		$this->fpdf->SetLineWidth(.3);
		$this->fpdf->SetFont('Arial','B');
		//Cabecera
		for($i=0;$i<count($header);$i++)
		$this->fpdf->Cell(40,7,$header[$i],1,0,'C',1);
		$this->fpdf->Ln();
		//Restauración de colores y fuentes
		$this->fpdf->SetFillColor(224,235,255);
		$this->fpdf->SetTextColor(0);
		$this->fpdf->SetFont('');
		//Datos
		$fill=false;
		$this->fpdf->Cell(40,6,"hola",'LR',0,'L',$fill);
		$this->fpdf->Cell(40,6,"hola2",'LR',0,'L',$fill);
		$this->fpdf->Cell(40,6,"hola3",'LR',0,'R',$fill);
		$this->fpdf->Cell(40,6,"hola4",'LR',0,'R',$fill);
		$this->fpdf->Ln();
		$fill=!$fill;
		$this->fpdf->Cell(40,6,"col",'LR',0,'L',$fill);
		$this->fpdf->Cell(40,6,"col2",'LR',0,'L',$fill);
		$this->fpdf->Cell(40,6,"col3",'LR',0,'R',$fill);
		$this->fpdf->Cell(40,6,"col4",'LR',0,'R',$fill);
		$fill=true;
		$this->fpdf->Ln();
		$this->fpdf->Cell(160,0,'','T');
	}
   public function exportarBeneficiado2()
	{
			$this->load->library('fpdf');
			//$pdf=$this->fpdf->PDF();
			//Títulos de las columnas
			$header=array('Columna 1','Columna 2','Columna 3','Columna 4');
			$this->fpdf->AliasNbPages();
			//Primera página
			$this->fpdf->AddPage();
			$this->fpdf->SetY(65);
			//$pdf->AddPage();
			$this->TablaColores($header);
			//Segunda página
			$this->fpdf->AddPage();
			$this->fpdf->SetY(65);
			$this->fpdf->Output();			
	}
	
}
?>