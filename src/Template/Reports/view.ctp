<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */

use Cake\Core\Configure;

$domain = Configure::read('domain');

define('PATH_IMAGES', $domain);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
                <div class="breadcrumb-2">
                    <ul class="breadcrumb">
                        <li class="active"><?= $this->Html->link("DOCUMENTOS", '/Reports/index') ?> /</li>
                        <li><?= " ".$report->report_number ?> </li>                        
                    </ul>
                </div>                
                <div class="card">                    
                    <div class="card-body table-responsive p-0">                        
                        <table class="table">        
                            <tr>
                                <th scope="row"><?= __('Capa') ?></th>
                                <td><?php echo ($report->cover == true) ? 'Presente' : 'Ausente'; ?></td>                                
                            </tr>
                            <tr>            
                                <th scope="row"><?= __('Anexo Fotográfico') ?></th>
                                <td><?php echo ($report->photographic_attachment == true) ? 'Presente' : 'Ausente' ?></td>
                            </tr>                            
                            <tr>
                                <th scope="row"><?= __('Criador') ?></th>
                                <td><?= h($report->user->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Relatório Número') ?></th>
                                <td><?= h($report->report_number) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Assunto') ?></th>
                                <td><?= h($report->report_subject) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Origem') ?></th>
                                <td><?= h($report->report_origin) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Difusão') ?></th>
                                <td><?= h($report->report_difusion) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Número da Ordem Judicial') ?></th>
                                <td><?= h($report->report_number_judicial_order) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Data da Ordem Judicial') ?></th>
                                <td><?= h($report->report_date_judial_order) ?></td>
                            </tr>        
                            <tr>
                                <th scope="row"><?= __('Número da Ordem Judicial Anterior') ?></th>
                                <td><?= h($report->report_number_judicial_order_previous) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Data da Ordem Judicial Anterior') ?></th>
                                <td><?= h($report->report_date_judial_order_previous) ?></td>
                            </tr>        
                            <tr>
                                <th scope="row"><?= __('Data da Requisição') ?></th>
                                <td><?= h($report->requesting_date) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Data de Protocolo') ?></th>
                                <td><?= h($report->protocol_date) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Vítima') ?></th>
                                <td><?= h($report->victim_name) ?></td>
                            </tr>        
                            <tr>
                                <th scope="row"><?= __('Acusado') ?></th>
                                <td><?= h($report->accused) ?></td>
                            </tr>        
                            <tr>
                                <th scope="row"><?= __('Anexo Capa') ?></th>
                                <td><?= h($report->attachment) ?></td>
                            </tr>        
                            <tr>
                                <th scope="row"><?= __('Data do Fato') ?></th>
                                <td><?= h($report->fact_date) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Entregue') ?></th>
                                <td><?= $report->delivered ? __('SIM') : __('NÃO'); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($report->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($report->modified) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Documento') ?></th>
                                <td><?php print_r($report->report) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Anexo Fotográfico') ?></th>
                                <td>
                                    <?php     
                                        //debug($report->photographic_attachment);
                                        //debug($report_photos) or die();
                                        if ($report->photographic_attachment)  {                        
                                            $cont = 1;
                                            $photographic_attachment = "<table>";        
                                            foreach ($report_photos as $file)  {            
                                                if ($file->file_category == 2)  {
                                                    $photographic_attachment.= '<tr><td align="center"><figure><img src="'.PATH_IMAGES . "/report_files/".$file->filename.'"  width=80% height=100%><figcaption> <b>Imagem '.$cont.'.</b> '.$file->name.' (Data: <time>'.$file->created.'</time>).<br><b>Hash SHA256:</b> <i>'.hash_file('sha256',PATH_IMAGES . "/report_files/".$file->filename).'</i>.</figcaption></figure></td></tr><tr><td></td></tr>';
                                                    $cont++;
                                                }

                                            }
                                            $photographic_attachment.= "</table>";        
                                            echo $photographic_attachment;
                                        }
                                    ?>
                                </td>
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


<div class="reports view large-9 medium-8 columns content">
    <div class="breadcrumb-2">
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("DOCUMENTOS", '/Reports/index') ?></li>
            <li> <?= $report->report_number ?> </li>                        
        </ul>
    </div>    
    <ul class="list-inline">            
        <?= $this->Html->link('<button type="button" class="btn btn-default" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span> Editar</button>',['controller' => 'Reports','action' => 'edit',$report->id],['escape' => false]); ?>
        <?= $this->Html->link('<button type="button" class="btn btn-default" title="Gerar PDF do DOCUMENTO"><span class="glyphicon glyphicon-file" aria-hidden="true" ></span> Gerar PDF</button>',['controller' => 'Reports','action' => 'generatePdfReport',$report->id],['escape' => false]); ?>
    </ul>
  
</div>
