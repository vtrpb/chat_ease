<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
  
  use Cake\Core\Configure;

  $domain     = Configure::read('domain');        
  $user_role  = $this->request->getSession()->read('Users.role'); 

  if ($user->cnpj == '' )  {
    $isCompany = false;
  }
  else {
    $isCompany = true;
  }

?>

<script>

   var domain = '<?php echo $domain; ?>';
    
    $(document).ready(function ($) { 
            
            $('#username').keypress(function (e) {
                var regex = new RegExp("^[a-z0-9_@.]+$");
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                    return true;
                }
                else
                {
                e.preventDefault();
                alert('Apenas letras minúsculas! Sem espaços ou números!');
                return false;
                }
            });

            $("#cpf").mask('000.000.000-00', {reverse: true}); 
            $(".cpf").mask('000.000.000-00', {reverse: true}); 

            $("#cnpj").mask('00.000.000/0000-00', {reverse: false});             

            $("#date-of-birth").mask('00/00/0000', {reverse: true});             
            $(".date-of-birth").mask('00/00/0000', {reverse: true});             

            $("#mobile-number").mask('(00)00000-0000'); 
            $(".mobile-number").mask('(00)00000-0000'); 

            $("#commercial-number").mask('(00)00000-0000'); 
            $(".commercial-number").mask('(00)00000-0000'); 

            $("#address-zip-code").mask('00000-000', {reverse: true}); 
            $("#mobile-number-1").mask('(00)00000-0000'); 
            $("#mobile-number-2").mask('(00)00000-0000'); 

            /*$("#pf_pj_switch").bootstrapSwitch();
            $("#pj_fields").hide();

            $("#pf_pj_switch").on('switchChange.bootstrapSwitch', function(event, state) {
                if(state){
                    $("#pj_fields").show();
                }else{
                    $("#pj_fields").hide();
                }
            });*/
                               

            function clean_cep_search() {
                
                $("#address-state").val("");
                $("#address-city").val("");
                //$("#address-complement").val("");
                $("#address").val("");
                $("#address-district").val("");                        
            }           
            
            $("#address-zip-code").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validatecep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validatecep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#address-state").val("...");
                        $("#address-city").val("...");
                        //$("#address-complement").val("...");
                        $("#address").val("...");
                        $("#address-district").val("...");                        

                        //Consulta o webservice viacep.com.br/                        
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {

                            if (!("erro" in data)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#address-state").val(data.uf);
                                $("#address-city").val(data.localidade);
                                //$("#adress-complement").val(data.complemento);
                                $("#address").val(data.logradouro);
                                $("#address-district").val(data.bairro);                                
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                clean_cep_search();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        clean_cep_search();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    clean_cep_search();
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
            <li>EDITAR USUÁRIO</li>
        </ul>                        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <!--<div class="card card-primary card-tabs">                -->
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <?php
                                    //debug($isCompany) or die();
                                ?> 
                                <?php if (!$isCompany) : ?>
                                    <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-pf-tab" data-toggle="pill" href="#custom-tabs-one-pf" role="tab" aria-controls="custom-tabs-one-pf" aria-selected="true">Pessoa Física</a>
                                    </li>                                    
                                    <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-pj-tab" data-toggle="pill" href="#custom-tabs-one-pj" role="tab" aria-controls="custom-tabs-one-pj" aria-selected="false">Pessoa Jurídica</a>
                                    </li>                   
                                <?php endif; ?>

                                <?php if ($isCompany) : ?>
                                    <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-pj-tab" data-toggle="pill" href="#custom-tabs-one-pj" role="tab" aria-controls="custom-tabs-one-pj" aria-selected="true">Pessoa Jurídica</a>
                                    </li>
                                <?php endif; ?>                                


                                
                            </ul>
                        </div>
                        <div class="card-body">
                            
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <?php if (!$isCompany) : ?>    
                                    <div class="tab-pane fade show active" id="custom-tabs-one-pf" role="tabpanel" aria-labelledby="custom-tabs-one-pf-tab">
                                            <div class="form-group"> 
                                                <?= $this->Form->create($user,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                                                    <?php  

                                                        echo "<div class=\"card-body\">";                                                                                    

                                                        echo "<div class=\"row\">";                                    
                                                            echo "<div class=\"col-md-4\">" . $this->Form->control('name',['label'=>'Nome','type'=>'text','div' => 'false','class' => 'form-control','readonly'=>'readonly'])."</div>";
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('cpf',['label'=>'C.P.F','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                            echo "<div class=\"col-md-2\">" . $this->Form->control('date_of_birth',['label'=>'Data de nascimento','type'=>'text','required'=>true,'div' => true,'class' => 'form-control'])."</div>";
                                                        echo "</div>";                                                                                                                                             

                                                        echo "<div class=\"row\">";
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('email',['label'=>'Email','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('mobile_number',['label'=>'Celular','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('commercial_number',['label'=>'Tel.comercial <span class="badge badge-success">whatsapp anúnico</span>','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control','escape'=>false])."</div>";
                                                        echo "</div>";  
                                                        
                                                        echo "<br><h5>MUDAR SENHA</h5><hr>";

                                                        echo "<div class=\"row\">";                                    
                                                            echo "<div class=\"col-md-2\">" . $this->Form->control('actual_password',['label'=>'Senha atual','type'=>'password','div' => false,'class' => 'form-control'])."</div>";
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('new_password',['label'=>'Nova senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";                                    
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('con_new_password',['label'=>'Confirma nova senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";                                   
                                                        echo "</div>";   

                                                        echo "<div class=\"row\">";
                                                        echo "</div>";  
                                                        echo "<br>";
                                                        if ($user_role == 'admin')  {
                                                            echo '<div class="card">';
                                                                echo '<div class="card-header">';
                                                                    echo '<h5 class="card-title">REPRESENTANTE</h5>';
                                                                echo '</div>';
                                                                echo '<div class="card-body">';
                                                                    echo '<div class="row">';
                                                                        echo '<div class="col-md-3">';
                                                                            echo '<div class="form-group">';
                                                                                echo '<div class="form-check">';
                                                                                    echo $this->Form->control('is_representative', [
                                                                                        'label' => 'É representante?',
                                                                                        'type' => 'checkbox',
                                                                                        'div' => false,
                                                                                        'required' => false,
                                                                                        'class' => 'form-check-input'
                                                                                    ]);
                                                                                echo '</div>';
                                                                            echo '</div>';
                                                                        echo '</div>';

                                                                        echo '<div class="col-md-3">';
                                                                            echo '<div class="form-group">';
                                                                                echo $this->Form->control('representative_code', [
                                                                                    'label' => 'Código',
                                                                                    'type' => 'text',
                                                                                    'div' => false,
                                                                                    'required' => false,
                                                                                    'class' => 'form-control'
                                                                                ]);
                                                                            echo '</div>';
                                                                        echo '</div>';
                                                                    echo '</div>'; // End of row
                                                                echo '</div>'; // End of card-body
                                                            echo '</div>'; // End of card
                            

                                                        }                                                        

                                                        
                                                        echo "<div><p> </p></div>";
                                                            echo "<div class=\"row\">";                                    
                                                            echo "<div class=\"col-md-8\">". $this->Form->button('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR',['type'=>'submit','class'=>'btn btn-default'])."</div>";
                                                          echo "</div>";
                                                        
                                                        echo "</div>";
                                                    ?>
                                                
                                                <?= $this->Form->end() ?>                     
                                            </div>                            
                                    </div>
                                <?php endif; ?>

                                <?php if ($isCompany) : ?>
                                    <div class="tab-pane fade show active" id="custom-tabs-one-pj" role="tabpanel" aria-labelledby="custom-tabs-one-pj-tab">
                                <?php endif; ?>

                                <?php if (!$isCompany) : ?>
                                    <div class="tab-pane fade" id="custom-tabs-one-pj" role="tabpanel" aria-labelledby="custom-tabs-one-pj-tab">
                                <?php endif; ?>

                                        <div class="form-group"> 
                                            <?= $this->Form->create($user,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                                                <?php  

                                                    echo "<div class=\"card-body\">";                                                                                      

                                                    echo "<div class=\"row\">";                                    
                                                        echo "<div class=\"col-md-4\">" . $this->Form->control('name',['label'=>'Nome','type'=>'text','div' => 'false','class' => 'form-control','readonly'=>'readonly'])."</div>";
                                                        echo "<div class=\"col-md-3\">" . $this->Form->control('cpf',['label'=>'C.P.F','type'=>'text','div' => 'false','class' => 'form-control cpf','readonly'=>'readonly'])."</div>";
                                                        echo "<div class=\"col-md-2\">" . $this->Form->control('date_of_birth',['label'=>'Data de nascimento','type'=>'text','required'=>true,'div' => true,'class' => 'form-control date-of-birth','readonly'=>'readonly'])."</div>";
                                                    echo "</div>";                                                                                     

                                                    echo "<div id=\"pj_fields\">";
                                                        echo "<div class=\"row\">";                                    
                                                            echo "<div class=\"col-md-4\">" . $this->Form->control('corporate_name',['label'=>'Nome da Empresa','required'=>'false','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('cnpj',['label'=>'C.N.P.J','type'=>'text','required'=>'false','div' => 'false','class' => 'form-control','readonly'=>'readonly'])."</div>";
                                                            echo "<div class=\"col-md-3\">" . $this->Form->control('commercial_number',['label'=>'Tel.comercial <span class="badge badge-success">whatsapp anúncio</span>','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control','escape'=>false])."</div>";
                                                        echo "</div>";                                                                                         
                                                    echo "</div>";


                                                    echo "<div class=\"row\">";
                                                        echo "<div class=\"col-md-3\">" . $this->Form->control('email',['label'=>'Email','type'=>'text','div' => 'false','class' => 'form-control','readonly'=>'readonly'])."</div>";
                                                        echo "<div class=\"col-md-3\">" . $this->Form->control('mobile_number',['label'=>'Celular','type'=>'text','div' => 'false','class' => 'form-control mobile-number','readonly'=>'readonly'])."</div>";
                                                    echo "</div>";  

                                                    
                                                    echo "<br><h5>MUDAR SENHA</h5><hr>";

                                                    echo "<div class=\"row\">";                                    
                                                        echo "<div class=\"col-md-2\">" . $this->Form->control('actual_password',['label'=>'Senha atual','type'=>'password','div' => false,'class' => 'form-control'])."</div>";
                                                        echo "<div class=\"col-md-3\">" . $this->Form->control('new_password',['label'=>'Nova senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";                                    
                                                        echo "<div class=\"col-md-3\">" . $this->Form->control('con_new_password',['label'=>'Confirma nova senha','type'=>'password','div' =>false,'class' => 'form-control'])."</div>";                                   
                                                    echo "</div>";   

                                                    echo "<div class=\"row\">";
                                                    echo "</div>";  
                                                    echo "<br>";
                                                    if ($user_role == 'admin')  {
                                                            echo '<div class="card">';
                                                                echo '<div class="card-header">';
                                                                    echo '<h5 class="card-title">REPRESENTANTE</h5>';
                                                                echo '</div>';
                                                                echo '<div class="card-body">';
                                                                    echo '<div class="row">';
                                                                        echo '<div class="col-md-3">';
                                                                            echo '<div class="form-group">';
                                                                                echo '<div class="form-check">';
                                                                                    echo $this->Form->control('is_representative', [
                                                                                        'label' => 'É representante?',
                                                                                        'type' => 'checkbox',
                                                                                        'div' => false,
                                                                                        'required' => false,
                                                                                        'class' => 'form-check-input'
                                                                                    ]);
                                                                                echo '</div>';
                                                                            echo '</div>';
                                                                        echo '</div>';

                                                                        echo '<div class="col-md-3">';
                                                                            echo '<div class="form-group">';
                                                                                echo $this->Form->control('representative_code', [
                                                                                    'label' => 'Código',
                                                                                    'type' => 'text',
                                                                                    'div' => false,
                                                                                    'required' => false,
                                                                                    'class' => 'form-control'
                                                                                ]);
                                                                            echo '</div>';
                                                                        echo '</div>';
                                                                    echo '</div>'; // End of row
                                                                echo '</div>'; // End of card-body
                                                            echo '</div>'; // End of card
                            

                                                        } 

                                                    echo "<br>";
                                                    echo "<div class=\"row\">";
                                                        //echo "<div class=\"col-md-12\">" . $this->Form->control('file', ['type' => 'file', 'label' => 'CNH (.pdf, .jpg, .png)','required'=>true])."</div>";                                    
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
            <!--</div>                                   -->
        </div>
    </div>
        <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
