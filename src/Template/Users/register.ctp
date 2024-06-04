<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

  use Cake\Core\Configure;

  $domain     = Configure::read('domain');        
  //$user_role  = $this->request->getSession()->read('Users.role');   

?>

<script>

   var domain = '<?php echo $domain; ?>';
    
    $(document).ready(function ($) {                               

            $("#cpf").mask('000.000.000-00', {reverse: true}); 
            $(".cpf").mask('000.000.000-00', {reverse: true}); 

            $("#cnpj").mask('00.000.000/0000-00', {reverse: false});             

            $("#date-of-birth").mask('00/00/0000', {reverse: true});             
            $(".date-of-birth").mask('00/00/0000', {reverse: true});             

            $("#mobile-number").mask('(00)00000-0000'); 
            $(".mobile-number").mask('(00)00000-0000'); 

            $("#commercial-number").mask('(00)00000-0000'); 
            $(".commercial-number").mask('(00)00000-0000'); 

            /*$("#pf_pj_switch").bootstrapSwitch();
            $("#pj_fields").hide();

            $("#pf_pj_switch").on('switchChange.bootstrapSwitch', function(event, state) {
                if(state){
                    $("#pj_fields").show();
                }else{
                    $("#pj_fields").hide();
                }
            });*/
    });  



