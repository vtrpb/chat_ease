<?php

use Cake\Core\Configure;

$domain     = Configure::read('domain');        

?>


    <!-- Slider Revolution -->
    <div class="rev_slider_wrapper fullwidthbanner-container">
        <div id="slider-1" class="rev_slider" style="display:none;" data-version="5.0.7">    
            <ul>    
                <!-- Slide 1 -->
                <li
                data-index="slider-layer1"
                data-transition="fade"
                data-slotamount="default" 
                data-easein="default"
                data-easeout="default"
                data-masterspeed="default"
                data-saveperformance="off">

                <!-- Primary Image -->
                <img src=<?=$domain."/images/1-1-1.jpg" ?> data-lazyload=<?=$domain."/img/caminhoneiro.png"?> alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                <!-- Lead Text -->
                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 h3" 
                data-x="['left','left','left','left']" 
                data-hoffset="['0','20','20','10']"  
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['-40','-10','-20','0']"  
                data-fontsize="['46','32','30','24']" 
                data-lineheight="['58','55','55','35']" 
                data-color="['#ffffff']" 
                data-width="['500','550','500','390']" 
                data-height="220" 
                data-whitespace="normal" 
                data-frames='[{"delay":400,"speed":500,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power2.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                data-start="1000"  
                data-splitin="none"  
                data-splitout="none"  
                data-responsive_offset="on"  style="z-index: 11; min-width: 600px; max-width: 600px; font-weight:800; white-space: normal; letter-spacing: -2px">Uma plataforma online de compra e venda de pesados</div>

                <!-- Paragraph Text -->
                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 h4 m-0" 
                data-x="['left','left','left','left']" 
                data-hoffset="['0','20','20','10']"  
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['35','0','0','-10']" 
                data-width="['500','500','500','390']" 
                data-fontsize="['20', '18', '20', '16']" 
                data-lineheight="['36','32','40','35']" 
                data-height="100" 
                data-whitespace="normal" 
                data-transform_idle="o:1;" 
                data-frames='[{"delay":400,"speed":700,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                data-start="1500"  
                data-splitin="none"  
                data-splitout="none"  
                data-responsive_offset="on" style="z-index: 10; white-space: normal;"></div>

                <div class="tp-caption" 
                data-x="['left','left','left','left']" 
                data-hoffset="['0','20','20','10']"  
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['115','70','90','70']"  
                data-width="none" 
                data-height="none" 
                data-whitespace="nowrap" 
                data-transform_idle="o:1;" 
                data-frames='[{"delay":700,"speed":700,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                data-start="1000"  
                data-splitin="none"  
                data-splitout="none"  
                data-responsive_offset="on"  
                data-responsive="on" style="z-index: 12;">
                    <!--<form action=<?=$domain.'/search_trucks'?> method="get" class="form-search-trucks">
                        <input type="search" name="search_trucks" id="search_trucks" class="search-trucks" style="background: <?=$domain."/img/comece_busca.png"?> no-repeat scroll center center / cover;" placeholder="Digite para buscar caminhões...">
                        <input type="submit" value="Buscar">
                    </form>-->
                    <button class="megafone-button">
                        <i class="fa fa-search"></i>
                        Comece sua busca!
                    </button>
                    <button class="megafone-button">
                      <i class="fa fa-microphone-alt"></i>
                      Anuncie conosco!
                    </button>
                </div>

              
              
            </ul>
        </div>
    </div>

  <div class="container mt-80 mb-80">
    <div class="search-box-custom">
      <input type="text" class="input-custom" placeholder="BUSQUE Truck Zone OU ÔNIBUS IDEAL">
      <i class="fa fa-search icon-custom"></i>
    </div>
  </div>    
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="heading-block">
                    <h3 class="heading font-bold">BUSQUE POR MARCA</h3>               
                </div>
            </div>
        </div>
        <div>
           <table class="table table-brands">
          <tr>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('scania.png', ['alt' => 'Scania','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('volkswagem.png', ['alt' => 'Volkswagem','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('mercedes.png', ['alt' => 'Mercedes','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('volvo.png', ['alt' => 'Volvo','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('ford.png', ['alt' => 'Ford','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('iveco.png', ['alt' => 'Iveco','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
          </tr>
          <tr>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('randon.png', ['alt' => 'Randon','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('daf.png', ['alt' => 'DAF','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('man.png', ['alt' => 'MAN','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('agrale.png', ['alt' => 'Agrale','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('kw.png', ['alt' => 'KW','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
            <td>
              <?= $this->Html->link(
                  $this->Html->image('hino.png', ['alt' => 'Hino','class' => 'image-brands']),
                  '#',
                  ['escape' => false]
              ) ?>
            </td>
          </tr>
        </table>
      </div>
</div> 

<div class="container-fluid bg-custom">    
    <div class="row justify-content-center">
        <div class="col-lg-12">
                <div class="announcement">
                  <h1><strong>Que tal anunciar seu pesado de forma descomplicada para todo o Brasil?</strong></h1>
                  <button>COMECE AGORA!</button>
                </div>               
        </div>
    </div>
</div>  