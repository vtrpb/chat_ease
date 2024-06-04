<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Truck[]|\Cake\Collection\CollectionInterface $trucks
 */
use Cake\Core\Configure;


$session    = $this->request->session();

$domain     = Configure::read('domain');        

$user_id    = $session->read('Users.id');
$user_role  = $session->read('Users.role'); 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/Users/index') ?></li> / 
                <li>VEÍCULOS</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cadastra novo veículo."> NOVO VEÍCULO</button>',['controller' => 'Trucks','action' => 'add'],['escape' => false]); ?>                    
                </ul>    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Pesquisar Veículos...','class'=>'form-control']);
                            ?>
                            <div class="form-group">
                                    <br>
                                    <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="nav-icon fas fa-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'Trucks','action' => 'index'],['escape' => false]); ?>
                            </div>                                   
                                    
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render() ?> 
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','Código') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('user_id','Cliente') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('truck_type_id','Tip.Veícu.') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('brand','Marca') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('model','Modelo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('condition','Condição') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('traction','Tração') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('transmission','Transmissão') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('implement','Implemento') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('year','Ano/Modelo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('mileage','Km') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('state_id','Estado') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('city_id','Cidade') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                    <th scope="col-2" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($trucks as $truck):         ?>
                                <tr>
                                    <td><?= $this->Number->format($truck->id) ?></td>
                                    <td><?= $truck->has('user') ? $this->Html->link($truck->user->name, ['controller' => 'Users', 'action' => 'view', $truck->user->id]) : '' ?></td>
                                    <td><?= $truck->has('truck_type') ? $this->Html->link($truck->truck_type->name, ['controller' => 'TruckTypes', 'action' => 'view', $truck->truck_type->id]) : '' ?></td>
                                    <td><?= h($truck->brand) ?></td>
                                    <td><?= h($truck->model) ?></td>
                                    <td><?= h($truck->condition_display) ?></td>                                    
                                    <td><?= h($truck->traction) ?></td>
                                    <td><?= h($truck->transmission_display) ?></td>
                                    <td><?= h($truck->implement_display) ?></td>                                    
                                    <td><?= $truck->year.'/'.$truck->year_model ?></td>
                                    <td><?= $truck->mileage_display ?></td>
                                    <td><?= $truck->has('state') ? $this->Html->link($truck->state->name, ['controller' => 'States', 'action' => 'view', $truck->state->id]) : '' ?></td>
                                    <td><?= $truck->has('city') ? $this->Html->link($truck->city->name, ['controller' => 'Cities', 'action' => 'view', $truck->city->id]) : '' ?></td>
                                    <td><?= h($truck->modified) ?></td>
                                    <td class="actions text-nowrap">                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye"  title="Detalhar"></button>',['action' => 'view',$truck->id],['escape' => false]); ?>
                                        <?= $this->Html->link('<button type="button" class="btn btn-info    btn-sm nav-icon fas fa-edit" title="Editar"></button>',['action' => 'edit',$truck->id],['escape' => false]); ?>                                        
                                        <?php 
                                            if ($user_role === 'admin')  {
                                                echo $this->Html->link('<button type="button" class="btn btn-warning btn-sm nav-icon fas fa-edit" title="Editar"></button>',['action' => 'editAdmin',$truck->id],['escape' => false]); 
                                            }
                                        ?>                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-secondary btn-sm nav-icon fas fa-file" title="Documentos"></button>',['controller'=>'Files','action' => 'truckFiles',$truck->id],['escape' => false]); ?>
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir"></button>',['action' => 'delete',$truck->id],['escape' => false,'confirm'=>'Tem certeza que excluir o veículo "'. $truck->model . '"?']); ?>
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