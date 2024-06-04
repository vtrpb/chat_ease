<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportTemplate $reportTemplate
 */
use Cake\Core\Configure;

$domain = Configure::read('domain');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("MODELOS DE DOCUMENTOS", '/ReportTemplates/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$reportTemplate->name ?> </li>                        
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
                            <?php 
                                //debug($reportTemplate) or die(); 
                            ?>
                            <tr>
                                <th scope="row"><?= __('Id') ?></th>
                                <td><?= $this->Number->format($reportTemplate->id) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Travado para edição') ?></th>
                                <td><?= $reportTemplate->locked ? __('SIM') : __('NÃO'); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Tipo de Documento') ?></th>
                                <td><?= $reportTemplate->report_type->name ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Setor') ?></th>
                                <td><?= $reportTemplate->sector->name ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Subsetor') ?></th>
                                <td><?= $reportTemplate->Subsectors['name'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Núcleo') ?></th>
                                <td><?= $reportTemplate->core->name ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Nome do modelo') ?></th>
                                <td><?= h($reportTemplate->name) ?></td>
                            </tr>                                
                            <tr>
                                <th scope="row"><?= __('Documento') ?></th>
                                <td><?php print_r($reportTemplate->template) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($reportTemplate->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($reportTemplate->modified) ?></td>
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