<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

  use Cake\Core\Configure;

  $domain     = Configure::read('domain');        
  $user_role  = $this->request->getSession()->read('Users.role');   

?>

<script>

 var domain = '<?php echo $domain; ?>';
    
    $(document).ready(function ($) {             
           

            $("#cpf").mask('000.000.000-00', {reverse: true}); 
            $("#cnpj").mask('00.000.000/0000-00', {reverse: false});             
            $("#date-of-birth").mask('00/00/0000', {reverse: true});             
            $("#mobile-number").mask('(00)00000-0000'); 
            $("#commercial-number").mask('(00)00000-0000'); 

            $("#pf_pj_switch").bootstrapSwitch();
            $("#pj_fields").hide();

            $("#pf_pj_switch").on('switchChange.bootstrapSwitch', function(event, state) {
                if(state){
                    $("#pj_fields").show();
                }else{
                    $("#pj_fields").hide();
                }
            });
    });  

</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("USUÁRIOS", '/Users/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO USUÁRIO</li>
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
                        <?= $this->Form->create($user,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php 

                                echo "<div class=\"card-body\">";        

                                echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-12\">";
                                            echo "<input type=\"checkbox\" id=\"pf_pj_switch\" data-on-text=\"Pess.Fís.\" data-off-text=\"Pess.Jur.\" name=\"company-checkbox\"  data-bootstrap-switch>";
                                        echo "</div>";
                                echo "</div>";                                

                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-6\">" . $this->Form->control('name',['label'=>'Nome','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-3\">" . $this->Form->control('cpf',['label'=>'C.P.F','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                echo "</div>";                                                                                     

                                echo "<div id=\"pj_fields\" style=\"display:none\">";
                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-4\">" . $this->Form->control('corporate_name',['label'=>'Nome da Empresa','required'=>'false','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-3\">" . $this->Form->control('cnpj',['label'=>'C.N.P.J','type'=>'text','required'=>'false','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-2\">" . $this->Form->control('commercial_number',['label'=>'Telefone Comercial','required'=>'false','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";                                                                                         
                                echo "</div>";


                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-3\">" . $this->Form->control('email',['label'=>'Email','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-3\">" . $this->Form->control('mobile_number',['label'=>'Celular','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-3\">" . $this->Form->control('date_of_birth',['label'=>'Data de nascimento','type'=>'text','required'=>true,'div' => true,'class' => 'form-control'])."</div>";
                                echo "</div>";  

                                echo "<div class=\"row\">";                                                                        
                                    echo "<div class=\"col-3\">" . $this->Form->control('password',['label'=>'Senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-3\">" . $this->Form->control('con_password',['label'=>'Confirma senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";                                   
                                echo "</div>";                               
                                
                                echo "<div><p> </p></div>";
                                    echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR',['type'=>'submit','class'=>'btn btn-default'])."</div>";
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