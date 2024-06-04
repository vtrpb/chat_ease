<?php

use Cake\Core\Configure;

$domain     = Configure::read('domain');        

?>

<style>
  .card {
    background-color: #fff;
  }
  .bold-text {
    font-weight: bold;
  }
  .gray-text {
    color: gray;
  }
  .larger-text {
    font-size: 1.5em;
  }
  .smaller-text {
    font-size: 0.8em;
  }
  .flex-container {
    display: flex;
    justify-content: space-between;
  }
  .bottom-info {
    margin-top: auto;
  } 

  .img-box {
    height: 260px; /* altura fixa desejada */
     margin-top: 20px; /* espaçamento desejado entre as divs */
    object-fit: cover; /* redimensiona a imagem para preencher a div pai */
  }
 
</style>

<script>

$(document).ready(function() {
     
     var min_truck_price =  <?= $minTruckPrice; ?>;
     var max_truck_price =  <?= $maxTruckPrice; ?>;
     var min_mileage     =  <?= $minMileage; ?>;
     var max_mileage     =  <?= $maxMileage; ?>;

    var slider_price = $("#price").ionRangeSlider({
        skin: "big",
        type: "double",        
        prefix: "R$ ",
        min: min_truck_price,
        max: max_truck_price,
        from: 0,
        to: 1000000,
        grid: true
      });

    var slider_mileage = $("#km").ionRangeSlider({
        skin: "big",
        type: "double",        
        prefix: "KM ",        
        min: min_mileage,
        max: max_mileage,
        from: 0,
        to: 3000000,
        grid: true
    });

    // Limpar filtros
    $('#btn-clean').click(function() {        
        $('#btn-main-search').click();        
    });  
    
    var slider_price_instance   = slider_price.data("ionRangeSlider");
    var slider_mileage_instance = slider_mileage.data("ionRangeSlider");

    
    slider_price_instance.update({
      onChange: function(data) {
        // Atribua os valores mínimo e máximo aos campos hidden
        $("#min_price_hidden").val(data.from);
        $("#max_price_hidden").val(data.to);
      }
    });

    slider_mileage_instance.update({
      onChange: function(data) {
        // Atribua os valores mínimo e máximo aos campos hidden
        $("#min_mileage_hidden").val(data.from);
        $("#max_mileage_hidden").val(data.to);        
        
      }
    });

    
    $("#formSearch").submit(function(event) {    

      $("#min_price_hidden").val(slider_price.data("from"));
      $("#max_price_hidden").val(slider_price.data("to"));
      $("#min_mileage_hidden").val(slider_mileage.data("from"));
      $("#max_mileage_hidden").val(slider_mileage.data("to"));      

      //document.querySelector('#state_hidden').value = $('#state option:selected').text();              
      //document.querySelector('#brand_hidden').value = $('#brand option:selected').text();              
      //document.querySelector('#model_hidden').value = $('#model option:selected').text();              


    });

      

    $("#state").on('change',function() {          
        document.querySelector('#state_hidden').value = $('#state option:selected').text();              
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

        document.querySelector('#brand_hidden').value = $('#brand option:selected').text();              
    });  
   

    $("#model").on('change',function() {  
        var model       = document.querySelector('#model option:checked').textContent;      
        document.querySelector('#model_hidden').value = model;
    });          

});



</script>

