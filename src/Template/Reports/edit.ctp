<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */

use Cake\Core\Configure;   

$domain = Configure::read('domain');
$report_id = $report->id;
$report_number = $report->report_number;

$user_role    = $this->request->getSession()->read('Users.role'); 

?>

<!--<?= $this->Html->script('ckeditor5/ckeditor5-build-classic/ckeditor'); ?>
<?= $this->Html->script('ckeditor5/ckeditor5-build-classic/translations/pt'); ?>-->

<?= $this->Html->script('ckeditor5/ckeditor5-build-decoupled-document/ckeditor'); ?>
<?= $this->Html->script('ckeditor5/ckeditor5-build-decoupled-document/translations/pt-br'); ?>




<script> 
        
    var domain = '<?= $domain; ?>';
    var report = '<?= $report->report ?>';


    $(document).ready(function ($) { 

        //$("#report-number").mask('000', {reverse: false});        
        $("#report-number-judicial-order").mask('0000000-00.0000.0.00.0000', {reverse: false});
        $("#report-date-judicial-order").mask('00/00/0000', {reverse: false});            
        $("#report-number-judicial-order-previous").mask('0000000-00.0000.0.00.0000', {reverse: false});
        $("#report-process-number").mask('0000000-00.0000.0.00.0000', {reverse: false});        
        $("#report-date-judicial-order-previous").mask('00/00/0000', {reverse: false});
        $("#protocol-date").mask('00/00/0000', {reverse: false});
        $("#fact-date").mask('00/00/0000', {reverse: false});

        report_editor.setData(report);

        $("#report-templates").on('change',function() {                              

                if (window.confirm("Deseja altear esse DOCUMENTO para esse modelo (conteúdo do DOCUMENTO atual será perdido)?") ) {

                    var report_template_id = $('#report-templates :selected').val();

                    const url = domain + '/ReportTemplates/getById/' + report_template_id + '.json';

                    var jsonData = $.ajax({
                          url: url,
                          dataType: 'json',
                        }).done(function (results) {                                        
                              results["report_template"].forEach(function(template) {                                
                                    report_editor.setData(template.template);
                              });
                        }); 
                }
            
             /*$.confirm({
                        title: 'Alterar modelo',
                        content: 'Deseja altear esse DOCUMENTO para esse modelo (conteúdo do DOCUMENTO atual será perdido)?',
                        buttons: {
                            confirm: function () {                                   
                                var report_template_id = $('#report-templates :selected').val();

                                const url = domain + '/ReportTemplates/getById/' + report_template_id + '.json';

                                var jsonData = $.ajax({
                                      url: url,
                                      dataType: 'json',
                                    }).done(function (results) {                                        
                                          results["report_template"].forEach(function(template) {                                
                                                report_editor.setData(template.template);
                                          });
                                    });                                     
                            },
                            cancel: function () {
                                $.alert('Operação cancelada!');
                            }                                
                        }
            });  */          
        });

        $( "#form-report" ).submit(function( event ) {
                $('#hidden-report').val(report_editor.getData());
        });

        
    });

</script>

