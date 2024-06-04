<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operation[]|\Cake\Collection\CollectionInterface $operations
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("OPERAÇÕES", '/Operations/index') ?></li>
                <li><strong> / </strong></li> 
                <li>OPERAÇÕES</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Detalhar"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> OPERAÇÃO</button>',['controller' => 'Operations','action' => 'add'],['escape' => false]); ?>
                </ul>    
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','Id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('name','Nome') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('alias','Operação') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('initial_date','Data de início') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('final_date','Data de término') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('status','Status') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created','Criado') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>                                    
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($operations as $operation): ?>
                                <tr>
                                    <td><?= $this->Number->format($operation->id) ?></td>                
                                    <td><?= h($operation->name) ?></td>
                                    <td><?= h($operation->alias) ?></td>
                                    <td><?= h($operation->initial_date->i18nFormat('dd/MM/yyyy')) ?></td>
                                    <td><?= h($operation->final_date->i18nFormat('dd/MM/yyyy')) ?></td>
                                    <td><?= h($operation->status) ?></td>
                                    <td><?= h($operation->created->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td><?= h($operation->modified->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td class="actions text-nowrap">                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye" title="Detalhar"></button>',['controller' => 'Operations','action' => 'view',$operation->id],['escape' => false]); ?>                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-info btn-sm nav-icon fas fa-edit" title="Editar"></button>',['controller' => 'Operations','action' => 'edit',$operation->id],['escape' => false]); ?>                     
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir Setor"></button>',['controller'=>'Operations','action' => 'delete',$operation->id],['escape' => false,'confirm'=>'Tem certeza que excluir esta Operação '. $operation->name . '?']); ?>
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