<div class="container-fluid mt-80 mb-80">
  <div class="row no-gutters mt-20">
    <div class="col-md-3 ml-auto mr-auto">
      <div class="card mb-3">
          <div class="card-body">
              <h5 class="card-title">Filtros</h5>
              <?= $this->Form->create(null, [
                                          'url' => ['controller' => 'Site', 'action' => 'search'],
                                          'type' => 'get',
                                          'id' => 'formSearch'
                                      ]) ?>
                  <div class="form-group">
                      <label for="price">Faixa de Preço</label>
                      <input type="text" class="form-control" id="price" name="price" value="">
                  </div>
                  <div class="form-group">
                      <label for="km">Quilometragem</label>
                      <input type="text" class="form-control" id="km" name="km" value="">
                  </div>
                  <div class="form-group">
                      <?=$this->Form->control('state',['label'=>'Estado','type'=>'select','options'=>$states,'empty' => '(selecione o Estado)','div' => 'false','class' => 'form-control']) ?>                      
                  </div>                  
                  <div class="form-group">
                    <?php
                      echo $this->Form->control('truck_type_id',['label'=>'Tipo de Veículo','options'=>$truckTypes,'empty'=>'(selecione o tipo)','div' => false,'class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                          
                          echo $this->Form->control('brand', [
                              'label' => 'Marca',
                              'type' => 'select',
                              'options' => [],
                              'empty' => '(selecione a marca)',
                              'class' => 'form-control',
                          ]); 
                    ?>                     
                  </div>

                  <div class="form-group">
                      <?=$this->Form->control('model',['label'=>'Modelo','type'=>'select','empty' => '(selecione o modelo)','div' => 'false','class' => 'form-control']) ?>
                      <?= "<input type=\"hidden\" name=\"state_hidden\"  id=\"state_hidden\" value=\"\">"; ?>
                      <?= "<input type=\"hidden\" name=\"brand_hidden\"  id=\"brand_hidden\" value=\"\">"; ?>
                      <?= "<input type=\"hidden\" name=\"model_hidden\"  id=\"model_hidden\" value=\"\">"; ?> 
                      <?= "<input type=\"hidden\" name=\"max_truck_price_hidden\"  id=\"max_truck_price_hidden\" value=\"\">"; ?> 
                      <?= "<input type=\"hidden\" name=\"min_truck_price_hidden\"  id=\"min_truck_price_hidden\" value=\"\">"; ?> 
                      <?= "<input type=\"hidden\" name=\"max_mileage_hidden\"  id=\"max_mileage_hidden\" value=\"\">"; ?> 
                      <?= "<input type=\"hidden\" name=\"min_mileage_hidden\"  id=\"min_mileage_hidden\" value=\"\">"; ?> 
                  </div>                  
                  <div class="d-flex flex-column">
                      <?= $this->Form->button('<i class="fa fa-search"></i>&nbsp;Pesquisar', ['type' => 'submit', 'class' => 'btn btn-primary', 'title' => 'Ache seu pesado', 'id' => 'btn-search']) ?>
                      <button type="button" class="btn btn-secondary mt-2" id="btn-clean"><i class="fa fa-eraser"></i>&nbsp;Limpar Busca</button>
                  </div>
              <?= $this->Form->end() ?>
          </div>
      </div>
    </div>
    <div class="col-md-9" id="results">
      <div class="row">
         <?php foreach ($ads as $ad): ?>

      <?php if (!empty($ad->ad_images)): ?>        

        <div class="col-md-3">
        
          <div class="img-box mx-3">
            <div id="carousel<?= $ad->id ?>" class="carousel slide" data-ride="carousel" data-interval="false">
              <ol class="carousel-indicators">
                <?php foreach ($ad->ad_images as $index => $image): ?>
                  <li data-target="#carousel<?= $ad->id ?>" data-slide-to="<?= $index ?>" <?= $index === 0 ? 'class="active"' : '' ?>></li>
                <?php endforeach; ?>
              </ol>
              <div class="carousel-inner">
                <?php foreach ($ad->ad_images as $index => $image): ?>
                  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">                    
                      <a href=<?=$domain.'/site/viewAd/'.$ad->id?> target="_self" >                       
                      <img src="<?=$domain.'/files/ad_images/'.$image->name ?>" class="img-fluid carousel" alt="">
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
              <a class="carousel-control-prev" href="#carousel<?= $ad->id ?>" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="carousel-control-next" href="#carousel<?= $ad->id ?>" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próxima</span>
              </a>
            </div>
          </div>         

          <div class="card mx-3" onclick="window.open('<?= $domain ?>/site/viewAd/<?= $ad->id ?>', '_self');" style="cursor: pointer;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title bold-text"><?= $ad->truck->brand ?> <?= $ad->truck->model ?></h5>
              <p class="card-text gray-text">
                <?= $ad->title ?>
              </p>
              <p class="card-text bold-text larger-text">                
                <?= $ad->truck_price_display ?>
              </p>
              <div class="flex-container bottom-info">
                <p class="card-text smaller-text"><?= $ad->truck->year. '/'. $ad->truck->year_model ?></p>
                <p class="card-text smaller-text gray-text"><?= $ad->truck->mileage_display ?></p>
              </div>
            </div>
            <div class="card-footer">
              <p class="card-text">
                <i class="fas fa-map-marker"></i> <?= $ad->truck->city->name ?> - <?= $ad->truck->state->name ?>
              </p>
            </div>
          </div>       
        </div>

      <?php endif; ?>

    <?php endforeach; ?>
        
      </div>
    </div>
  </div>  
</div>
