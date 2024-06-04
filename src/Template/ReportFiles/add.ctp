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

<script>
   
    $(document).ready(function ($) {           

            var today = new Date();            

            $("#date-of-document").mask('00/00/0000', {reverse: true});                    
            $("#date-of-document").val(formatDate(today));
            
            function formatDate(date)  {
              return ( String(date.getDate()).padStart(2, '0') + '/' + String(date.getMonth() + 1).padStart(2, '0')  + '/' + date.getFullYear() );      
            }
                           
    });  

</script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("DOCUMENTOS", '/Reports/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO ARQUIVO VINCULADO A DOCUMENTO</li>
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
                        <?= $this->Form->create($reportFile,['type' => 'file']); ?>                                  
                            <?php                              
                                echo "<div class=\"card-body\">";                                                               
                                
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">" . $this->Form->control('report_id',['label'=>'Documento','required'=>true,'div' => 'false','class' => 'form-control'])."</div>";                                    
                                echo "</div>";

                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-8\">" . $this->Form->control('file_category',['label'=>'Categoria do arquivo','required'=>true,'empty' => '(selecione uma categoria)',
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
                                    echo "<div class=\"col-4\">" . $this->Form->control('date_of_document',['label'=>'Data do Documento (Ex.: date da escuta, data da foto, data do fato,etc...)','type'=>'text','div' => false,'class' => 'form-control date-picker'])."</div>";
                                echo "</div>";                                

                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-4\">" . $this->Form->control('name',['label'=>'Nome para o arquivo','placeholder' => 'nome para o arquivo','class'=>'form-control'])."</div>";
                                echo "</div>";                                

                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-4\">" . $this->Form->control('filename',['label' => '(Formatos de arquivos suportados: .jpg .gif .tiff .png .pdf .csv .txt .docx .xlsx .pptx .numbers .mp3 .ogg .wav .mp4 .html .zip | Tamanho: menor que 20MB)','type' => 'file','class'=>'btn btn-black btn-sm'])."</div>";
                                echo "</div>";                                

                                echo "<div class=\"row\"> </div>";                                    
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-upload" aria-hidden="true"></span> ENVIAR'),['class'=>'btn btn-default'])."</div>";
                                echo "</div>";
                                

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