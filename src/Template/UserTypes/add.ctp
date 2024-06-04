<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserType $userType
 */
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("DOCUMENTOS", '/ReportTemplates/index') ?></li>
            <li><strong>  >  </strong></li>
            <li>NOVO TIPO DE USUÁRIO</li>
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
                        <?= $this->Form->create($userType,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                
                                
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">";
                                        echo "<div class=\"col-4\">".$this->Form->control('name', ['label'=>'Nome do tipo de usuário'],'type'=>'text','div' => false,'class'=>'form-control'])."</div>";
                                        echo "<div class=\"form-check form-check-inline\">".$this->Form->control('alias', ['label'=>'Abreviatura'],'type'=>'text','div' => false,'class'=>'form-control'])."</div>";
                                        echo "</div>";                                    
                                echo "</div>";
                              
                                echo "</div>";
                            ?>                        
                        <?= $this->Form->button(__('<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default']) ?>       
                        <?= $this->Form->end() ?>                     
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->