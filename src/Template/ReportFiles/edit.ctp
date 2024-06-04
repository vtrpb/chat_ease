<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportFile $reportFile
 */

   use Cake\Core\Configure;
   use Cake\View\Helper;

   $domain = Configure::read('domain');

   $session      = $this->request->session();   
   $user_type_id = $session->read('Users.user_type_id');   
   $user_id      = $session->read('Users.id');  


?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"> <?= $this->Html->link($reportFile->report_id, '/Reports/edit/'.$reportFile->report_id) ?> </li>
            <li><strong> / </strong></li>
            <li>EDITAR ARQUIVO</li>
        </ul>                        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card card-danger">
                        <?= $this->Form->create($reportFile,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                        <div class="card-body">                                
                        <div class="row">                
                          <div class="col-md-8">                
                          <?php 
                                $ext         = substr(strtolower(strrchr($reportFile->filename, '.')), 1); //get the extension
                                $width_icon  = "80px";
                                $height_icon = "80px";
                                $width       = "600px";
                                $width_media = "180px";
                                $filename_id = "filename-".$reportFile->id;                        

                                // extensions array('jpeg', 'jpg', 'gif', 'png', 'pdf', 'tif', 'tiff', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'csv', 'numbers', 'ppt', 'pptx', 'mp3','wav','ogg');
                                switch ($ext) {                      
                                    case "jpeg":                            
                                        echo "<td><img  src=" . $domain . "/report_files/".$reportFile->filename." class=\"img-thumbnail\" style=\"width:100%;max-width:$width\"  id=\"$reportFile->id\" alt=\"".$reportFile->name."\">" . "</td>";
                                        break;
                                    case "jpg":                                                            
                                        echo "<td><img  src=" . $domain . "/report_files/".$reportFile->filename." class=\"img-thumbnail\" style=\"width:100%;max-width:$width\"  id=\"$reportFile->id\"  alt=\"".$reportFile->name."\">" . "</td>";
                                        break;
                                    case "gif":
                                        echo "<td><img  src=" . $domain . "/report_files/".$reportFile->filename." class=\"modal-image\" id=\"$reportFile->id\"  alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($reportFile->id) >" . "</td>";
                                        break;
                                    case "png":
                                        echo "<td><img  src=" . $domain . "/report_files/".$reportFile->filename." class=\"modal-image\" id=\"$file->id\" alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id) >" . "</td>";
                                        break;
                                    case "html":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "htm":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "pdf":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pdf.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "zip":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-zip.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "tif":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-tiff.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "tiff":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-tiff.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "doc":
                                        echo "<td>" . $this->Html->link("<img  height=". $height_icon . " width=" . $width_icon . " src=" . $domain . "/img/icon-docx.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$reportFile->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "docx":
                                        echo "<td>" . $this->Html->link("<img  height=". $height_icon . " width=" . $width_icon . " src=" . $domain . "/img/icon-docx.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$reportFile->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "txt":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-txt.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "xls":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-xlsx.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "xlsx":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-xlsx.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "csv":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-csv.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "numbers":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-numbers.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "ppt":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pptx.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$reportFile->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "pptx":
                                        echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pptx.png" . " class=\"img-responsive\" title=\"".$reportFile->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$reportFile->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                        break;
                                    case "mp3":                            
                                        echo "<td><audio controls src=" . $domain . "/report_files/".$reportFile->filename." width=$width></audio>" . "</td>";                            
                                        break;
                                    case "wav":                            
                                        echo "<td><audio controls src=" . $domain . "/report_files/".$reportFile->filename." style=\"width:$width_media\" ></audio>" . "</td>";                            
                                        break;
                                    case "mp4":                            
                                        echo "<td><video controls src=" . $domain . "/report_files/".$reportFile->filename." style=\"width:$width_media\"></video>" . "</td>";                            
                                        break;
                                    default:
                                        # code...
                                        break;
                                }
                            ?> 
                          </div>
                        </div>
                            <?php
                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('report_id',['label'=>'Laudo','required' => true,'class'=>'form-control'])."</div>";                                        
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('file_category',['label' => 'Categoria do arquivo','required' => true,'empty' => '(selecione uma categoria)',
                                                                                                                 'options' => [
                                                                                                                               1 => 'Imagens diversas',
                                                                                                                               2 => 'Anexo fotográfico',
                                                                                                                               3 => 'Ofício solicitante',
                                                                                                                               4 => 'Áudio',
                                                                                                                               5 => 'Vídeo',
                                                                                                                               6 => 'Contraprova (.pdf)',
                                                                                                                               7 => 'Contraprova (.html)',
                                                                                                                               8 => 'Contraprova (.zip)',
                                                                                                                               99 => 'Arquivos diversos'
                                                                                                                               ],
                                                                                                                    'class'=>'form-control'])."</div>";                                                   
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('date_of_document',['label'=>'Data do Documento (Ex.: date do exame, data da foto, data da verificação da glicemia,etc...) ','required' => true,'placeholder' => 'Data de documento (dd/mm/AAAA)','type'=>'text','class'=>'form-control date-select'])."</div>";                                        
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->control('name',['label'=>'Nome para o arquivo','placeholder' => 'nome para o arquivo','class'=>'form-control'])."</div>";                                        
                                  echo "</div>";                                  
                                  

                                  echo "<div><p> </p></div>";
                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                  echo "</div>";                                
                                
                            ?>                                                
                        <?= $this->Form->end() ?>                                            

                      </div>

                </div>
            </div>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->