</script>
    

    <p>
        <div class="image" align="center">
            <a href="<?= $domain ?>"><img src=<?= $domain.'/img/logo_small.png' ?> class="img" alt="Truck Zone"></a>
        </div>    
    </p>
    <div class="row justify-content-center">
        <div class="col-md-md-8">                            
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("REGISTRE-SE", '/Users/register') ?></li>
                <li><strong>  /  </strong></li>
                <li>BEM VINDO AO <strong>TRUCK ZONE</strong></li>
            </ul>                        
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row justify-content-center">
          <div class="col-md-8">                            
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-pf-tab" data-toggle="pill" href="#custom-tabs-one-pf" role="tab" aria-controls="custom-tabs-one-pf" aria-selected="true">Pessoa Física</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-pj-tab" data-toggle="pill" href="#custom-tabs-one-pj" role="tab" aria-controls="custom-tabs-one-pj" aria-selected="false">Pessoa Jurídica</a>
                            </li>                   
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-pf" role="tabpanel" aria-labelledby="custom-tabs-one-pf-tab">
                                    <div class="form-group"> 
                                        <?= $this->Form->create($user,['id'=>'form-template','class'=>'form-horizontal','type' => 'file']) ?>                        
                                            <?php  

                                                echo "<div class=\"card-body\">";        

                                                /*echo "<div class=\"row\">";                                    
                                                        echo "<div class=\"col-md-12\">";
                                                            echo "<input type=\"checkbox\" id=\"pf_pj_switch\" data-on-text=\"Pess.Fís.\" data-off-text=\"Pess.Jur.\" name=\"company-checkbox\"  data-bootstrap-switch>";
                                                        echo "</div>";                                        
                                                echo "</div>";  */                              

                                                echo "<div class=\"row\">";                                    
                                                    echo "<div class=\"col-md-4\">" . $this->Form->control('name',['label'=>'Nome','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('cpf',['label'=>'C.P.F','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-2\">" . $this->Form->control('date_of_birth',['label'=>'Data de nascimento','type'=>'text','required'=>true,'div' => true,'class' => 'form-control'])."</div>";
                                                echo "</div>";                                                                                     

                                                /*echo "<div id=\"pj_fields\" style=\"display:none\">";
                                                    echo "<div class=\"row\">";                                    
                                                        echo "<div class=\"col-md-4\">" . $this->Form->control('corporate_name',['label'=>'Nome da Empresa','required'=>'false','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                        echo "<div class=\"col-md-3\">" . $this->Form->control('cnpj',['label'=>'C.N.P.J','type'=>'text','required'=>'false','div' => 'false','class' => 'form-control'])."</div>";
                                                        echo "<div class=\"col-md-2\">" . $this->Form->control('commercial_number',['label'=>'Telefone Comercial','required'=>'false','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                    echo "</div>";                                                                                         
                                                echo "</div>";*/


                                                echo "<div class=\"row\">";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('email',['label'=>'Email','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('mobile_number',['label'=>'Celular','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('commercial_number',['label'=>'Tel.comercial <span class="badge badge-success">whatsapp anúnico</span>','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control','escape'=>false])."</div>";
                                                echo "</div>";  

                                                
                                                echo "<div class=\"row\">";                                                                        
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('password',['label'=>'Senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('con_password',['label'=>'Confirma senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('referral_code',['label'=>'Código Parceiro','type'=>'text','div' =>false,'class' => 'form-control'])."</div>";
                                                echo "</div>";                               

                                                echo "<br>";
                                                echo "<div class=\"row\">";
                                                    echo "<div class=\"col-md-12\">" . $this->Form->control('file', ['type' => 'file', 'label' => 'CNH (.pdf, .jpg, .png)','required'=>true])."</div>";                                    
                                                echo "</div>";                                

                                                
                                                echo "<div><p> </p></div>";
                                                    echo "<div class=\"row\">";                                    
                                                    echo "<div class=\"col-md-8\">". $this->Form->button('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR',['type'=>'submit','class'=>'btn btn-default'])."</div>";
                                                  echo "</div>";
                                                
                                                echo "</div>";
                                            ?>
                                        
                                        <?= $this->Form->end() ?>                     
                                    </div>                            
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-pj" role="tabpanel" aria-labelledby="custom-tabs-one-pj-tab">
                                    <div class="form-group"> 
                                        <?= $this->Form->create($user,['id'=>'form-template','class'=>'form-horizontal','type' => 'file']) ?>                        
                                            <?php  

                                                echo "<div class=\"card-body\">";        

                                                /*echo "<div class=\"row\">";                                    
                                                        echo "<div class=\"col-md-12\">";
                                                            echo "<input type=\"checkbox\" id=\"pf_pj_switch\" data-on-text=\"Pess.Fís.\" data-off-text=\"Pess.Jur.\" name=\"company-checkbox\"  data-bootstrap-switch>";
                                                        echo "</div>";                                        
                                                echo "</div>";  */                              

                                                echo "<div class=\"row\">";                                    
                                                    echo "<div class=\"col-md-4\">" . $this->Form->control('name',['label'=>'Nome','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('cpf',['label'=>'C.P.F','type'=>'text','div' => 'false','class' => 'form-control cpf'])."</div>";
                                                    echo "<div class=\"col-md-2\">" . $this->Form->control('date_of_birth',['label'=>'Data de nascimento','type'=>'text','required'=>true,'div' => true,'class' => 'form-control date-of-birth'])."</div>";
                                                echo "</div>";                                                                                     

                                                echo "<div id=\"pj_fields\">";
                                                    echo "<div class=\"row\">";                                    
                                                        echo "<div class=\"col-md-4\">" . $this->Form->control('corporate_name',['label'=>'Nome da Empresa','required'=>'false','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                        echo "<div class=\"col-md-3\">" . $this->Form->control('cnpj',['label'=>'C.N.P.J','type'=>'text','required'=>'false','div' => 'false','class' => 'form-control'])."</div>";
                                                        echo "<div class=\"col-md-2\">" . $this->Form->control('commercial_number',['label'=>'Tel.comercial <span class="badge badge-success">whatsapp anúnico</span>','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control commercial-number','escape'=>false])."</div>";
                                                    echo "</div>";                                                                                         
                                                echo "</div>";


                                                echo "<div class=\"row\">";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('email',['label'=>'Email','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('mobile_number',['label'=>'Celular','type'=>'text','div' => 'false','class' => 'form-control mobile-number'])."</div>";
                                                echo "</div>";  

                                                
                                                echo "<div class=\"row\">";                                                                        
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('password',['label'=>'Senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";
                                                    echo "<div class=\"col-md-3\">" . $this->Form->control('con_password',['label'=>'Confirma senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";                                   
                                                echo "</div>";                               

                                                echo "<br>";
                                                echo "<div class=\"row\">";
                                                    echo "<div class=\"col-md-12\">" . $this->Form->control('file', ['type' => 'file', 'label' => 'CNH (.pdf, .jpg, .png)','required'=>true])."</div>";                                    
                                                echo "</div>";                                

                                                
                                                echo "<div><p> </p></div>";
                                                    echo "<div class=\"row\">";                                    
                                                    echo "<div class=\"col-md-8\">". $this->Form->button('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR',['type'=>'submit','class'=>'btn btn-default'])."</div>";
                                                  echo "</div>";
                                                
                                                echo "</div>";
                                            ?>
                                        
                                        <?= $this->Form->end() ?>                     
                                    </div>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row justify-content-center">
          <div class="col-md-md-8">                
                <div class="card card-danger">
                        
                </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--</div>-->