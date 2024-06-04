<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */

use Cake\Core\Configure;
$domain = Configure::read('domain');

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/Roles/selecRole') ?></li>
                <li><strong> / </strong></li>
                <li>Selecione sua função no <strong>Truck Zone</strong></li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cria nova permissão">NOVA PERMISSÃO</button>',['controller' => 'Permissions','action' => 'add'],['escape' => false]); ?>
                </ul>    
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>                
                                    <th scope="col"><?= $this->Paginator->sort('user_id','Nome') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('role_id','Função') ?></th>                                <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($permissions as $permission): ?>
                                <tr>                
                                    <td><?= h($permission->user->name) ?></td>
                                    <td><?= h($permission->role->name) ?></td>                
                                    <td class="actions text-nowrap">                                        
                                        <!--<?= $this->Html->link('<button type="button" class="btn btn-default btn-xs" title="Selecionar função"><i class="nav-icon fa fa-users"></button>',['controller' => 'Permissions','action' => 'selectedRole',$permission->role->alias],['escape' => false]); ?>                    -->                                             
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-hand-pointer" title="Selecionar função"></button>',['controller' => 'Permissions','action' => 'selectedRole',$permission->role->alias],['escape' => false]); ?>                    
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                   
                    <div class="card-footer">
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
                                <?= $this->Paginator->prev('< ' . __('anterior ')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__(' próximo') . ' >') ?>
                                <?= $this->Paginator->last(__('último') . ' >>') ?>
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
  <!-- /.content-wrapper -->