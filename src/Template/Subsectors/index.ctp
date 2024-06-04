<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subsector[]|\Cake\Collection\CollectionInterface $subsectors
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("G.E.D.I", '/Subsectors/index') ?></li>
                <li><strong> / </strong></li>
                <li>SUBSETORES</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Detalhar"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> SUBSETOR</button>',['controller' => 'Subsectors','action' => 'add'],['escape' => false]); ?>
                </ul>    
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                <th scope="col"><?= $this->Paginator->sort('id','Cód.') ?></th>                
                                <th scope="col"><?= $this->Paginator->sort('sector_id','Setor') ?></th>                
                                <th scope="col"><?= $this->Paginator->sort('subsector_id','Subsetor') ?></th>                
                                <th scope="col"><?= $this->Paginator->sort('alias','Sigla') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created','Criado') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subsectors as $subsector): ?>
                                <tr>
                                    <td><?= $this->Number->format($subsector->id) ?></td>                
                                    <td><?= h($subsector->sector->name) ?></td>
                                    <td><?= h($subsector->name) ?></td>
                                    <td><?= h($subsector->alias) ?></td>
                                    <td><?= h($subsector->created->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td><?= h($subsector->modified->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                    <td class="actions text-nowrap">                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye" title="Detalhar"></button>',['controller' => 'Subsectors','action' => 'view',$subsector->id],['escape' => false]); ?>                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-info btn-sm nav-icon fas fa-edit" title="Editar"></button>',['controller' => 'Subsectors','action' => 'edit',$subsector->id],['escape' => false]); ?>                     
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir Setor"></button>',['controller'=>'Subsectors','action' => 'delete',$subsector->id],['escape' => false,'confirm'=>'Tem certeza que excluir este Subsetor '. $subsector->name . '?']); ?>
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