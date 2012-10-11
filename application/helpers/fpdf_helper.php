<?php
	
	function headerPDF()
	{
		$CI = &get_instance();
		$CI->fpdf->Image("http://4.bp.blogspot.com/_BSRFkkxuSEI/TDih0WqUGTI/AAAAAAAAGj4/fg0WTNspPxQ/s320/UNJFSC.png" , 10 ,8, 25 , 25 , "PNG" ,"http://www.mipagina.com");
	    //Arial bold 15
	    $CI->fpdf->SetFont('Arial','B',15);
	    //Movernos a la derecha
	    $CI->fpdf->Cell(80);
	    //Título
	    $CI->fpdf->Cell(60,10,utf8_decode('UNIVERSIDAD NACIONAL JOSÉ FAUSTINO SÁNCHEZ CARRIÓN'),0,0,'C');
	    //Salto de línea
	    $CI->fpdf->Ln(20);	
	}

	function footerPDF()
	{
		$CI = &get_instance();
		$CI->fpdf->SetY(-15);
	    //Arial italic 8
	    $CI->fpdf->SetFont('Arial','I',8);
	    //Número de página
	   	$CI->fpdf->Cell(0,10,'Page '.$CI->fpdf->PageNo().'/{nb}',0,0,'C');
	}
	function tablaPDF($header,$data)
	{
		$CI = &get_instance();
		//Colores, ancho de línea y fuente en negrita
		$CI->fpdf->SetFillColor(255,0,0);
		$CI->fpdf->SetTextColor(255);
		$CI->fpdf->SetDrawColor(128,0,0);
		$CI->fpdf->SetLineWidth(.3);
		$CI->fpdf->SetFont('Arial','B',10);
		$CI->fpdf->Cell(20,7,$header[0],1,0,'C',1);
		$CI->fpdf->Cell(80,7,$header[1],1,0,'C',1);
		$CI->fpdf->Cell(50,7,$header[2],1,0,'C',1);
		$CI->fpdf->Cell(20,7,$header[3],1,0,'C',1);
		$CI->fpdf->Cell(25,7,$header[4],1,0,'C',1);
		$CI->fpdf->Ln();
		//Restauración de colores y fuentes
		$CI->fpdf->SetFillColor(224,235,255);
		$CI->fpdf->SetTextColor(0);
		$CI->fpdf->SetFont('');
		//Datos
		foreach ($data as $resultado){ //usando los datos de mysql
			$CI->fpdf->Cell(20,5,$resultado['dni'],1,0,'C'); 
			$CI->fpdf->Cell(80,5,$resultado['nombrescompletos'],1,0,'L'); 
			$CI->fpdf->Cell(50,5,$resultado['nombrecarreraprofesional'],1,0,'C'); 
			$CI->fpdf->Cell(20,5,cicloRomano($resultado['numciclo']),1,0,'C'); 
			$CI->fpdf->Cell(25,5,$resultado['condicionfinal'],1,0,'C');
			$CI->fpdf->Ln(); // salto de linea		
			}
		$CI->fpdf->Cell(160,0,'','T');
	}

	function cicloRomano($ciclo){
		switch($ciclo)
		{
			case '1':return 'I';break;
			case '2':return 'II';break;
			case '3':return 'III';break;
			case '4':return 'IV';break;
			case '5':return 'V';break;
			case '6':return 'VI';break;
			case '7':return 'VII';break;
			case '8':return 'VIII';break;
			case '9':return 'IX';break;
			case '10':return 'X';break;
			case '11':return 'XI';break;
			case '12':return 'XII';break;
			default: return '-';break;
		}
	}
?>