<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ad $ad
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("ANÚNCIOS", '/Ads/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$ad->title ?> </li>                        
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
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($ad->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Usuário') ?></th>
                                <td><?= $ad->has('user') ? $this->Html->link($ad->user->name, ['controller' => 'Users', 'action' => 'view', $ad->user->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Veículo') ?></th>
                                <td><?= $ad->has('truck') ? $this->Html->link($ad->truck->model, ['controller' => 'Trucks', 'action' => 'view', $ad->truck->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Status anúncio') ?></th>
                                <td><?= $ad->has('ad_state') ? $this->Html->link($ad->ad_state->name, ['controller' => 'AdStates', 'action' => 'view', $ad->ad_state->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Título') ?></th>
                                <td><?= h($ad->title) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('ID da transação') ?></th>
                                <td><?= h($ad->transaction_id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Referência') ?></th>
                                <td><?= h($ad->reference) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('ID do representante') ?></th>
                                <td><?= $this->Number->format($ad->representative_user_id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Número de fotos') ?></th>
                                <td><?= $this->Number->format($ad->number_of_photos) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Valor pago') ?></th>
                                <td><?= $this->Number->format($ad->payment_value) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Código de pagamento recebido') ?></th>
                                <td><?= $this->Number->format($ad->payment_received_code) ?></td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><?= __('Data inicial') ?></th>
                                <td><?= h($ad->initial_date) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Data final') ?></th>
                                <td><?= h($ad->final_date) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Número de visualizações') ?></th>
                                <td><?= $this->Number->format($ad->number_of_views) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($ad->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($ad->modified) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Grátis') ?></th>
                                <td><?= $ad->free ? __('SIM') : __('NÃO'); ?></td>
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