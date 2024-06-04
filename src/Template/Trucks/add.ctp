<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Truck $truck
 */

use Cake\Core\Configure;

$domain     = Configure::read('domain');        
$user_role  = $this->request->getSession()->read('Users.role'); 

$currentYear = date('Y');
$years       = range($currentYear, 1940);

?>

<script language="javascript" type="text/javascript">

  var domain = '<?php echo $domain; ?>';

  $(document).ready(function () {      

    var years = <?php echo json_encode($years); ?>;

    $.each(years, function(index, value) {
        $("<option>").val(value).text(value).appendTo("#year");
    });

    $('#mileage').mask('000.000.000.000 km', {reverse: true});    

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

     $('#model').select2({
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
    

        $("#truck-type-id").on('change', function() {

          var truckTypeId = this.value;          

          $.ajax({
            url: '/truck-brands/get-brands-with-models-by-type/' + truckTypeId,
            method: 'GET',
            dataType: 'json',
            success: function(response) {                

              var brandsWithModels = response.brandsWithModels;

              $("#brand").empty();
              document.querySelector('#brand').innerHTML = '<option value="">(selecione a marca)</option>';            

              // Preencher o select de marcas com as marcas retornadas
              $.each(brandsWithModels, function(index, brand) {
                var option = $('<option>').val(brand.id).text(brand.name);
                $("#brand").append(option);
              });
            }
          });
        });

        $("#brand").on('change', function() {

          var truckTypeId  = document.querySelector('#truck-type-id').value;
          var truckBrandId = this.value;          

          $.ajax({
            url: '/truck-models/get-models-by-type-and-brand/' + truckTypeId + '/' + truckBrandId,
            method: 'GET',
            dataType: 'json',
            success: function(response) {                

              var models = response.models;

              $("#model").empty();
              document.querySelector('#model').innerHTML = '<option value="">(selecione o modelo)</option>';            

              // Preencher o select de marcas com as marcas retornadas
              $.each(models, function(index, model) {
                  var option = $('<option>').val(model.id).text(model.name);
                  $("#model").append(option);
              });
            }
          });
        });        
      

        $("#year").on('change',function() {                

            var year      = parseInt($(this).val());
            var yearModel = year + 1;            
            
            $("#year-model").empty();            

            $('<option>').val(yearModel).text(yearModel).appendTo("#year-model");
            $('<option>').val(year).text(year).appendTo("#year-model");

        });      

        $("#form-template").on('submit',function(event)  {            

            var brand       = document.querySelector('#brand       option:checked').textContent;
            var model       = document.querySelector('#model       option:checked').textContent;
            var year        = document.querySelector('#year        option:checked').textContent;
            var year_model  = document.querySelector('#year-model  option:checked').textContent;

            document.querySelector('#brand_hidden').value = brand;
            document.querySelector('#model_hidden').value = model;
            document.querySelector('#year_hidden').value  = year;
            document.querySelector('#year_model_hidden').value  = year_model;            

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
                                    'azul_celeste' => 'Azul celeste',
                                    'bege' => 'Bege',
                                    'branco' => 'Branco',
                                    'bronze' => 'Bronze',
                                    'cinza' => 'Cinza',
                                    'cinza_chumbo' => 'Cinza chumbo',
                                    'dourado' => 'Dourado',
                                    'grafite' => 'Grafite',
                                    'laranja' => 'Laranja',
                                    'marrom' => 'Marrom',
                                    'ouro' => 'Ouro',
                                    'prata' => 'Prata',
                                    'prata_fosco' => 'Prata fosco',
                                    'preto' => 'Preto',
                                    'roxo' => 'Roxo',
                                    'rosa' => 'Rosa',
                                    'turquesa' => 'Turquesa',
                                    'verde' => 'Verde',
                                    'verde_limao' => 'Verde limão',
                                    'verde_militar' => 'Verde militar',
                                    'vermelho' => 'Vermelho',
                                    'vermelho_metalico' => 'Vermelho metálico',
                                    'vinho' => 'Vinho',
                                ];


                                echo "<div class=\"card-body\">";        
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-md-12\">" . $this->Form->control('user_id',['label'=>'Cliente','options'=>$users,'div' => false,'class' => 'form-control','readonly'=>'readonly'])."</div>";
                                echo "</div>";                               
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('truck_type_id',['label'=>'Tipo de Veículo','options'=>$truckTypes,'empty'=>'(selecione o tipo)','div' => false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('color',['label'=>'Cor','options'=>$colors,'div' => false,'class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('state_id',['label'=>'Estado','required'=>true,'options'=>$states,'empty'=>'(selecione o Estado)','div' => false,'class' => 'form-control select2'])."</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('city_id',['label'=>'Cidade','required'=>true,'options'=>'','empty'=>'(não encontrada...)','div' => false,'class' => 'form-control select2 city-id',])."</div>";
                                echo "</div>";

                                echo "<div class=\"row\">";                                                                        
                                    $options = [];                                    
                                    echo "<div class=\"col-md-3\">".$this->Form->control('brand', [
                                        'label' => 'Marca',
                                        'type' => 'select',
                                        'options' => $options,
                                        'empty' => '(selecione a marca)',
                                        'class' => 'form-control',
                                    ]) . "</div>";
                                    echo "<div class=\"col-md-3\">" . $this->Form->control('model',['label'=>'Modelo','required'=>true,'type'=>'select','empty' => '(selecione o modelo)','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "<div class=\"col-md-2\">" . $this->Form->control('year',['label'=>'Ano','required'=>true,'type'=>'select','empty' => '(selecione o ano)','div' => 'false','class' => 'form-control'])."</div>";                             
                                    echo "<div class=\"col-md-2\">" . $this->Form->control('year_model',['label'=>'Ano Modelo','required'=>true,'type'=>'select','empty' => '(selecione o ano)','div' => 'false','class' => 'form-control'])."</div>";                             
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
                                echo "<input type=\"hidden\" name=\"year_model_hidden\"  id=\"year_model_hidden\" value=\"\">";

                            
                                echo "<div><p> </p></div>";
                                    echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-md-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default','id'=>'btn-submit'])."</div>";
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