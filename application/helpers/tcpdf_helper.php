<?php
	
	function headerPDF()
	{
		$CI = &get_instance();
		$image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}
	
	

	function footerPDF()
	{
		$CI = &get_instance();
		$CI->tcpdf->SetY(-15);
	    //Arial italic 8
	    $CI->tcpdf->SetFont('','I',8);
	    //Número de página
	   	$CI->tcpdf->Cell(0,10,'Page '.$CI->tcpdf->PageNo().'/{nb}',0,0,'C');
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