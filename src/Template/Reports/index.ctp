<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report[]|\Cake\Collection\CollectionInterface $reports
 */

use Cake\Core\Configure;

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("G.E.D.I", '/Reports/index') ?></li> / 
                <li>DOCUMENTOS</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Novo Relatório Técnico de Inteligência"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> RTEC</button>',['controller' => 'Reports','action' => 'add',1],['escape' => false]); ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Novo Relatório Técnico de Extração"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> RTEC EXTRAÇ.</button>',['controller' => 'Reports','action' => 'add',2],['escape' => false]); ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Novo Relatório de Inteligência"><span class="nav-icon fas fa-plus" aria-hidden="true" ></span> RELINT</button>',['controller' => 'Reports','action' => 'add',3],['escape' => false]); ?>
                </ul>    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Documento contendo...','class'=>'form-control']);
                            ?>
                            <div class="form-group">
                                    <br>
                                    <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="nav-icon fas fa-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'Reports','action' => 'index'],['escape' => false]); ?>
                            </div>                                   
                                    
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render() ?> 
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','Id') ?></th>
                                       <!-- <th scope="col"><?= $this->Paginator->sort('user_id','Criador') ?></th>  -->
                                        <th scope="col"><?= $this->Paginator->sort('report_type_id','Tip.Rel.') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_number','Rel.Téc.Num.') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_subject','Assunto') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_origin','Origem') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_difusion','Difusão') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_number_judicial_order','Núm.Ord.Jud.') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_date_judicial_order','Dat.Ord.Jud.') ?></th>
                                        <!--<th scope="col"><?= $this->Paginator->sort('report_date_judicial_order_previous','Dat.Ord.Jud.Ant.') ?></th> -->
                                        <th scope="col"><?= $this->Paginator->sort('report','Documento') ?></th>
                                        <!--<th scope="col"><?= $this->Paginator->sort('report_reference','Of.Ext.Jud.') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_process_number','Núm.Proc.') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_official_license_number','Núm.Of.Alv.') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_court','Vara') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_district','Distrito') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_judicial_order_name','Juiz') ?></th>-->
                                        <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                        <!--<th scope="col"><?= $this->Paginator->sort('report_attachment','') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_number_of_pages') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('report_extra_judicial_order') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('signed_date') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('signed') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('cover') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('photographic_attachment') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('canceled') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('fact_date') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>-->
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reports as $report):         ?>
                                <tr>
                                     <td><?= $this->Number->format($report->id) ?></td>
                                        <!--<td class="text-nowrap"><?= $report->has('user') ? $this->Html->link($report->user->name, ['controller' => 'Users', 'action' => 'view', $report->user->id]) : '' ?></td>-->
                                        <td>
                                            <?php
                                                if ($report->report_type_id == 1) echo "RTEC";
                                                if ($report->report_type_id == 2) echo "RTEC EXTRAÇ.";
                                                if ($report->report_type_id == 3) echo "RELINT";
                                            ?>
                                        </td>
                                        <td><?= h($report->report_number) ?></td>
                                        <td><?= h($report->report_subject) ?></td>
                                        <td><?= h($report->report_origin) ?></td>
                                        <td><?= h($report->report_difusion) ?></td>
                                        <td><?= h($report->report_number_judicial_order) ?></td>
                                        <td><?= h($report->report_date_judicial_order) ?></td>                                        
                                        <?php
                                            $max_size_text = 30;
                                            $size_text = strlen(strip_tags($report->report));

                                            if ($size_text > $max_size_text)  {
                                                                        
                                                echo '<td> '. $this->Html->link(strip_tags(substr($report->report,0,$max_size_text)) . "...",['controller'=>'Reports','action' => 'view',$report->id],['escape' => false,'title'=>strip_tags($report->report)]) . '&nbsp;</td>';  

                                            }
                                            else  {

                                                echo '<td> '.  h(substr(strip_tags($report->report),0,$max_size_text)) . '&nbsp;</td>';

                                            }
                                        ?>                                                            
                                        <td class="text-nowrap"><?= h($report->modified->i18nformat('dd/MM/yy HH:mm')) ?></td>                   
                                        <?php
                                            echo "<td class=\"actions text-nowrap\">";   
                                                    echo $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye" title="Detalhar"> </button>',['controller' => 'Reports','action' => 'view',$report->id],['escape' => false])." "; 
                                                    if ($report->signed) {                                    
                                                        echo $this->Html->link('<button type="button" class="btn btn-primary nav-icon fas fa-file-signature" style="color:green;" title="Recebido"></button>',['controller' => 'Reports','action' => 'view',$report->id],['escape' => false])." "; 
                                                    }
                                                    else  {                                                        
                                                        //echo $this->Form->postlink('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-file-signature" title="Assinar documento"></button>',['controller'=>'Reports','action' => 'deliverReport',$report->id,$report->report_number],['escape' => false,'confirm'=>'Tem certeza que deseja assinar este Documento '. $report->report_number . '?'])." ";
                                                        echo $this->Html->link('<button type="button" class="btn btn-info btn-sm nav-icon fas fa-edit" title="Editar"></button>',['controller' => 'Reports','action' => 'edit',$report->id],['escape' => false])." ";                                                     
                                                    } 
                                                    echo $this->Html->link('<button type="button" class="btn btn-secondary btn-sm nav-icon fas fa-file-pdf" title="Gerar PDF DOCUMENTO"><span class="glyphicon glyphicon-duplicate" aria-hidden="true" ></span></button>', ['controller' => 'Reports','action' => 'generatePdfReport', $report->id],['escape' => false])." ";                                                    
                                                    echo $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-folder" title="Arquivos"></button> ',['controller'=>'ReportFiles','action' => 'index',$report->id],['escape' => false]);
                                                    echo $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir DOCUMENTO"></button>',['controller'=>'Reports','action' => 'delete',$report->id],['escape' => false,'confirm'=>'Tem certeza que excluir o Laudo '. $report->report_number . '?'])." ";                            
                                            echo "</td>";
                                        ?>
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