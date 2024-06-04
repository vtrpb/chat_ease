<?php   
    

    use Cake\Core\Configure;

    $domain = Configure::read('domain');      

    

    $header_html = "<p align=\"center\">Governo do Estado da Paraíba<br>Secretaria de Estado da Segurança e Defesa Social<br><br>$conf_core</p>";

    
    $report_html = "<h2><b>LAUDO ".$report_number."</b></h2>";    
    

    $title_html = "<h3>EXAME TÉCNICO-PERICIAL EM DISPOSITIVOS ELETRÔNICOS</h3>";        

    $center_html = "AUTORIDADE SOLICITANTE: " . $requesting_authority ."<br>" . $requesting_authority_type . "<br>";
    $center_html.= $destination_organ . "<br>";

    $center_html = "PERITO(A): " . $expert ."<br>";
    $center_html.= "ANEXO: " . $attachment;        

    $requesting_date_extenso =  utf8_encode(strftime('%A, %d de %B de %Y', strtotime($requesting_date)));
    $protocol_date_extenso   =  utf8_encode(strftime('%A, %d de %B de %Y', strtotime($protocol_date)));    
    $today_date_extenso      =  utf8_encode(strftime('%d de %B de %Y'    , strtotime(date("m/d/Y"))));    

    $requesting_historic_html = "<h3 align=\"center\"><u>LAUDO DE EXAME TÉCNICO-PERICIAL EM DISPOSITIVOS ELETRÔNICOS NÚMERO $report_number</u></h3><br><p align=\"justify\">Aos <b>$protocol_date_pt_br</b> ($protocol_date_extenso) nesta cidade de João Pessoa/PB, e no <b>Núcleo de Criminalística de João Pessoa do Instituto de Polícia Científica do Estado da Paraíba</b>, em conformidade com a legislação e os dispositivos regulamentares vigentes, foi designado pelo Chefe do NUCRIM/JP DR. $conf_core_chief, o(a) Perito(a) Oficial Criminal <b>$expert</b> para proceder ao $requesting_exam, a fim de ser atendida a solicitação do(a) $requesting_authority_type, $requesting_authority da(o) $requesting_organ, feita através da requisição nº $requesting_number, datada de $requesting_date_pt_br, sendo protocolada neste Instituto de Polícia Científica em $protocol_date_pt_br.</p>";    

    $html = "<br>";  
    $html.= $report_content;   

    //
    $width = 600;
    if ($photographic_attachment)  {        
       /* $html.= "<br><br><table>";        
        foreach ($report_photos as $file)  {            
            $html.= "<tr><td>Teste</td><td><img  src=" . $domain . "/report_files/".$file->filename." </td></tr>";
        }
        $html.= "</table>";*/
        foreach ($report_photos as $file)  {            

            //$img = $domain."/report_files/".$file->filename;                        
            $img = G_PATH_IMAGES."/report_files/".$file->filename;                        
            $ext = substr(strtolower(strrchr($file->filename, '.')), 1); //get the extension
            //debug(strupr($ext)) or die();
            //$pdf->Image($image_file_logo_pc , 5, 5,20,21, 'PNG','', 'T',2, 100, 'C', false, false, 0, false, false, false);    
            $pdf->Image($img, 10, 5,20,21,$ext, 'T',2, 100, 'C', false, false, 0, false, false, false);    
        }
    }
    //

    $html.= "<p align=\"right\"><b>João Pessoa, $today_date_extenso. </b></p><p></p><p></p>";
    $html.= "<br><p align=\"center\">________________________________________________<br>". $expert . '<br>'. 'PERITO OFICIAL CRIMINAL';

    /* api-key: a8b6424e-18f5-4e7c-81ac-dcfe71ea6a67*/

    ?>




