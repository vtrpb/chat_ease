<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Truck $truck
 */

use Cake\Core\Configure;

$domain     = Configure::read('domain');        
$user_role  = $this->request->getSession()->read('Users.role'); 

?>

<script language="javascript" type="text/javascript">

  var domain = '<?php echo $domain; ?>';

  $(document).ready(function () {      

    $('#mileage').mask('000.000.000.000 km', {reverse: true});    


    $('#year').on('input', function() {
        var value = $(this).val();
        value = value.replace(/\D/g, ''); // Remove todos os caracteres que não são números
        $(this).val(value);
    });
    $('#year-model').on('input', function() {
        var value = $(this).val();
        value = value.replace(/\D/g, ''); // Remove todos os caracteres que não são números
        $(this).val(value);
    });

    $('#state-id').select2({
               "language": {
                   "noResults": function(){
                       return "(não encontrado...)";
                   }
               },
                escapeMarkup: function (markup) {
                    return markup;
                }
          });
     
     $('#city-id').select2({
               "language": {
                   "noResults": function(){
                       return "(não encontrado...)";
                   }
               },
                escapeMarkup: function (markup) {
                    return markup;
                }
          });  
     
      $("#state-id").on('change',function() {  
                
                var state_id = $(this).val();               

                const url = domain + '/cities/getByState/' + state_id +'.json';                                      

                $('.city-id').empty();

                $.getJSON(url, function (data) {                         

                       $.each(data.json_array, function (key, entry) { 
                            $('.city-id').append($("<option></option>").attr('value',entry.id).text(entry.name));                            
                      });                
                });                
                       
        }); 
      
  });

</script>

<style type="text/css">

 .select2-container--default .select2-selection--single {
  height: 100%;
  padding: 6px 12px;
  font-size: 16px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}
    
</style>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("VEÍCULOS", '/Trucks/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO VEÍCULO</li>
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
                        <?= $this->Form->create($truck,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                $tractions = [
                                    '4x2' => '4x2',
                                    '6x2' => '6x2',
                                    '6x4' => '6x4',
                                    '8x2' => '8x2',
                                    '8x4' => '8x4',
                                    '8x6' => '8x6',
                                    '10x4' => '10x4',
                                    '10x6' => '10x6',
                                    '10x8' => '10x8'
                                ];
                                $transmissions = [
                                    'automatica' => 'Automática',
                                    'automatizada' => 'Automatizada',
                                    'cvt' => 'CVT',
                                    'dupla_embreagem' => 'Dupla embreagem',
                                    'manual' => 'Manual',
                                    'Semi-automática' => 'Semi-automática'
                                ];
                                $implements =  [
                                    '' => '(sem implemento)',
                                    'basculante'  => 'Basculante',
                                    'bau_frigorifico' => 'Baú frigorífico',
                                    'bau_seco' => 'Baú seco',
                                    'carroceria' => 'Carroceria',
                                    'graneleiro' => 'Graneleiro',
                                    'prancha' => 'Prancha',
                                    'tanque' => 'Tanque',
                                ];
                                $colors = [
                                    'amarelo' => 'Amarelo',
                                    'azul' => 'Azul',
                                    'bege' => 'Bege',
                                    'branco' => 'Branco',
                                    'cinza' => 'Cinza',
                                    'laranja' => 'Laranja',
                                    'marrom' => 'Marrom',
                                    'prata' => 'Prata',
                                    'preto' => 'Preto',
                                    'verde' => 'Verde',
                                    'vermelho' => 'Vermelho',
                                    'ouro' => 'Ouro',
                                    'prata_fosco' => 'Prata fosco',
                                    'verde_militar' => 'Verde militar',
                                    'vermelho_metalico' => 'Vermelho metálico',
                                    'cinza_chumbo' => 'Cinza chumbo',
                                    'amarelo_limao' => 'Amarelo limão',
                                    'azul_celeste' => 'Azul celeste',
                                    'verde_limao' => 'Verde limão',
                                    'rosa' => 'Rosa',
                                    'vinho' => 'Vinho',
                                ];


                                echo "<div class=\"card-body\">";        
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-md-12\">" . $this->Form->control('user_id',['label'=>'Cliente','options'=>$users,'div' => false,'class' => 'form-control','readonly'=>'readonly'])."</div>";
                                echo "</div>";                               
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('truck_type_id',['label'=>'Tipo de Veículo','options'=>$truckTypes,'div' => false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('color',['label'=>'Cor','options'=>$colors,'div' => false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('state_id',['label'=>'Estado','required'=>true,'options'=>$states,'empty'=>'(selecione o Estado)','div' => false,'class' => 'form-control select2'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('city_id',['label'=>'Cidade','required'=>true,'options'=>$cities,'empty'=>'(não encontrada...)','div' => false,'class' => 'form-control select2 city-id',])."</div>";
                                echo "</div>";

                                echo "<div class=\"row\">";                                                                        
                                    echo "<div class=\"col-md-3\">".$this->Form->control('brand',['label' => 'Marca','type' => 'text','class' => 'form-control']) . "</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('model',['label'=>'Modelo','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-2\">" . $this->Form->control('year',['label'=>'Ano','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control'])."</div>";                             
                                    echo "<div class=\"col-md-2\">" . $this->Form->control('year_model',['label'=>'Ano Modelo','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control'])."</div>";                             
                                    echo "<div class=\"col-md-2\">" . $this->Form->control('mileage',['label'=>'Quilometragem','required'=>true,'type'=>'text','div' => 'false','class' => 'form-control','placeholder' => '000.000.000.000 km','maxlength' => 15])."</div>";                                    
                                echo "</div>";                                

                                echo "<div class=\"row\">";                                                                        
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('condition',['label'=>'Condição','required'=>true,'type'=>'select','options'=>['novo'=>'Novo','seminovo'=>'Seminovo'],'div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('traction',['label'=>'Tração','required'=>true,'type'=>'select','options'=>$tractions,'div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('transmission',['label'=>'Transmissão','required'=>true,'type'=>'select','options'=>$transmissions,'div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('implement',['label'=>'Implementento','type'=>'select','empty'=>'(sem implemento)','options'=>$implements,'div' => 'false','class' => 'form-control'])."</div>";
                                echo "</div>";                                                     

                                echo "<input type=\"hidden\" name=\"brand_hidden\"       id=\"brand_hidden\" value=\"\">";
                                echo "<input type=\"hidden\" name=\"model_hidden\"       id=\"model_hidden\" value=\"\">";
                                echo "<input type=\"hidden\" name=\"year_hidden\"        id=\"year_hidden\" value=\"\">";
                                echo "<input type=\"hidden\" name=\"year_model_hidden\" id=\"year_model_hidden\" value=\"\">";

                            
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

  <?php 
    $this->Html->scriptBlock('$(function() {
        $("[data-mask]").inputmask();
        });', ['block' => 'script']);
   ?> 