<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckModel $truckModel
 */
use Cake\Core\Configure;

  $domain     = Configure::read('domain');        
  $user_role  = $this->request->getSession()->read('Users.role'); 
  
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("MODELOS", '/TruckModels/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO MODELO</li>
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
                        <?= $this->Form->create($truckModel,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                        
                              
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-6\">" . $this->Form->control('truck_type_id',['label'=>'Tipo de Veículo','options' => $truckTypes, 'empty' => '(tipo de veículo)','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-6\">" . $this->Form->control('truck_brand_id',['label'=>'Marca','options' => $truckBrands,'div' => 'false','class' => 'form-control'])."</div>";
                                    
                                echo "</div>";                                                     
                                
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-6\">" . $this->Form->control('name',['label'=>'Modelo','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-6\">" . $this->Form->control('external_id',['label'=>'ID Externo','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";                                    
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
</div>