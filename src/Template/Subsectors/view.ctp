<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subsector $subsector
 */
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("SUBSETORES", '/Subsectors/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$subsector->name ?> </li>                        
            </ul>        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card">                    
                    <div class="card-body table-responsive p-0">                        
                          <table class="table">        
                            <tr>
                                <th scope="row"><?= __('ID') ?></th>
                                <td><?= $this->Number->format($subsector->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Setor') ?></th>                                
                                <td><?= $subsector->has('sector') ? $this->Html->link($subsector->sector->name, ['controller' => 'Sectors', 'action' => 'view', $subsector->sector->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Subsetor') ?></th>
                                <td><?= h($subsector->name) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Abreviatura') ?></th>
                                <td><?= h($subsector->alias) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($subsector->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($subsector->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                    <!--<div class="card-footer">                        
                    </div>-->
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


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subsector'), ['action' => 'edit', $subsector->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subsector'), ['action' => 'delete', $subsector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subsector->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subsectors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subsector'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Report Templates'), ['controller' => 'ReportTemplates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report Template'), ['controller' => 'ReportTemplates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subsectors view large-9 medium-8 columns content">
    <h3><?= h($subsector->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sector') ?></th>
            <td><?= $subsector->has('sector') ? $this->Html->link($subsector->sector->name, ['controller' => 'Sectors', 'action' => 'view', $subsector->sector->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subsector->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($subsector->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subsector->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subsector->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subsector->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Report Templates') ?></h4>
        <?php if (!empty($subsector->report_templates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Core Id') ?></th>
                <th scope="col"><?= __('Sector Id') ?></th>
                <th scope="col"><?= __('Subsector Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Template') ?></th>
                <th scope="col"><?= __('Locked') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subsector->report_templates as $reportTemplates): ?>
            <tr>
                <td><?= h($reportTemplates->id) ?></td>
                <td><?= h($reportTemplates->core_id) ?></td>
                <td><?= h($reportTemplates->sector_id) ?></td>
                <td><?= h($reportTemplates->subsector_id) ?></td>
                <td><?= h($reportTemplates->name) ?></td>
                <td><?= h($reportTemplates->template) ?></td>
                <td><?= h($reportTemplates->locked) ?></td>
                <td><?= h($reportTemplates->created) ?></td>
                <td><?= h($reportTemplates->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ReportTemplates', 'action' => 'view', $reportTemplates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ReportTemplates', 'action' => 'edit', $reportTemplates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReportTemplates', 'action' => 'delete', $reportTemplates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reportTemplates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