<<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("DOCUMENTOS", '/Reports/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>EDITAR DOCUMENTO</li>
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
                        <?= $this->Form->create($report,['id'=>'form-report','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                
                                // Shared fields
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">";
                                        echo "<div class=\"form-check form-check-inline\">".$this->Form->control('cover', ['label'=>['class'=>'form-check-label','for'=>'inlineCheckbox1','text'=>'Capa'],'type'=>'checkbox','div' => false,'class'=>'form-check-input','id'=>'inlineCheckbox1'])."</div>";
                                        echo "<div class=\"form-check form-check-inline\">".$this->Form->control('photographic_attachment', ['label'=>['class'=>'form-check-label','for'=>'inlineCheckbox2','text'=>'Anexo'],'type'=>'checkbox','div' => false,'class'=>'form-check-input','id'=>'inlineCheckbox2'])."</div>";
                                    echo "</div>";                                    
                                echo "</div>";                                    

                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">" . $this->Form->control('report_type_id',['label'=>'Tipo de Relatório','options'=>[1=>'RTEC',2=>'RTEC EXTRAÇ.',3=>'RLINT'],'div' => 'false','disabled'=>'disabled','class' => 'form-control'])."</div>";                                    
                                echo "</div>";
                                echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('core_id',['label'=>'Núcleo','options'=>$cores,'readonly'=>'readonly','div' => 'false','class' => 'form-control'])."</div>";                                        
                                echo "</div>";
                                echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('user_id',['label'=>'Analista','options'=>$users,'readonly'=>'readonly','div' => 'false','class' => 'form-control'])."</div>";                                        
                                echo "</div>";                                
                                if ($report_type_id != 3)  {
                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('operation_id',['label'=>'Operação','options'=>$operations,'div' => 'false','class' => 'form-control'])."</div>";                                        
                                    echo "</div>";                                
                                }
                                echo "<div class=\"row\">";                                                                            
                                        echo "<div class=\"col-8\">" . $this->Form->control('report_number',['label'=>'Rel.Téc.Núm.','type'=>'text','div' =>false,'class' => 'form-control'])."</div>";                                   
                                echo "</div>";
                                //

                                if ($report_type_id == 1 || $report_type_id == 2 )  { // RETC or RTEC EXTRAC.
                                    

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_subject',['label'=>'Assunto','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_origin',['label'=>'Origem','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                    echo "</div>";

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion',['label'=>'Difusão','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion_previous',['label'=>'Difusão Anterior','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";                                

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_number_judicial_order',['label'=>'Ordem Judicial','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_date_judicial_order',['label'=>'Data da Ordem Judicial','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_number_judicial_order_previous',['label'=>'Ordem Judicial Ant.','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_date_judicial_order_previous',['label'=>'Data da Ordem Judicial Ant.','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_court',['label'=>'Comarca','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_district',['label'=>'Vara','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-2\">" . $this->Form->control('report_reference',['label'=>'Referência','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_process_number',['label'=>'Núm.Processo','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_official_license_number',['label'=>'Núm.Alvará','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-2\">" . $this->Form->control('report_judicial_order_name',['label'=>'Juiz','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-8\">" . $this->Form->control('report_attachment',['label'=>'Anexo(s)','type'=>'textarea','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";
                                }

                                /*else if ($report_type_id == 2)  { // RETC EXTRACAO

                                }*/

                                else if ($report_type_id == 3)  { // RLINT

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_subject',['label'=>'Assunto','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_origin',['label'=>'Origem','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                    echo "</div>";

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion',['label'=>'Difusão','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion_previous',['label'=>'Difusão Anterior','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";                                


                                }                                

                               
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-8\">" . $this->Form->control('report_templates',['label'=>'Modelo(s) de Documento','type'=>'select','div' => false,'options'=>$report_templates,'required' => false,'empty'=>'(selecione o modelo)','class' => 'form-control'])."</div>";
                                echo "</div>";
                                echo "<br>";
                                echo "<div id=\"toolbar-container\"></div>";
                                echo "<div id=\"editor\" class=\"editor\"></div>";
                                echo $this->Form->hidden('hidden_report',['id'=>'hidden-report']);                                
                                echo"<p>
                                        <b>Observação:</b> Use o termo genérico a seguir para ser substituído pelo real no momento da geração do relatório:<code language=\"php\">\$dataAtual, \$assunto, \$origem, \$difusao, \$difusaoAnterior, \$referencia, \$anexos, \$numDePaginas, \$relatorioNum, \$numOrdemJudicial', \$autoridade, \$dataOrdemJudicialExtenso, \$numProcesso, \$comarca, \$vara. 
                                        </code>    
                                        </p>"; 
                                   
                                echo "<div class=\"row\"> </div>";                                    
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                echo "</div>";
                                
                                //echo $this->Form->control('report',['label'=>'Laudo','class' => 'report-editor','required' => false]);

                                //echo "</div>";
                              
                                //echo "</div>";
                                echo "</div>";
                            ?>
                        <!--</fieldset> -->
                        
                        <?= $this->Form->end() ?>                     
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class="users index large-9 medium-8 columns content">              
    <div class="breadcrumb-2">
        <ul class="breadcrumb">
            <li class="active">ARQUIVOS VINCULADOS AO DOCUMENTO</li>            
        </ul>
    </div>
    <div class="table-responsive">
    <table class="table">        
        <thead>
            <tr>                                 
                <th scope="col"><?= $this->Paginator->sort('file_category','Categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','Nome do arquivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filename','Arquivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link','Link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_document','Data Doc.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created','Enviado') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>-->
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>                          
            <?php foreach ($report->report_files as $file): ?>
            <?php if (!$file->canceled) : ?>
            <tr>
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
                            //echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"modal-image\" id=\"$file->id\" alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id)>" . "</td>";
                            echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"img-thumbnail\" style=\"width:100%;max-width:$width\"  id=\"$file->id\" alt=\"".$file->name."\">" . "</td>";
                            break;
                        case "jpg":                                
                            //echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"modal-image\" id=\"$file->id\"  alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id)>" . "</td>";
                            echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"img-thumbnail\" style=\"width:100%;max-width:$width\"  id=\"$file->id\"  alt=\"".$file->name."\">" . "</td>";
                            break;
                        case "gif":
                            echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"modal-image\" id=\"$file->id\"  alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id) >" . "</td>";
                            break;
                        case "png":
                            echo "<td><img  src=" . $domain . "/report_files/".$file->filename." class=\"modal-image\" id=\"$file->id\" alt=\"".$file->name."\" style=\"width:100%;max-width:$width\" onclick=showModal($file->id) >" . "</td>";
                            break;
                        case "html":
                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                            break;
                        case "htm":
                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
                            break;
                        case "pdf":
                            echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pdf.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]) . "</td>";
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

                <?php
/*
                    $session      = $this->request->session();
                    $user_type_id = $session->read('Users.user_type_id');

                    

                    if ($user_role == 'analista' || $user_role == 'admin')   { 

                        echo "<td class=\"actions text-nowrap\" >";  

                        echo $this->Html->link('<button type="button" class="btn btn-default btn-xs" title="Baixar arquivo original"><span class="glyphicon glyphicon-download-alt" aria-hidden="true" ></span></button> ',['controller'=>'ReportFiles','action' => 'downloadFile',$file->filename,$file->name,$ext],['escape' => false]);                          
                        
                        //echo "<button type=\"button\" class=\"btn btn-default btn-xs\" id=$filename_id data-filename = ".$domain.'/report_files/'.$file->filename." title=\"Copia link do arquivo\" onclick=copyToClipboard(this.id)><span class=\"glyphicon glyphicon-link\" aria-hidden=\"true\" ></span></button>";
                        echo "<button type=\"button\" class=\"btn btn-default btn-xs\" id=$filename_id data-filename = ".$domain.'/report_files/'.$file->filename." title=\"Copia link do arquivo\" onclick=copyToClipboard(this.id)><span class=\"glyphicon glyphicon-link\" aria-hidden=\"true\" ></span></button>";

                        echo $this->Html->link('<button type="button" class="btn btn-default btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></button>',['controller' => 'ReportFiles','action' => 'edit',$file->id,$report_id,$report_number],['escape' => false]);                          
                        echo $this->Form->postlink('<button type="button" class="btn btn-default btn-xs" title="Deletar arquivo" ><span class="glyphicon glyphicon-remove" aria-hidden="true" ></span></button> ',['controller'=>'ReportFiles','action' => 'removeFile',$file->id,$report_id,$report_number],['escape' => false,'confirm' => 'Tem certeza que deseja deletar esse arquivo?']);  
                        
                        echo "</td>";
                    }*/
                ?>
            </tr>            
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>   
</div> 


<!-- Trigger the Modal -->
<!--<img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px">-->



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


<!--<script>

    reportEditor = ClassicEditor.create(document.querySelector('.report-editor'),{ language: 'pt' })
      .then( newEditor => {
          report_editor = newEditor;
      } )
      .catch( error => {
          console.error( error );
      } );     


    var allEditors = document.querySelectorAll('.editor');

    for (var i = 0; i < allEditors.length; ++i) {
      ClassicEditor.create(allEditors[i],{ language: 'pt' });      
    }

</script>-->

<script>
    var domain = '<?= $domain; ?>';

    class MyUploadAdapter {

        constructor( loader ) {
            // The file loader instance to use during the upload.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {

            /*server.onUploadProgress( data => {
                loader.uploadTotal = data.total;
                loader.uploaded = data.uploaded;
            } );*/

            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        // Aborts the upload process.
        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open( 'POST', domain+'/img_uploaded/', true);
            xhr.responseType = 'json';
        }

        // Initializes XMLHttpRequest listeners.
        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            } );

            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        // Prepares the data and sends the request.
        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
            this.xhr.send( data );
        }
    }

    // ...

    function UploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }
   

    DecoupledEditor
        .create( document.querySelector( '.editor' ), { 
            //plugins: [ ImageResize],
            //plugins: [ SimpleUploadAdapter],
            extraPlugins: [ UploadAdapterPlugin],
            image: {
                // ...
                upload: {
                    panel: {
                        items: [ 'insertImageViaUrl' ]
                    }
                },
                /*resizeOptions: [
                    {
                        name: 'imageResize:original',
                        label: 'Original',
                        value: null
                    },
                    {
                        name: 'imageResize:50',
                        label: '50%',
                        value: '50'
                    },
                    {
                        name: 'imageResize:75',
                        label: '75%',
                        value: '75'
                    }
                ],*/
            },
            language: 'pt-br' 
        } )
        .then( editor => {
            report_editor = editor;
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>



