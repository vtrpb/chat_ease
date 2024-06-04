<?php

use Cake\Core\Configure;


$session = $this->request->session();
$domain  = Configure::read('domain');        

$id    = $ad->id;
$brand = $ad->truck->brand;
$model = $ad->truck->model;
$title = $ad->title;

$mensagemPadrao = "Olá! Estou interessado no veículo {$brand} {$model}, anunciado como '{$title}' no truckzone.com.br. Como posso obter mais informações ou agendar uma visita? (https://www.truckzone.com.br/site/view-ad/{$ad->id}})";

$telefone = '55'.preg_replace("/[^0-9]/","",$ad->user->mobile_number);;
$telefoneEncoded = urlencode($telefone);
$mensagemPadraoEncoded = urlencode($mensagemPadrao);

$linkWhatsApp = "https://api.whatsapp.com/send?phone={$telefoneEncoded}&text={$mensagemPadraoEncoded}";


?>

<style type="text/css">

    .flexible-slider .slider-items .item .img-box {
      width: 300px;
      height: 400px;
      overflow: hidden;
    }

    .flexible-slider .slider-items .item .img-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .whatsapp {
    display: inline-block;
    padding: 10px 20px;
    background-color: green;
    color: white;
    font-size: 16px;
    text-decoration: none;
    border-radius: 5px;
    }


</style>

<div class="row mt-20">
  <div class="container">
    <div class="flexible-slider" data-items="3" data-items-992="2" data-items-768="1" data-arrows="true" data-dots="true">
      <div class="slider-items">        
          <?php if (!empty($ad->ad_images)): ?>
            <?php foreach ($ad->ad_images as $index => $image): ?>
              <div class="item">
                <div class="img-box">
                  <a href="<?=$domain.'/files/ad_images/'.$image->name ?>" data-gal="prettyPhoto[galleryName]">                    
                    <div class="img-open">
                      <i class="ion-expand-outline"></i>
                    </div>
                    <img src="<?=$domain.'/files/ad_images/'.$image->name ?>" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>        
      </div>
      <div class="slider-nav-outer">
        <div class="slider-nav">
          <div class="slider-arrows">
            <div class="icon-prev"><i class="ion-chevron-back-sharp"></i></div>
            <div class="icon-next"><i class="ion-chevron-forward-sharp"></i></div>
          </div>
          <div class="slider-dots">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-80 mb-80">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title bold-text"><?= $ad->title ?></h3>
          <div class="table-responsive">
            <table class="table table-striped mt-4">
              <tbody>
                <tr>
                  <th>Tipo de Veículo</th>
                  <td class="bold-text"><?= $ad->truck->truck_type->name ?></td>
                </tr>
                <tr>
                  <th>Marca</th>
                  <td class="bold-text"><?= $ad->truck->brand ?></td>
                </tr>
                <tr>
                  <th>Modelo</th>
                  <td class="bold-text"><?= $ad->truck->model ?></td>
                </tr>
                <tr>
                  <th>Ano/Ano Modelo</th>
                  <td class="bold-text"><?= $ad->truck->year . '/' . $ad->truck->year_model ?></td>
                </tr>
                <tr>
                  <th>Quilometragem</th>
                  <td class="bold-text"><?= $ad->truck->mileage_display ?></td>
                </tr>
                <tr>
                  <th>Condição</th>
                  <td class="bold-text"><?= $ad->truck->condition_display ?></td>
                </tr>
                <tr>
                  <th>Tração</th>
                  <td class="bold-text"><?= $ad->truck->traction ?></td>
                </tr>
                <tr>
                  <th>Transmissão</th>
                  <td class="bold-text"><?= $ad->truck->transmission_display ?></td>
                </tr>
                <tr>
                  <th>Implemento</th>
                  <td class="bold-text"><?= $ad->truck->implement_display ?></td>
                </tr>
                <tr>                
                  <th>Preço</th>
                  <td class="bold-text"><?= $ad->truck_price_display ?></td>
                </tr>              
                <tr>
                  <th>Localização</th>
                  <td class="bold-text"><?= $ad->truck->city->name ?> - <?= $ad->truck->state->name ?></td>
                </tr>              
                <tr>
                  <th>Contato</th>                
                  <td class="bold-text"><a href="<?=$linkWhatsApp?>" target="_blank"><?= $this->Html->image("send-message.png",['with'=>162,'height'=>54]); ?> </a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-text mt-4">
            <?= $ad->content ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

