<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission[]|\Cake\Collection\CollectionInterface $permissions
 */
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/Users/index') ?></li> / 
                <li>PERMISSÕES</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cadastra nova permissão.">NOVA PERMISÃO</button>',['controller' => 'Permissions','action' => 'add'],['escape' => false]); ?>                                        
                </ul>    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Pesquisar PERMISSÕES...','class'=>'form-control']);
                            ?>
                            <div class="form-group">
                                    <br>
                                    <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="nav-icon fas fa-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'Reports','action' => 'index'],['escape' => false]); ?>
                            </div>                                   
                                    
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render() ?> 
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','#') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('user_id','Usuário') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('role_id','Função') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($permissions as $permission):         ?>
                                <tr>
                                    <td><?= $this->Number->format($permission->id) ?></td>
                                    <td><?= $permission->has('user') ? $this->Html->link($permission->user->name, ['controller' => 'Users', 'action' => 'view', $permission->user->id]) : '' ?></td>
                                    <td><?= $permission->has('role') ? $this->Html->link($permission->role->name, ['controller' => 'Roles', 'action' => 'view', $permission->role->id]) : '' ?></td>
                                    <td><?= h($permission->modified) ?></td>
                                    <td class="actions text-nowrap">                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye"  title="Detalhar"></button>',['action' => 'view',$permission->id],['escape' => false]); ?>
                                        <?= $this->Html->link('<button type="button" class="btn btn-info    btn-sm nav-icon fas fa-edit" title="Editar"></button>',['action' => 'edit',$permission->id],['escape' => false]); ?>
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir"></button>',['action' => 'delete',$permission->id],['escape' => false,'confirm'=>'Tem certeza que excluir a permissão "'. $permission->role->name . '" para '.$permission->user->name.' ?']); ?>
                                    </td>
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