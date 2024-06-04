<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operation $operation
 */
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("OPERAÇÕES", '/Operations/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$operation->name ?> </li>                        
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
                                <td><?= $this->Number->format($operation->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Nome') ?></th>
                                <td><?= h($operation->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Abreviatura') ?></th>
                                <td><?= h($operation->alias) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Status') ?></th>
                                <td><?= h($operation->status) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Data Inicial') ?></th>
                                <td><?= h($operation->initial_date) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Data Final') ?></th>
                                <td><?= h($operation->final_date) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($operation->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($operation->modified) ?></td>
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