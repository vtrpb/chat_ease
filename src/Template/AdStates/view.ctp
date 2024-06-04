<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdState $adState
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("ESTADOS DOS ANÚNICOS", '/AdStates/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$adState->name ?> </li>                        
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
                                <td><?= $this->Number->format($adState->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Nome') ?></th>
                                <td><?= h($adState->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Alias') ?></th>
                                <td><?= h($adState->alias) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($adState->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($adState->modified) ?></td>
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

<div class="adStates view large-9 medium-8 columns content">    
    <div class="related">
        <h4><?= __('Related Ads') ?></h4>
        <?php if (!empty($adState->ads)): ?>
        <table cellpadding="0" cellspacing="0">
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
            <?php foreach ($adState->ads as $ads): ?>
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
        </table>
        <?php endif; ?>
    </div>
</div>
