<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workplace $workplace
 */
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("LOCAIS DE TRABALHO", '/Workplaces/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$workplace->has('user') ? $this->Html->link($workplace->user->name, ['controller' => 'Users', 'action' => 'view', $workplace->user->id]) : ''?> </li>                        
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
                                <td><?= $this->Number->format($workplace->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Usuário') ?></th>
                                <td><?= $workplace->has('user') ? $this->Html->link($workplace->user->name, ['controller' => 'Users', 'action' => 'view', $workplace->user->id]) : '' ?>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Setor') ?></th>
                                <td><?= $workplace->has('sector') ? $this->Html->link($workplace->sector->name, ['controller' => 'Sectors', 'action' => 'view', $workplace->sector->id]) : '' ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Subsetor') ?></th>
                                <td><?= $workplace->has('subsector') ? $this->Html->link($workplace->subsector->name, ['controller' => 'Subsectors', 'action' => 'view', $workplace->subsector->id]) : '' ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Núcleo') ?></th>
                                <td><?= $workplace->has('core') ? $this->Html->link($workplace->core->name, ['controller' => 'Cores', 'action' => 'view', $workplace->core->id]) : '' ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($workplace->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($workplace->modified) ?></td>
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