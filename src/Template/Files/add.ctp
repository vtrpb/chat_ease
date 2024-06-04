<?php
use Cake\Core\Configure;

  $domain     = Configure::read('domain');          

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <?php if ($tableName == 'Users') : ?>
              <li class="active"><?= $this->Html->link("USUÁRIOS", '/Users/index') ?></li> / 
              <li><?= $table->name ?></li> /             
            <?php endif; ?> 
            <?php if ($tableName == 'Trucks') : ?>
              <li class="active"><?= $this->Html->link("VEÍCULOS", '/Trucks/index') ?></li> / 
              <li><?= $table->brand . ' / '.$table->model ?></li> /             
            <?php endif; ?> 
            <li>NOVO ARQUIVO</li>
        </ul>                        
      </div>
    </div>   
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card card-danger">
                        <?= $this->Form->create($file,['id'=>'form-template','class'=>'form-horizontal','type' => 'file']) ?>                                 
                            <?php  
                                
                                echo "<div class=\"card-body\">";        

                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-12\">" . $this->Form->control('file', ['type' => 'file', 'label' => 'Adicionar arquivo: '])."</div>";                                    
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