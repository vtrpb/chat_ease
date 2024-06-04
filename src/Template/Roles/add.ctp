<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
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
            <li class="active"><?= $this->Html->link("USUÁRIOS", '/Users/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO USUÁRIO</li>
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
                        <?= $this->Form->create($role,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php 

                                echo "<div class=\"card-body\">";        

                            
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-3\">" . $this->Form->control('name',['label'=>'Nome','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-3\">" . $this->Form->control('alias',['label'=>'Abreviado','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                echo "</div>";  
                                
                                echo "<div><p> </p></div>";
                                    echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR',['type'=>'submit','class'=>'btn btn-default'])."</div>";
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