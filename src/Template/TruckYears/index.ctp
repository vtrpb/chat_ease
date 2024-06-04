<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckYear[]|\Cake\Collection\CollectionInterface $truckYears
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/Users/index') ?></li> / 
                <li>TIPOS DE USUÁRIOS</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cadastra novo perfil."><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> PERFIL</button>',['controller' => 'Roles','action' => 'add'],['escape' => false]); ?>                    
                </ul>    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Pesquisar Perfis...','class'=>'form-control']);
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
                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('truck_model_id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('external_id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                    <th scope="col-2" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($truckYears as $truckYear): ?>
                                    <tr>
                                        <td><?= $this->Number->format($truckYear->id) ?></td>
                                        <td><?= $truckYear->has('truck_model') ? $this->Html->link($truckYear->truck_model->name, ['controller' => 'TruckModels', 'action' => 'view', $truckYear->truck_model->id]) : '' ?></td>
                                        <td><?= h($truckYear->name) ?></td>
                                        <td><?= $this->Number->format($truckYear->external_id) ?></td>
                                        <td><?= h($truckYear->created) ?></td>
                                        <td><?= h($truckYear->modified) ?></td>
                                        <td class="actions text-nowrap">                                        
                                            <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye"  title="Detalhar"></button>',['action' => 'view',$truckYear->id],['escape' => false]); ?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-info    btn-sm nav-icon fas fa-edit" title="Editar"></button>',['action' => 'edit',$truckYear->id],['escape' => false]); ?>
                                            <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir"></button>',['action' => 'delete',$truckYear->id],['escape' => false,'confirm'=>'Tem certeza que excluir o usuário "'. $truckYear->name . '"?']); ?>
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