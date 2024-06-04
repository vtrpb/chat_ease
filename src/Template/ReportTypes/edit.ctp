<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportType $reportType
 */
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("TIPOS DE DOCUMENTOS", '/ReportTypes/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>EDITA TIPO DE DOCUMENTO</li>
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
                        <?= $this->Form->create($reportType,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('name', ['label'=>'Tipo de Documento','required' => true,'div' => false,'class'=>'form-control'])."</div>";                                        
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('alias', ['label'=>'Abreviatura','required' => true,'div' => false,'class'=>'form-control'])."</div>";                                                   
                                  echo "</div>";
                                  
                                  echo "<div><p> </p></div>";
                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                  echo "</div>";

                                echo "</div>";                                
                                
                            ?>                        

                        
                        <?= $this->Form->end() ?>                     
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->