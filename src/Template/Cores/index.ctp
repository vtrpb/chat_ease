<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Core[]|\Cake\Collection\CollectionInterface $cores
 */
use Cake\Core\Configure;

$domain = Configure::read('domain');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">        
        <div class="breadcrumb-2">
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("G.E.D.I", '/Cores/index') ?></li>
                <li><strong> / </strong></li> 
                <li>NÚCLEOS</li>
            </ul>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <ul class="list-inline">        
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Adicionar novo Núcleo"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> NÚCLEO</button>',['controller' => 'Cores','action' => 'add'],['escape' => false]); ?>
                </ul>    
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','Cód.') ?></th>                
                                    <th scope="col"><?= $this->Paginator->sort('sector_id','Setor') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('subsector_id','Subsetor') ?></th>                
                                    <th scope="col"><?= $this->Paginator->sort('name','Núcleo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('alias','Sigla') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created','Criado') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cores as $core): ?>
                                <tr>
                                    <?php
                                    //debug($core) or die();
                                    ?>
                                    <td><?= $this->Number->format($core->id) ?></td>                
                                    <td><?= h($core->subsector->sector->alias) ?></td>
                                    <td><?= h($core->subsector->alias) ?></td>
                                    <td><?= h($core->name) ?></td>
                                    <td><?= h($core->alias) ?></td>
                                    <td><?= h($core->created->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td><?= h($core->modified->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td class="actions text-nowrap">                                                                                
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye" title="Detalhar"></button>',['controller' => 'Cores','action' => 'view',$core->id],['escape' => false]); ?>
                                        <?= $this->Html->link('<button type="button" class="btn btn-info btn-sm nav-icon fas fa-edit" title="Editar"></button>',['controller' => 'Cores','action' => 'edit',$core->id],['escape' => false]); ?>                     
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir Núcleo"></button>',['controller'=>'Cores','action' => 'delete',$core->id],['escape' => false,'confirm'=>'Tem certeza que excluir este Núcleo '. $core->name . '?']); ?>
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