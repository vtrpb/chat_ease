<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workplace[]|\Cake\Collection\CollectionInterface $workplaces
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
                <li class="active"><?= $this->Html->link("G.E.D.I", '/Workplaces/index') ?></li>
                <li><strong> / </strong></li>
                <li>LOCAIS DE TRABALHO</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Detalhar"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> LOTAÇÃO DE TRABALHO</button>',['controller' => 'Workplaces','action' => 'add'],['escape' => false]); ?>
                </ul>    
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','Cód.') ?></th>                
                                    <th scope="col"><?= $this->Paginator->sort('user_id','Analista') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('sector_id','Setor') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('subsector_id','Subsetor') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('core_id','Núcleo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created','Criado') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($workplaces as $workplace): ?>
                                <tr>
                                    <td><?= $this->Number->format($workplace->id) ?></td>                
                                    <td><?= h($workplace->user->name) ?></td>
                                    <td><?= h($workplace->sector->name) ?></td>
                                    <td><?= h($workplace->subsector->alias) ?></td>
                                    <td><?= h($workplace->core->name) ?></td>                
                                    <td><?= h($workplace->created->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td><?= h($workplace->modified->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td class="actions text-nowrap">                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye" title="Detalhar"></button>',['controller' => 'Workplaces','action' => 'view',$workplace->id],['escape' => false]); ?>
                                        <?= $this->Html->link('<button type="button" class="btn btn-info btn-sm nav-icon fas fa-edit" title="Editar"></button>',['controller' => 'Workplaces','action' => 'edit',$workplace->id,$workplace->user_id],['escape' => false]); ?>                     
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir Laudo"><span class="glyphicon glyphicon-remove" aria-hidden="true" ></span></button>',['controller'=>'Workplaces','action' => 'delete',$workplace->id],['escape' => false,'confirm'=>'Tem certeza que excluir este Analista do '. $workplace->sector->name . '?']); ?>
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