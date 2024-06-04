<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportTemplate[]|\Cake\Collection\CollectionInterface $reportTemplates
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
                <li class="active"><?= $this->Html->link("G.E.D.I", '/ReportTemplates/index') ?></li> 
                <li> / </li>
                <li>MODELOS DE DOCUMENTOS</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Novo Modelo de Documento"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> MODELO DE DOCUMENTO</button>',['controller' => 'ReportTemplates','action' => 'add'],['escape' => false]); ?>
                </ul>    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Modelo de documento contendo...','class'=>'form-control']);
                            ?>
                            <div class="form-group">
                                    <br>
                                    <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="glyphicon glyphicon-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'Reports','action' => 'index'],['escape' => false]); ?>
                            </div>                                   
                                    
                        <?= $this->Form->end() ?>                        
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','Id') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('sector_id','Setor') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('subsector_id','Subsetor') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('core_id','Núcleo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('name','Modelo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('report_type_id','Tip.Rel.') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('locked','Travado') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created','Criado') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>                                       
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($reportTemplates as $reportTemplate): ?>
                                    <?php 
                                       /*debug($reportTemplate) or die();
                                       //echo $reportTemplate['Subsetors']->name;                                       
                                       echo $reportTemplate['Subsetors'][0]['name'];
<td><?= $reportTemplate->has('core') ? $this->Html->link($reportTemplate->core->name, ['controller' => 'Cores', 'action' => 'view', $reportTemplate->core->id]) : '' ?></td>
                <td><?= $reportTemplate->has('sector') ? $this->Html->link($reportTemplate->sector->name, ['controller' => 'Sectors', 'action' => 'view', $reportTemplate->sector->id]) : '' ?></td>
                <td><?= $reportTemplate->has('subsector') ? $this->Html->link($reportTemplate->subsector->name, ['controller' => 'Subsectors', 'action' => 'view', $reportTemplate->subsector->id]) : '' ?></td>
                <td><?= h($reportTemplate->name) ?></td>
                <td><?= h($reportTemplate->locked) ?></td>
                <td><?= h($reportTemplate->created) ?></td>
                <td><?= h($reportTemplate->modified) ?></td>
                <td><?= $reportTemplate->has('report_type') ? $this->Html->link($reportTemplate->report_type->name, ['controller' => 'ReportTypes', 'action' => 'view', $reportTemplate->report_type->id]) : '' ?></td>
                */
                                    ?>
                                    <tr>
                                        <td><?= $this->Number->format($reportTemplate->id) ?></td>
                                        <td><?= $reportTemplate->has('sector') ? $this->Html->link($reportTemplate->sector->alias, ['controller' => 'Sectors', 'action' => 'view', $reportTemplate->sector->id]) : '' ?></td>
                                        <td><?= $reportTemplate->has('subsector') ? $this->Html->link($reportTemplate->subsector->alias, ['controller' => 'Subsectors', 'action' => 'view', $reportTemplate->subsector->id]) : '' ?></td>
                                        <td><?= $reportTemplate->has('core') ? $this->Html->link($reportTemplate->core->alias, ['controller' => 'Cores', 'action' => 'view', $reportTemplate->core->id]) : '' ?></td>
                                        <td><?= $reportTemplate->name ?></td>
                                        <td><?= $reportTemplate->has('report_type') ? $this->Html->link($reportTemplate->report_type->alias, ['controller' => 'ReportTypes', 'action' => 'view', $reportTemplate->report_type->id]) : '' ?></td>
                                        <td><?= $reportTemplate->locked ?></td>
                                        <td><?= h($reportTemplate->created->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                        <td><?= h($reportTemplate->modified->i18nFormat('dd/MM/yyyy HH:MM')) ?></td>
                                        <td class="actions text-nowrap">                                                                                
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye" title="Detalhar"></button>',['controller' => 'ReportTemplates','action' => 'view',$reportTemplate->id],['escape' => false]); ?>
                                        <?= $this->Html->link('<button type="button" class="btn btn-info btn-sm nav-icon fas fa-edit" title="Editar"></button>',['controller' => 'ReportTemplates','action' => 'edit',$reportTemplate->id],['escape' => false]); ?>                     
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir permissão"></button>',['controller'=>'ReportTemplates','action' => 'delete',$reportTemplate->id],['escape' => false,'confirm'=>'Tem certeza que excluir o modelo de laudo '. $reportTemplate->name . ' ?']); ?>
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