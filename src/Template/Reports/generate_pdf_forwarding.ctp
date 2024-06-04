<?php

    use Cake\Core\Configure;

    $domain = Configure::read('domain');      

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
            //$this->Cell(0, 10, 'IPC/PB - Laudo '.$this->report_number.' - Página '. $this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            
        }

    }    

    $pdf = new report(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    

    $pdf->SetReportNumber($report_number);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('');
    $pdf->SetTitle('ENCAMINHAMENTO '. $report_number);

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



/////////////////////////////////////////////////////////////////////

$tratamento1 = '';
$tratamento2 = '';
$tratamento3 = '';

if ($requesting_authority_type == 'DELEGADO(A) DE POLÍCIA CIVIL')      $tratamento1 = 'Senhor(a)';
if ($requesting_authority_type == 'DELEGADO(A) DE POLÍCIA FEDERAL')    $tratamento1 = 'Senhor(a)';
if ($requesting_authority_type == 'JUIZ(A) DE DIREITO')                $tratamento1 = 'Excelentíssimo(a) Senhor(a)';
if ($requesting_authority_type == 'PROMOTOR(A) DE JUSTIÇA')               $tratamento1 = 'Excelentíssimo(a) Senhor(a)';
if ($requesting_authority_type == 'PERITO(A)')                         $tratamento1 = 'Senhor(a)';
if ($requesting_authority_type == 'OUTROS')                            $tratamento1 = 'Senhor(a)';

if ($requesting_authority_type == 'DELEGADO(A) DE POLÍCIA CIVIL')      $tratamento2 = 'a Vossa Senhoria';
if ($requesting_authority_type == 'DELEGADO(A) DE POLÍCIA FEDERAL')    $tratamento2 = 'a Vossa Senhoria';
if ($requesting_authority_type == 'JUIZ(A) DE DIREITO')                   $tratamento2 = 'a Vossa Excelência';
if ($requesting_authority_type == 'PROMOTOR(A) DE JUSTIÇA')               $tratamento2 = 'a Vossa Excelência';
if ($requesting_authority_type == 'PERITO(A)')                         $tratamento2 = 'a Vossa Senhoria';
if ($requesting_authority_type == 'OUTROS')                            $tratamento2 = 'a Vossa Senhoria';


if ($requesting_authority_type == 'DELEGADO(A) DE POLÍCIA CIVIL')      $tratamento3 = 'DELEGADO(A) DE POLÍCIA CIVIL';
if ($requesting_authority_type == 'DELEGADO(A) DE POLÍCIA FEDERAL')    $tratamento3 = 'DELEGADO(A) DE POLÍCIA FEDERAL';
if ($requesting_authority_type == 'JUIZ(A) DE DIREITO')                $tratamento3 = 'JUIZ(A) DE DIREITO';
if ($requesting_authority_type == 'PROMOTOR(A) DE JUSTIÇA')            $tratamento3 = 'PROMOTOR DE JUSTIÇA';
if ($requesting_authority_type == 'PERITO(A)')                         $tratamento2 = 'PERITO(A) OFICIAL CRIMINAL';
if ($requesting_authority_type == 'OUTROS')                            $tratamento3 = 'AUTORIDADE SOLICITANTE';

//$pdf->SetFont('times', 'BI', 14);

// add a page
$pdf->AddPage();
$pdf->SetPrintFooter(false);     

$image_file = K_PATH_IMAGES.'logo_ipc.png';    
$pdf->Image($image_file, 0, 5,20,21, 'PNG','', 'T',2, 100, 'C', false, false, 0, false, false, false);        
$header_html = "<p align=\"center\">Governo do Estado da Paraíba<br>Secretaria de Estado da Segurança e Defesa Social<br>Instituto de Polícia Científica<br>$conf_core</p>";
$pdf->SetFont('times', 'B', 16);
$pdf->writeHTMLCell(180, '', '', $pdf->getY()+25, $header_html, 0, 0, false, true, 'L');

$curNtDateTime = explode(' ', Date('d-m-Y H:i:s'));
$curDate = $curNtDateTime[0];
$curTime = $curNtDateTime[1];


$centerhtml = "Ofício Número _________/". date('Y') ;

$pdf->SetY(-215);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(-250, '', '', '', $centerhtml, 0, 0, false, true, 'L');


$pdf->SetFont('times', '', 11);
// set some text to print
$html = "

<br><br><br><br><br><br>







";

$html.= '<h4 align=\'center\'>                                                                                                                                      ' . 'João Pessoa' . ', ' . date('d/m/Y') . '.</h4>';


$date_of_resquest = $requesting_date;
$received_by_expert = $protocol_date;



$destination = $requesting_organ;



$html .= "A(o) " . $tratamento1 . ", <br>";
$html .=  "<b>".$requesting_authority . '</b><br>';
$html .=  $tratamento3 . '<br>';
$html .=  $destination_organ . '<br><br>';

$html .=  "Assunto: <u>Encaminhamento de Laudo Pericial</u>";

$html.= '<p align=\"justify\">' . $tratamento1 . ' ' . $requesting_authority_type . ',<br><br><br><br>

Estamos encaminhando ' . $tratamento2 . ', o Laudo de Exame Técnico-Pericial de número <b>'. $report_number .  '</b>, requisitado através do ofício ' . $requesting_number . ', de ' . $requesting_date_pt_br . ', protocolado neste '. $conf_core . ' em ' . $protocol_date_pt_br . '.<br><br><br><br><br>

Atenciosamente,';


$assinante = 'GERENTE OPERACIONAL ';

$pdf->writeHTML($html, true, false, true, false, '');

$html = "________________________________________________<br>". $conf_operational_manager . '<br>'. $assinante.'<br>'. $conf_core;

$pdf->SetY(230);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('times', '', 11);
$pdf->writeHTMLCell(-250, '', '', '', $html, 0, 0, false, true, 'C');


$pdf->lastPage();
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('ENCAMINHAMENTO_LAUD0_' . $report_number. '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>