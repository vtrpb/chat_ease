<?php
    
    //define('K_PATH_IMAGES', '/path/to/images/');

    class report extends TCPDF {        

        protected $report_number;

        public function SetReportNumber($r)  {
            $this->report_number = $r;
        }
        
        //Page header
        public function Header() {
            // Logo
            $image_file = K_PATH_IMAGES.'logo_ipc.png';
            //$image_file = 'images\logo.png';
            //debug($image_file) or die();
            //$this->Image($image_file, 0, 5,20,21, 'PNG','', 'T',2, 100, 'C', false, false, 0, false, false, false);
            // Set font
            //$this->SetFont('times', 'B', 14);
            // Title
           /* $this->SetXY(10,30,true);
            $this->Cell(0, 15, 'Governo do Estado da Paraíba', 0, 1, 'C', 0, '', 0, false, 'M', 'M');        
            $this->Cell(0, 15, 'Secretaria de Estado da Segurança e Defesa Social', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
            $this->Cell(0, 15, 'Instituto de Polícia Científica', 0, 1, 'C', 0, '', 0, false, 'M', 'M'); */
        }

        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'IPC/PB - Laudo '.$this->report_number.' - Página '. $this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            
        }

    }    

    $pdf = new report(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    

    $pdf->SetReportNumber($report_number);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('');
    $pdf->SetTitle('LAUDO '. $report_number);

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));



    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(15);
    //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------
    // Cover Page
    $pdf->AddPage();
    $pdf->SetPrintFooter(false);     
     

    $curNtDateTime = explode(' ', Date('d-m-Y H:i:s'));
    $curDate = $curNtDateTime[0];
    $curTime = $curNtDateTime[1];

    $image_file_logo_pc = K_PATH_IMAGES.'logo_ipc.png';    
    $image_file_logo_ipc = K_PATH_IMAGES.'logo_ipc.png';    

    $pdf->Image($image_file_logo_pc , 5, 5,20,21, 'PNG','', 'T',2, 100, 'C', false, false, 0, false, false, false);    
    $pdf->Image($image_file_logo_ipc, 10, 5,20,21, 'PNG','', 'T',2, 100, 'C', false, false, 0, false, false, false);    
    

    $header_html = "<p align=\"center\">Governo do Estado da Paraíba<br>Secretaria de Estado da Segurança e Defesa Social<br>Instituto de Polícia Científica<br>$conf_core</p>";

    $pdf->SetFont('times', 'B', 16);
    $pdf->writeHTMLCell(180, '', '', $pdf->getY()+25, $header_html, 0, 0, false, true, 'L');

    $pdf->SetY(-200);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('times', '', 12);

    $report_html = "<h2><b>LAUDO ".$report_number."</b></h2>";    
    $pdf->writeHTMLCell(180, '', '',70, $report_html, 0, 0, false, true, 'R');

    $title_html = "<h3>EXAME TÉCNICO-PERICIAL EM DISPOSITIVOS ELETRÔNICOS</h3>";    
    $pdf->writeHTMLCell(180, '', '', $pdf->getY()+30, $title_html, 0, 0, false, true, 'C');

    $center_html = "AUTORIDADE SOLICITANTE: " . $requesting_authority ."<br>" . $requesting_authority_type . "<br>";
    $center_html.= $destination_organ . "<br>";

    $pdf->writeHTMLCell(180, '', '', $pdf->getY()+100, $center_html, 0, 0, false, true, 'L');

    $center_html = "PERITO(A): " . $expert ."<br>";
    $center_html.= "ANEXO: " . $attachment;
        

    $pdf->writeHTMLCell(180, '', '', $pdf->getY()+30, $center_html, 0, 0, false, true, 'L');

    // Report Begins
    // Start First Page Group
    //$pdf->startPageGroup();
    $pdf->AddPage();
    $pdf->SetPrintFooter(true);

    // Data por extenso
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');


    $requesting_date_extenso =  utf8_encode(strftime('%A, %d de %B de %Y', strtotime($requesting_date)));
    $protocol_date_extenso   =  utf8_encode(strftime('%A, %d de %B de %Y', strtotime($protocol_date)));    
    $today_date_extenso      =  utf8_encode(strftime('%d de %B de %Y'    , strtotime(date("m/d/Y"))));    

    $requesting_historic_html = "<h3 align=\"center\"><u>LAUDO DE EXAME TÉCNICO-PERICIAL EM DISPOSITIVOS ELETRÔNICOS NÚMERO $report_number</u></h3><br><p align=\"justify\">Aos <b>$protocol_date_pt_br</b> ($protocol_date_extenso) nesta cidade de João Pessoa/PB, e no <b>Núcleo de Criminalística de João Pessoa do Instituto de Polícia Científica do Estado da Paraíba</b>, em conformidade com a legislação e os dispositivos regulamentares vigentes, foi designado pelo Chefe do NUCRIM/JP DR. $conf_core_chief, o(a) Perito(a) Oficial Criminal <b>$expert</b> para proceder ao $requesting_exam, a fim de ser atendida a solicitação do(a) $requesting_authority_type, $requesting_authority da(o) $requesting_organ, feita através da requisição nº $requesting_number, datada de $requesting_date_pt_br, sendo protocolada neste Instituto de Polícia Científica em $protocol_date_pt_br.</p>";

    //$pdf->SetY(80);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('times','', 11);

   // debug($requesting_historic_html) or die();

    $pdf->writeHTMLCell(180, '', '', '', $requesting_historic_html, 0, 0, false, true, 'L');

    $pdf->SetY(80);
    $pdf->SetFont('times', '', 11);

    $html = "<br>";  
    $html.= $report_content;   
    $html.= "<p align=\"right\"><b>João Pessoa, $today_date_extenso. </b></p><p></p><p></p>";
    $html.= "<br><p align=\"center\">________________________________________________<br>". $expert . '<br>'. 'PERITO OFICIAL CRIMINAL';

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->SetY(230);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('times', '', 11);        

    $pdf->lastPage();
    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('Laudo ' . $report_number . '.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+

    ?>




