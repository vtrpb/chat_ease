<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportType $reportType
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("TIPO DE DOCUMENTO", '/ReportTypes/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$reportType->name ?> </li>                        
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
                                <td><?= $this->Number->format($reportType->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Nome') ?></th>
                                <td><?= h($reportType->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Abreviatura') ?></th>
                                <td><?= h($reportType->alias) ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($reportType->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($reportType->modified) ?></td>
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