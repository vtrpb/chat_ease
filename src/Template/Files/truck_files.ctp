<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File[]|\Cake\Collection\CollectionInterface $files
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
                <li class="active"><?= $this->Html->link("VEÍCULOS", '/Trucks/index') ?></li> / 
                <li><?= $truck->brand . ' / '.$truck->model ?></li> / 
                <li>ARQUIVOS</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cadastra novo arquivo">NOVO ARQUIVO</button>',['controller' => 'Files','action' => 'add','Trucks',$truck->id],['escape' => false]); ?>                                                           
                </ul>    
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Pesquisar arquivos...','class'=>'form-control']);
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
                                    <th scope="col"><?= $this->Paginator->sort('counter','#') ?></th>                                                                        
                                    <th scope="col"><?= $this->Paginator->sort('file','Arquivo') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('type','Tipo') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?>                                    
                                <?php foreach ($files as $file):  ?>
                                <tr>
                                    <td><?= $this->Number->format($counter) ?></td>                                    
                                    <td>
                                        <?= $this->Html->link($file->hash, ['controller' => 'files', 'action' => 'download', $file->hash], ['target' => '_blank']) ?>
                                    </td>
                                         <?php 

                                            $width = 50;
                                            $height = 50;

                                            // extensions array('jpeg', 'jpg', 'gif', 'png', 'pdf', 'tif', 'tiff', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'csv', 'numbers', 'ppt', 'pptx', 'mp3','wav');
                                            switch ($file->type) {
                                                case "jpeg":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-jpg.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "jpg":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-jpg.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "gif":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-gif.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "png":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-png.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "pdf":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pdf.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "tif":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-tiff.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "tiff":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-tiff.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "doc":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-docx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "docx":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-docx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "txt":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-txt.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "xls":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-xlsx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "xlsx":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-xlsx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "csv":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-csv.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "numbers":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-numbers.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "ppt":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pptx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "pptx":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pptx.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "mp3":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-mp3.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "wav":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-wav.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "html":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                case "htm":
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-html.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                                default:                                                    
                                                    echo "<td>" . $this->Html->link("<img  height=". $height . " width=" . $width . " src=" . $domain . "/img/icon-pdf.png" . " class=\"img-responsive\" title=\"".$file->name."\">", ['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]) . "</td>";
                                                    break;
                                            }

                                        ?>    
                                    <td><?= h($file->modified) ?></td>
                                    <td class="actions text-nowrap">                                        
                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-file"  title="Download"></button>',['controller'=>'Files','action' => 'download',$file->hash],['escape' => false]); ?>
                                        <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir"></button>',['action' => 'delete',$file->id],['escape' => false,'confirm'=>'Tem certeza que excluir o arquivo "'. $file->hash.'.' . $file->type . '"?']); ?>
                                    </td>
                                </tr>
                                <?php $counter++; ?>
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