<?php   
    

    use Cake\Core\Configure;

    $domain = Configure::read('domain');      

    define('GEDI_PATH_IMAGES', $domain);

    class report extends TCPDF {        

        protected $report_number;
        protected $sector_name;
        protected $sector_alias;
        protected $subsector_name;
        protected $subsector_alias;

        public function SetReportNumber($report_number = null)  {
            $this->report_number = $report_number;
        }
        public function SetSector($sector_name = null, $sector_alias = null)  {
            $this->sector_name  = $sector_name;
            $this->sector_alias = $sector_alias;
        }
        public function SetSubsector($subsector_name = null, $subsector_alias = null)  {
            $this->subsector_name  = $subsector_name;
            $this->subsector_alias = $subsector_alias;
        }
        
        //Page header
        public function Header() {         

            $brasao_estado     = GEDI_PATH_IMAGES.'/img/'.'brasao_estado.jpg';    
            $brasao_unintelpol = GEDI_PATH_IMAGES.'/img/'.'brasao_unintelpol.jpg';    
            
            //$pdf->Image($brasao_unintelpol ,5, 5,20,21, 'jpg','', 'T',2, 100, 'C', false, false, 0, false, false, false);    
            $this->Image(htmlspecialchars($brasao_unintelpol),10,5,20,21, 'jpg','', 'T',2, 100, 'C', false, false, 0, false, false, false); 

            $this->SetTextColor(255,0,0);
            $this->writeHTMLCell(180, '', '',2,'RESERVADO', 0, 0, false, true, 'C');
            $this->SetTextColor(0,0,0);

            $header_html = "<p align=\"center\">GOVERNO DA PARAÍBA<br>
                                                SECRETARIA DE ESTADO DA SEGURANÇA E DA DEFESA SOCIAL<br>
                                                Delegacia Geral de Polícia Civil<br>
                                                Unidade de Inteligência da Polícia Civil - UNINTELPOL<br>
                                                ".$this->sector_name." - ".$this->sector_alias."<br>"
                                                .$this->subsector_name." - ".$this->subsector_alias."</p>";

            $this->SetFont('times', 'B', 10);
            $this->writeHTMLCell(180, '', '', $this->getY()+22, $header_html, 0, 0, false, true, 'C');

        }

        // Page footer
        public function Footer() {
            $confidentiality = "“O sigilo deste documento é protegido e controlado pela Lei Nº 12.527/2011. A divulgação, revelação, o fornecimento, a utilização ou a reprodução desautorizada de seu conteúdo, a qualquer tempo, meio e modo, responsabilidades penais, civis e administrativas.”";
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);            
            $this->Cell(0, 10, $confidentiality, 1, false, 'C', 0, '', 0, false, 'T', 'M');
            // Page number
            $this->Cell(0, 10, 'SEDS - RELATÓRIO '.$this->report_number.' - Página '. $this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            
        }

    }    

    $pdf = new report(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    

    $pdf->SetReportNumber($report_number);
    $pdf->SetSector($sector_name,$sector_alias);
    $pdf->SetSubsector($subsector_name,$subsector_alias);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('G.E.D.I');
    $pdf->SetTitle('RELATÓRIO '. $report_number);

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));



    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetMargins(PDF_MARGIN_LEFT, 55, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(35);
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
    if ($cover)  {

        $pdf->AddPage();
        $pdf->SetPrintFooter(false);          

        $curNtDateTime = explode(' ', Date('d-m-Y H:i:s'));
        $curDate = $curNtDateTime[0];
        $curTime = $curNtDateTime[1];

           /* $brasao_estado     = GEDI_PATH_IMAGES.'/img/'.'brasao_estado.jpg';    
            $brasao_unintelpol = GEDI_PATH_IMAGES.'/img/'.'brasao_unintelpol.jpg';    

            //debug($brasao_unintelpol) or die();

            //$pdf->Image($brasao_unintelpol ,5, 5,20,21, 'jpg','', 'T',2, 100, 'C', false, false, 0, false, false, false);    
            $pdf->Image(htmlspecialchars($brasao_unintelpol),10,5,20,21, 'jpg','', 'T',2, 100, 'C', false, false, 0, false, false, false); 

            $pdf->SetTextColor(255,0,0);
            $pdf->writeHTMLCell(180, '', '', $pdf->getY()+5,'RESERVADO', 0, 0, false, true, 'L');
            $pdf->SetTextColor(0,0,0);*/
            

      /*
            GOVERNO DA PARAÍBA
            SECRETARIA DE ESTADO DA SEGURANÇA E DA DEFESA SOCIAL    
            Delegacia Geral de Polícia Civil
            Unidade de Inteligência Policial – UNINTELPOL
            Unidade de Análise, Busca Eletrônica e Acompanhamento de Crimes de Alta Tecnologia*/
            /*$header_html = "<p align=\"center\">GOVERNO DA PARAÍBA<br>
                                                SECRETARIA DE ESTADO DA SEGURANÇA E DA DEFESA SOCIAL<br>
                                                Delegacia Geral de Polícia Civil<br>
                                                Unidade de Inteligência da Polícia Civil - UNINTELPOL<br>
                                                $sector_name - $sector_alias<br>
                                                $subsector_name - $subsector_alias</p>";

            $pdf->SetFont('times', 'B', 10);
            $pdf->writeHTMLCell(180, '', '', $pdf->getY()+21, $header_html, 0, 0, false, true, 'L');*/


        

        
        //RELATÓRIO TÉCNICO Nº 002/2022/NICCPATRI/UNABE/UNINTELPOL/DGPC/SEDS/PB
        //Relatório Técnico N.9999/2022//UNICON//DGPC/SEDS/PB

        /*debug($core_alias);
        debug($subsector_alias);
        debug($sector) or die();*/

        $report_html = "<b>$report_type_name N.".$report_number."/$core_alias/$subsector_alias/$sector_alias/UNINTELPOL/DGPC/SEDS/PB</b>";    
        $pdf->SetY(-180);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('times', '', 12);
        $pdf->writeHTMLCell(180, '', '',65, $report_html, 0, 0, false, true, 'R');

        //$title_html = "<h3>$requesting_exam</h3>";    
        //$pdf->writeHTMLCell(180, '', '', $pdf->getY()+30, $title_html, 0, 0, false, true, 'C');

        //$center_html = "AUTORIDADE SOLICITANTE: " . $requesting_authority ."<br>" . $requesting_authority_type . "<br>";
        //$center_html.= $destination_organ . "<br>";

        //$pdf->writeHTMLCell(180, '', '', $pdf->getY()+100, $center_html, 0, 0, false, true, 'L');

        /*$center_html = "PERITO(A): " . $expert ."<br>";
        if ($attachment != '')  {
            $center_html.= "ANEXO: " . $attachment;
        }*/
        
            

        //$pdf->writeHTMLCell(180, '', '', $pdf->getY()+30, $center_html, 0, 0, false, true, 'L');
    }

    // Report Begins    
    //$pdf->AddPage();
    $pdf->SetPrintFooter(true);

    // Data por extenso
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

/*
    $requesting_date_extenso =  utf8_encode(strftime('%A, %d de %B de %Y', strtotime($requesting_date)));
    $protocol_date_extenso   =  utf8_encode(strftime('%A, %d de %B de %Y', strtotime($protocol_date)));    
    $today_date_extenso      =  utf8_encode(strftime('%d de %B de %Y'    , strtotime(date("m/d/Y"))));    

    $requesting_historic_html = "<h3 align=\"center\"><u>LAUDO ($requesting_exam) NÚMERO $report_number</u></h3><br><p align=\"justify\">Aos <b>$protocol_date_pt_br</b> ($protocol_date_extenso) nesta cidade de $conf_city, e no <b>$conf_core do Instituto de Polícia Científica do Estado da Paraíba</b>, em conformidade com a legislação e os dispositivos regulamentares vigentes, foi designado pelo Chefe do $conf_core_alias DR(A). $conf_core_chief, o(a) Perito(a) Oficial Criminal <b>$expert</b> para proceder ao $requesting_exam, a fim de ser atendida a solicitação do(a) $requesting_authority_type, $requesting_authority da(o) $requesting_organ, feita através da requisição nº $requesting_number, datada de $requesting_date_pt_br, sendo protocolada neste Instituto de Polícia Científica em $protocol_date_pt_br.</p>";*/

    
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('times','', 11);   

    //$pdf->writeHTMLCell(180, '', '', '', $requesting_historic_html, 0, 0, false, true, 'L');
    
    $pdf->SetY(80);
    $pdf->SetFont('times', '', 11);

   
    $report_content = $report;

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');


    $report_date_judicial_order_extenso =  utf8_encode(strftime('%A, %d de %B de %Y', strtotime($report_date_judicial_order)));

    $report_content = str_replace('$dataAtual'                ,date('d/m/Y')                ,$report_content);
    $report_content = str_replace('$assunto'                  ,$report_subject              ,$report_content);
    $report_content = str_replace('$origem'                   ,$report_origin               ,$report_content);
    $report_content = str_replace('$difusao'                  ,$report_difusion             ,$report_content);
    $report_content = str_replace('$difusaoAnterior'          ,$report_difusion_previous    ,$report_content);    
    $report_content = str_replace('$referencia'               ,$report_reference            ,$report_content);
    $report_content = str_replace('$anexos'                   ,$report_attachment           ,$report_content);
    $report_content = str_replace('$numDePaginas'             ,$report_number_of_pages      ,$report_content);
    $report_content = str_replace('$relatorioNum'             ,$report_number               ,$report_content);        
    $report_content = str_replace('$numOrdemJudicial'         ,$report_number_judicial_order,$report_content);    
    $report_content = str_replace('$autoridade'               ,$report_judicial_order_name  ,$report_content);
    $report_content = str_replace('$dataOrdemJudicialExtenso' ,$report_date_judicial_order_extenso  ,$report_content);    
    $report_content = str_replace('$numProcesso'              ,$report_process_number       ,$report_content);    
    $report_content = str_replace('$comarca'                  ,$report_court                ,$report_content);    
    $report_content = str_replace('$vara'                     ,$report_district             ,$report_content);    

    $html = "<br>"; 

    $html.= $report_content;       


    //
    //debug($report_photos) or die();
    if ($photographic_attachment)  {                        
        $cont = 1;
        $html.= "<table>";        
        foreach ($report_photos as $file)  {                        
            $html.= '<tr align="center"><td><img src="'.GEDI_PATH_IMAGES . "/report_files/".$file->filename.'" class="img-thumbnail" width=100% height=100%><br><figcaption><b>Imagem '.$cont.'.</b> '.$file->name.' (Data: <time>'.$file->created.'</time>).<br><b>Hash SHA256:</b> <i>'.hash_file('sha256',GEDI_PATH_IMAGES . "/report_files/".$file->filename).'</i>.</figcaption></td></tr><tr><td></td></tr>';

            $cont++;
        }
        $html.= "</table>";        
    }
    //

    //$html.= "<p align=\"right\"><b>João Pessoa, $today_date_extenso. </b></p><p></p><p></p>";
   // $html.= "<br><p align=\"center\">________________________________________________<br>". $expert . '<br>'. 'PERITO OFICIAL CRIMINAL';

    /* api-key: a8b6424e-18f5-4e7c-81ac-dcfe71ea6a67*/

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->SetY(230);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('times', '', 11);        

    $pdf->lastPage();
    // ---------------------------------------------------------

    //Close and output PDF document
    ob_end_clean();
    $pdf->Output($report_type_name.' ' . $report_number . '.pdf', 'I');

    mb_internal_encoding('UTF-8');

    //============================================================+
    // END OF FILE
    //============================================================+

    ?>




