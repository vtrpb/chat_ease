<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ad $ad
 */

$this->loadHelper('DatePicker');

use Cake\Core\Configure;

$domain     = Configure::read('domain');        
$user_role  = $this->request->getSession()->read('Users.role'); 

?>

<script>  

    $(document).ready(function () {      

        //$('#truck-price').mask('000.000.000.000', {reverse: false});                
        $('#truck-price').on('input', function() {
            var value = $(this).val();
            value = value.replace(/\D/g, ''); // Remove todos os caracteres que não são números
            $(this).val(value);
        });
        
    });
   
   
</script>

<style type="text/css">
   
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("MEUS ANÚNCIOS", '/Ads/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO ANÚNCIO</li>
        </ul>                        
      </div>
    </div>   

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card card-danger">
                        <?= $this->Form->create($ad) ?>                                 
                        
                            <?php  
                                //debug($trucks) or die();                            
                                echo "<div class=\"card-body\">";        

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-12\">". $this->Form->control('user_id', ['label'=>'Usuário','options' => $users,'div' => false,'class' => 'form-control','readonly'=>'readonly']) ."</div>";
                                    echo "</div>";

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-12\">". $this->Form->control('truck_id',['label'=>'Caminhão','options' => $trucks,'div' => false,'class' => 'form-control'])."</div>";
                                    echo "</div>";

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-6\">" . $this->Form->control('title',['label'=>'Título','required'=>true,'div' => false,'class' => 'form-control']) . "</div>";
                                        //echo "<div class=\"col-md-6\">" . $this->Form->control('truck_price',['label'=>'Preço','type'=>'text','div' => false,'class' => 'form-control']) . "</div>";
                                        echo "<div class=\"col-md-6\">";
                                            echo "<label for=\"546\">Preço</label>";
                                            echo "<div class=\"input-group\" id=\"546\">";
                                                echo "<div class=\"input-group-prepend\">";
                                                    echo "<span class=\"input-group-text\">R$</span>";
                                                echo "</div>";                                                
                                                echo "<input type=\"text\" class=\"form-control\" name=\"truck_price\" id=\"truck-price\" required=\"true\">";                                                
                                                echo "<div class=\"input-group-append\">";
                                                echo "<span class=\"input-group-text\">,00</span>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</div>";  
                                        
                                    echo "</div>";

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-12\">" . $this->Form->control('content',['label'=>'Descrição','required'=>true,'div' => false,'class' => 'form-control','type'=>'textarea']). "</div>";
                                    echo "</div>";                                                                    

                                    if ($user_role == 'individual')  {                                        
                                        echo "<div class=\"row\">";                                    
                                            echo "<div class=\"col-md-12\">" . $this->Form->control('ad_plan_id',['label'=>'Plano','options'=>$adPlans,'required'=>true,'div' => false,'class' => 'form-control']). "</div>";
                                        echo "</div>";                                                                    
                                    }

                                    
                            
                                echo "<div><p> </p></div>";
                                    echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-md-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
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
</div>