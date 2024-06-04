<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdPlan[]|\Cake\Collection\CollectionInterface $adPlans
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/AdPlans/index') ?></li> / 
                <li>Tipos de Plano</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cadastra novo perfil."> NOVO PLANO</button>',['controller' => 'adPlans','action' => 'add'],['escape' => false]); ?>                    
                </ul>    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Pesquisar Planos...','class'=>'form-control']);
                            ?>
                            <div class="form-group">
                                    <br>
                                    <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="nav-icon fas fa-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'AdPlans','action' => 'index'],['escape' => false]); ?>
                            </div>                                   
                                    
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render() ?> 
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','#') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('name','Plano') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('alias','Alias') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('active_days','Dias ativos') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('free','Grátis') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('value','Valor') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('max_number_cars','Núm.Máx.Carros') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                    <th scope="col-2" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($adPlans as $adPlan):         ?>
                                <tr>
                                    <td><?= $this->Number->format($adPlan->id) ?></td>
                                    <td><?= h($adPlan->name) ?></td>
                                    <td><?= h($adPlan->alias) ?></td>
                                    <td><?= $this->Number->format($adPlan->active_days) ?></td>
                                    <td><?= h($adPlan->free) ?></td>
                                    <td><?= 'R$ '.$this->Number->format($adPlan->value) ?></td>                                    
                                    <td><?= $this->Number->format($adPlan->max_number_cars) ?></td>                                    
                                    <td><?= h($adPlan->modified) ?></td>
                                    <td class="actions text-nowrap">                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye"  title="Detalhar"></button>',['action' => 'view',$adPlan->id],['escape' => false]); ?>
                                        <?= $this->Html->link('<button type="button" class="btn btn-info    btn-sm nav-icon fas fa-edit" title="Editar"></button>',['action' => 'edit',$adPlan->id],['escape' => false]); ?>
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir"></button>',['action' => 'delete',$adPlan->id],['escape' => false,'confirm'=>'Tem certeza que excluir o usuário "'. $adPlan->name . '"?']); ?>
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