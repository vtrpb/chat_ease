<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Truck $truck
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("CAMINHÕES", '/Trucks/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$truck->model ?> </li>                        
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
                                <th scope="row"><?= __('#') ?></th>
                                <td><?= $this->Number->format($truck->id) ?></td>
                            </tr>
                           <tr>
                                <th scope="row"><?= __('Cliente') ?></th>
                                <td><?= $truck->has('user') ? $this->Html->link($truck->user->name, ['controller' => 'Users', 'action' => 'view', $truck->user->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Tipo de veículo') ?></th>
                                <td><?= $truck->has('truck_type') ? $this->Html->link($truck->truck_type->name, ['controller' => 'TruckTypes', 'action' => 'view', $truck->truck_type->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Cor') ?></th>
                                <td><?= $truck->has('color') ? $this->Html->link($truck->color,['controller' => 'TruckTypes', 'action' => 'view', $truck->truck_type->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Marca') ?></th>
                                <td><?= h($truck->brand) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modelo') ?></th>
                                <td><?= h($truck->model) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Tração') ?></th>
                                <td><?= h($truck->traction) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Transmissão') ?></th>
                                <td><?= h($truck->transmission_display) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Implemento') ?></th>
                                <td><?= h($truck->implement_display) ?></td>
                            </tr>                                                        
                            <tr>
                                <th scope="row"><?= __('Estado') ?></th>
                                <td><?= $truck->has('state') ? $this->Html->link($truck->state->name, ['controller' => 'States', 'action' => 'view', $truck->state->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Cidade') ?></th>
                                <td><?= $truck->has('city') ? $this->Html->link($truck->city->name, ['controller' => 'Cities', 'action' => 'view', $truck->city->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Ano/Modelo') ?></th>
                                <td><?= $truck->year.'/'.$truck->year_model ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('KM') ?></th>
                                <td><?= $this->Number->format($truck->mileage) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Condição') ?></th>
                                <td><?= h($truck->condition_display) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($truck->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($truck->modified) ?></td>
                            </tr>
                        </table>
                    </div>                              
                </div>
         </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.main-content -->

  <!--<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card">                    
                    <div class="card-body table-responsive p-0">                        
                      <table class="table">        
                           <thead>
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('User Id') ?></th>
                                    <th scope="col"><?= __('Truck Id') ?></th>
                                    <th scope="col"><?= __('Ad State Id') ?></th>
                                    <th scope="col"><?= __('Representative User Id') ?></th>
                                    <th scope="col"><?= __('Title') ?></th>
                                    <th scope="col"><?= __('Content') ?></th>
                                    <th scope="col"><?= __('Initial Date') ?></th>
                                    <th scope="col"><?= __('Final Date') ?></th>
                                    <th scope="col"><?= __('Number Of Photos') ?></th>
                                    <th scope="col"><?= __('Free') ?></th>
                                    <th scope="col"><?= __('Payment Value') ?></th>
                                    <th scope="col"><?= __('Transaction Id') ?></th>
                                    <th scope="col"><?= __('Reference') ?></th>
                                    <th scope="col"><?= __('Payment Received Code') ?></th>
                                    <th scope="col"><?= __('Number Of Views') ?></th>
                                    <th scope="col"><?= __('Created') ?></th>
                                    <th scope="col"><?= __('Modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($truck->ads as $ads): ?>
                                <tr>
                                    <td><?= h($ads->id) ?></td>
                                    <td><?= h($ads->user_id) ?></td>
                                    <td><?= h($ads->truck_id) ?></td>
                                    <td><?= h($ads->ad_state_id) ?></td>
                                    <td><?= h($ads->representative_user_id) ?></td>
                                    <td><?= h($ads->title) ?></td>
                                    <td><?= h($ads->content) ?></td>
                                    <td><?= h($ads->initial_date) ?></td>
                                    <td><?= h($ads->final_date) ?></td>
                                    <td><?= h($ads->number_of_photos) ?></td>
                                    <td><?= h($ads->free) ?></td>
                                    <td><?= h($ads->payment_value) ?></td>
                                    <td><?= h($ads->transaction_id) ?></td>
                                    <td><?= h($ads->reference) ?></td>
                                    <td><?= h($ads->payment_received_code) ?></td>
                                    <td><?= h($ads->number_of_views) ?></td>
                                    <td><?= h($ads->created) ?></td>
                                    <td><?= h($ads->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Ads', 'action' => 'edit', $ads->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ads', 'action' => 'delete', $ads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ads->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                -->
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