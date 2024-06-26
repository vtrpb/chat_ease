<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operation $operation
 */
?>

<script>   
    
    $(document).ready(function ($) {            
            
            $("#initial-date").mask('00/00/0000', {reverse: true}); 
            $("#final-date").mask('00/00/0000', {reverse: true}); 
            
    });  

</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("OPERAÇÕES", '/Operations/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>EDITA OPERAÇÃO</li>
        </ul>                        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card card-danger">
                        <?= $this->Form->create($operation,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('name', ['label'=>'Nome da Operação','required' => true,'div' => false,'class'=>'form-control'])."</div>";                                        
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('alias', ['label'=>'Abreviatura','required' => true,'div' => false,'class'=>'form-control'])."</div>";                                                   
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('initial_date', ['label'=>'Data Inicial','type'=>'text','required' => true,'div' => false,'class'=>'form-control'])."</div>";                                                   
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('final_date', ['label'=>'Data Final','type'=>'text','required' => true,'div' => false,'class'=>'form-control'])."</div>";                                                   
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('status', ['label'=>'Status','options'=>['aguardando_autorizacao'=>'Aguardando autorização','em_andamento'=>'Em andamento','concluida'=>'Concluída'],'required' => true,'div' => false,'class'=>'form-control'])."</div>";                                                   
                                  echo "</div>";

                                  echo "<div><p> </p></div>";
                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                  echo "</div>";

                                echo "</div>";                                
                                
                            ?>                        

                        
                        <?= $this->Form->end() ?>                     
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->