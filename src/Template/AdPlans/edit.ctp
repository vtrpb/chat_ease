<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdPlan $adPlan
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
            <li class="active"><?= $this->Html->link("PLANOS DE ANÚNCIOS", '/AdPlans/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>EDITA PLANO</li>
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
                        <?= $this->Form->create($adPlan,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";        
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-6\">" . $this->Form->control('name',['label'=>'Nome','div' => false,'class' => 'form-control'])."</div>";
                                echo "</div>";                               
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-6\">" . $this->Form->control('alias',['label'=>'Abreviatura','div' => false,'class' => 'form-control'])."</div>";
                                echo "</div>";
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-6\">" . $this->Form->control('plan_type', [
                                                'label' => 'Tipo de Plano',
                                                'div' => false,
                                                'class' => 'form-control',
                                                'options' => ['pf' => 'Pessoa Física', 'pj' => 'Pessoa Jurídica']
                                            ]) . "</div>";
                                echo "</div>";
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-6\">" . $this->Form->control('active_days',['label'=>'Dias ativos','div' => false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-6\">" . $this->Form->control('free',['label'=>'Gratuito','div' => false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-6\">" . $this->Form->control('max_number_cars',['label'=>'Máx.Carros','div' => false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-6\">" . $this->Form->control('value',['label'=>'Valor','div' => false,'class' => 'form-control'])."</div>";
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