<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Core $core
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("NÚCLEOS", '/Cores/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$core->name ?> </li>                        
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
                                <td><?= $this->Number->format($core->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Nome') ?></th>
                                <td><?= h($core->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Abreviatura') ?></th>
                                <td><?= h($core->alias) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($core->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($core->modified) ?></td>
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