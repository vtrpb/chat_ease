<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workplace $workplace
 */

use Cake\Core\Configure;
$domain = Configure::read('domain');

?>

<script>

    var domain = '<?php echo $domain; ?>';

    $(document).ready(function ($) {        

        $("#new-sector-id").on('change',function() { 

                //window.alert('Hello World!');
                
                var sector_id = $(this).val();               

                const url = domain + '/Subsectors/getBySectorId/' + sector_id +'.json';                                      

                $('.new-subsector-id').empty();
                $('.new-subsector-id').append($("<option></option>").attr('value','').text('(selecione o Subsetor pesquisado)'));

                $.getJSON(url, function (data) {                         

                       $.each(data.json_array, function (key, entry) { 
                            $('.new-subsector-id').append($("<option></option>").attr('value',entry.id).text(entry.name));                            
                      });                
                });                
                       
        });                       

        $("#new-subsector-id").on('change',function() { 
                
                var subsector_id = $(this).val();               

                const url = domain + '/Cores/getBySubsectorId/' + subsector_id +'.json';                                      

                $('.new-core-id').empty();
                $('.new-core-id').append($("<option></option>").attr('value','').text('(selecione o Núcleo pesquisado)'));

                $.getJSON(url, function (data) {                         

                       $.each(data.json_array, function (key, entry) { 
                            $('.new-core-id').append($("<option></option>").attr('value',entry.id).text(entry.name));                            
                      });                
                });                
                       
        });                       

        
    }); 
</script> 


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("LOTAÇÕES DE TRABALHO", '/Workplaces/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>MODIFICA LOTAÇÃO DE TRABALHO</li>
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
                        <?= $this->Form->create($workplace,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('user_id', ['label'=>'Analista','options'=>$users,'div' => false,'class'=>'form-control'])."</div>";                                        
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">".$this->Form->control('new_sector_id', ['label'=>'Setor','options'=>$sectors,'empty' => '(selecione o Setor)','div' => false,'class'=>'form-control new-sector-id'])."</div>";                                                   
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                                                        
                                    echo "<div class=\"col-8\">".$this->Form->control('new_subsector_id', ['label'=>'Subsetor','type'=>'select','empty' => '(selecione o SubSetor)','div' => false,'class'=>'form-control new-subsector-id'])."</div>";                                       
                                  echo "</div>";

                                  echo "<div class=\"row\">";                                                                              
                                  echo "<div class=\"col-8\">".$this->Form->control('new_core_id', ['label'=>'Núcleo','empty'=>'(selecione o Núcleo)','type'=>'select','div' => false,'class'=>'form-control new-core-id'])."</div>";
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