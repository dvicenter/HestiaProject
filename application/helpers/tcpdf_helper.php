<?php
	
	function headerPDF($pCabecera,$pSubCabecera)
	{
		$CI = &get_instance();
        $CI->tcpdf->SetSubject('Reporte Hestia');
        $CI->tcpdf->SetAuthor('Hestia');
        $CI->tcpdf->SetHeaderData('', 0, $pCabecera,$pSubCabecera);
		$CI->tcpdf->setHeaderFont(Array('courier', '', '12'));
		$CI->tcpdf->SetHeaderMargin(5);
		$CI->tcpdf->SetMargins(15, 25, 10);
	}
	
	

	function footerPDF($pPie)
	{
		$CI = &get_instance();
		$CI->tcpdf->SetY(-15);
	    date_default_timezone_set('Etc/GMT+5');
		$CI->tcpdf->SetFooterData('','',$pPie);
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