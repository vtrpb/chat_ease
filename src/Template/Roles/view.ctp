<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("PERFIS", '/Roles/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$role->name ?> </li>                        
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
                                <td><?= $this->Number->format($role->id) ?></td>
                            </tr>
                            <tr>
                            <th scope="row"><?= __('Nome') ?></th>
                                <td><?= h($role->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Abreviatura') ?></th>
                                <td><?= h($role->alias) ?></td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($role->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($role->modified) ?></td>
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