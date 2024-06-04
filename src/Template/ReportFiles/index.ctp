
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportFile[]|\Cake\Collection\CollectionInterface $reportFiles
 */

use Cake\Core\Configure;      
$domain     = Configure::read('domain');
$user_id    = $this->request->getSession()->read('Users.id');
$user_role  = $this->request->getSession()->read('Users.role'); 
$username   = $this->request->getSession()->read('Users.name'); 

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("DOCUMENTOS", '/Reports/index') ?></li>
                <li><strong> / </strong></li> 
                <li> <?= $this->Html->link($report_id, '/Reports/edit/'.$report_id) ?> </li>
                <li><strong> / </strong></li>
                <li>ARQUIVOS DO DOCUMENTO</li>
            </ul>        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <ul class="list-inline">        
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Detalhar"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> ARQUIVO</button>',['controller' => 'ReportFiles','action' => 'add',$report_id],['escape' => false]); ?>
                </ul>                                    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Arquivo...','class'=>'form-control']);
                            ?>
                            <div class="form-group">
                                    <br>
                                    <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="nav-icon fas fa-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'ReportFiles','action' => 'index'],['escape' => false]); ?>
                            </div>  
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render() ?> 
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('report_number','Relatório') ?></th>                
                                    <th scope="col"><?= $this->Paginator->sort('file_category','Categoria') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('name','Nome do arquivo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('filename','Arquivo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('link','Link') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('date_of_document','Data Doc.') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created','Enviado') ?></th>
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reportFiles as $file): ?>
                                         <tr>
                                                <!--<td><?= $this->Number->format($file->id) ?></td>-->
                                                <td><?= h($file->report->report_number) ?></td>                
                                                <?php                  
                                                    switch ($file->file_category) {
                                                        case 1:
                                                            echo "<td> ".  "Imagens diversas" . "</td>";
                                                            break;
                                                        case 2:
                                                            echo "<td> ".  "Anexo fotográfico" . "</td>";
                                                            break;
                                                        case 3:
                                                            echo "<td> ".  "Ofício solicitante" . "</td>";
                                                            break;                        
                                                        case 4:
                                                            echo "<td> ".  "Áudio" . "</td>";
                                                            break;
                                                        case 5: 
                                                            echo "<td> ".  "Vídeo" . "</td>";
                                                            break;
                                                        case 6: 
                                                            echo "<td> ".  "Contraprova (.pdf)" . "</td>";
                                                            break;
                                                        case 7: 
                                                            echo "<td> ".  "Contraprova (.html)" . "</td>";
                                                            break;
                                                        case 8: 
                                                            echo "<td> ".  "Contraprova (.zip)" . "</td>";
                                                            break;
                                                        case 99: 
                                                            echo "<td> ".  "Arquivos diversos" . "</td>";
                                                            break;
                                                    }
                                                ?>
                                                
                                                <?php 

                                                    $size_text_theme = strlen($file->name);

                                                    if ($size_text_theme > 15)  {
                                                        echo '<td> <a href=\'\' data-toggle=\'tooltip\' title= \''.$file->name.'\' class=\'fichario\'>'.h(substr($file->name,0,15).'...' ) .'</a>&nbsp;</td>';

                                                    }
                                                    else  {

                                                        echo '<td> '.  h(substr($file->name,0,15)) . '&nbsp;</td>';

                                                    }

                                                ?>                          
                                                <?php 

                                                    $ext         = substr(strtolower(strrchr($file->filename, '.')), 1); //get the extension
                                                    $width       = "180px";
                                                    $width_media = '180px';
                                                    $height      = "180px";
                                                    $filename_id = 'filename-'.$file->id;                        

                                                    // extensions array('jpeg', 'jpg', 'gif', 'png', 'pdf', 'tif', 'tiff', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'csv', 'numbers', 'ppt', 'pptx', 'mp3','wav','ogg');
                                                    switch ($ext) {                      
                                                        case "jpeg":
                                                            //echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"image-fluid\" id=\"$file->id\" alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id)>" . "</td>";
                                                            echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"img-thumbnail\" style=\"width:100%;max-width:$width\"  id=\"$file->id\" alt=\"".$file->name."\">" . "</td>";
                                                            break;
                                                        case "jpg":
                                                        //<img src="..." class="img-fluid" alt="Responsive image">         
                                                            //echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"image-fluid\" id=\"$file->id\"  alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id)>" . "</td>";
                                                        echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"img-thumbnail\" style=\"width:100%;max-width:$width\"  id=\"$file->id\"  alt=\"".$file->name."\">" . "</td>";
                                                            //echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"image-fluid\" id=\"$file->id\"  alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id)>" . "</td>";
                                                            break;
                                                        case "gif":
                                                            echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"modal-image\" id=\"$file->id\"  alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id) >" . "</td>";
                                                            break;
                                                        case "png":
                                                            echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"modal-image\" id=\"$file->id\" alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id) >" . "</td>";
                                                            break;
                                                        case "pdf":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pdf.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "html":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "htm":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "zip":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-zip.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "tif":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-tiff.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "tiff":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-tiff.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "doc":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-docx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "docx":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-docx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "txt":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-txt.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "xls":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-xlsx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "xlsx":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-xlsx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "csv":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-csv.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "numbers":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-numbers.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "ppt":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pptx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "pptx":
                                                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pptx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            break;
                                                        case "mp3":
                                                            //echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-mp3.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            echo "<td><audio controls src=" . $domain . "/report_files/".$file->filename." width=$width></audio>" . "</td>";                            
                                                            break;
                                                        case "wav":
                                                            //echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-wav.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                                                            echo "<td><audio controls src=" . $domain . "/report_files/".$file->filename." style=\"width:$width_media\" ></audio>" . "</td>";                            
                                                            break;
                                                        case "mp4":                            
                                                            echo "<td><video controls src=" . $domain . "/report_files/".$file->filename." style=\"width:$width_media\"></video>" . "</td>";                            
                                                            break;
                                                        default:
                                                            # code...
                                                            break;
                                                    }

                                                ?>                                                  
                                                <td><?= $this->Form->input('filename',['label'=>false,'readonly'=>'readonly','id'=>$filename_id,'value'=>$domain.'/report_files/'.$file->filename,'style'=>'width:40px;','form-control'=>'form-control']);  ?></td>
                                                <td><?php if(!is_null($file->date_of_document)) { echo h($file->date_of_document->i18nFormat('dd/MM/yy')); } ?></td>
                                                <td><?php if(!is_null($file->created)) { echo h($file->created->i18nFormat('dd/MM/yy')); } ?></td>
                                                <!--<td><?php if(!is_null($file->modified)) { echo h($file->modified->i18nFormat('dd/MM/yy')); } ?></td>-->
                                                <?php

                                                    if ($user_role == 'analista' || $user_role == 'admin')   { 

                                                        echo "<td class=\"actions text-nowrap\" >";  

                                                        echo $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-save" title="Baixar arquivo original"></button> ',['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false])." ";                                                                          
                                                        echo "<button type=\"button\" class=\"btn btn-primary btn-sm nav-icon fas fa-file-image\" id=$filename_id data-filename = ".$domain.'/report_files/'.$file->filename." title=\"Copia link do arquivo\" onclick=copyToClipboard(this.id)></button>"." ";

                                                        echo $this->Html->link('<button type="button" class="btn btn-info btn-sm nav-icon fas fa-edit" title="Editar"></span></button>',['controller' => 'ReportFiles','action' => 'edit',$file->id,$report_id],['escape' => false])." ";                         

                                                        echo $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Deletar arquivo" ></button> ',['controller'=>'ReportFiles','action' => 'removeFile',$file->id,$report_id],['escape' => false,'confirm' => 'Tem certeza que deseja deletar esse arquivo?']);  
                                                        
                                                        echo "</td>";
                                                    }
                                                ?>
                                            </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
                                <?= $this->Paginator->prev('< ' . __('anterior ')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__(' próximo') . ' > ') ?>
                                <?= $this->Paginator->last(__('último') . ' >> ') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registros, do total de  {{count}}.')] ) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.main-content -->
</div>
<!-- /.content-wrapper -->

<!-- Trigger the Modal -->
<!--<img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px">-->

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- The Close Button -->
  <span class="close">&times;</span>
  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">
  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>        


<script type="text/javascript">   

    function copyToClipboard(id) {      
      var copyText = document.getElementById(id);      
      copyText.select();
      //copyText.setSelectionRange(0, 99999); /*For mobile devices*/
      document.execCommand("copy");
      alert('Link copiado: ' + copyText.value);
    }

    function showModal(img_id)  {

        var modal = document.getElementById("myModal");
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img         = document.getElementById(img_id);
        var modalImg    = document.getElementById("img01");
        var captionText = document.getElementById("caption");     
        
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.addEventListener("click", function() {
                                          modal.style.display = "none";
                                        }  , false); 

    }
</script>