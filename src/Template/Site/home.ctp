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
                <img src=<?=$domain."/images/1-1-1.jpg" ?> data-lazyload=<?=$domain."/img/caminhoneiro.jpg"?> alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                <!-- Lead Text -->
                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 h3" 
                data-x="['left','left','left','left']" 
                data-hoffset="['0','20','20','10']"  
                data-y="['middle','middle','middle','middle']" 
                data-voffset="['-40','-10','-20','0']"  
                data-fontsize="['46','32','30','24']" 
                data-lineheight="['58','55','55','35']" 
                data-color="['#FFFFFF']" 
                data-width="['500','550','500','390']" 
                data-height="220" 
                data-whitespace="normal" 
                data-frames='[{"delay":400,"speed":500,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power2.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                data-start="1000"  
                data-splitin="none"  
                data-splitout="none"  
                data-responsive_offset="on"  style="z-index: 11; min-width: 600px; max-width: 600px; font-weight:800; white-space: normal; letter-spacing: -2px">Uma plataforma online de compra e venda de pesados gratuita</div>

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

                <!-- Button -->
                <a href=<?=$domain.'/Users/register'?> class="tp-caption btn btn-primary btn-lg tp-resizeme" 
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
                data-responsive="on" style="z-index: 12;">Anuncie Gratuitamente</a></li>
              
            </ul>
        </div>
    </div>
    <div class="container mt-80 mb-80">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="heading-block">
                    <h3 class="heading font-bold">Planos individuais</h3>
                    <p class="sub-heading">Escolha o plano que melhor se encaixa para você :)</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-20">
                <div class="pricing-box-1">
                    <div class="pricing-icon">
                        <i class="fa fa-solid fa-truck"></i>
                    </div>
                    <div class="header">
                        <h5 class="heading font-bold font-6 text-muted mb-50">IMPULSIONA 30</h5>
                        <div class="price text-secondary">
                            <span class="price-currency">R$</span>
                            <span class="price-fig">150<small>,00</small></span>
                            <span class="price-basis text-muted"> / 30 dias</span>
                        </div>
                    </div>
                    <div class="body">
                        <h6 class="heading text-primary font-bold">IMPULSIONA 30</h6>
                        <ul class="list-default">
                            <li>
                                <p class="mb-0"><strong>Seu anúncio no topo da busca por 30 dias;</strong></p>
                            </li>                            
                        </ul>
                        <div class="text-center">
                            <a href="<?=$domain.'/users/register'?>" class="btn btn-outline-secondary mt-20">IMPULSIONE SEU ANÚNCIO
AGORA</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-20">
                <div class="pricing-box-1">
                    <div class="pricing-icon">
                        <i class="nav-icon fa fa-solid fa-truck"></i>
                    </div>
                    <div class="header">
                        <h5 class="heading font-bold font-6 text-muted mb-50">IMPULSIONA 60</h5>
                        <div class="price text-secondary">
                            <span class="price-currency">R$</span>
                            <span class="price-fig">200<small>,00</small></span>
                            <span class="price-basis text-muted"> / 60 dias</span>
                        </div>
                    </div>
                    <div class="body">
                        <h6 class="heading text-primary font-bold">IMPULSIONA 60</h6>
                        <ul class="list-default">
                            <li>
                                <p class="mb-0"><strong>Seu anúncio no topo da busca por 60 dias;</strong></p>
                            </li>                            
                        </ul>
                        <div class="text-center">
                            <a href="<?=$domain.'/users/register'?>" class="btn btn-outline-secondary mt-20">IMPULSIONE SEU ANÚNCIO
AGORA</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-20">
                <div class="pricing-box-1">
                    <div class="pricing-icon">
                        <i class="nav-icon fa fa-solid fa-truck"></i>
                    </div>
                    <div class="header">
                        <h5 class="heading font-bold font-6 text-muted mb-50">IMPULSIONA 90</h5>
                        <div class="price text-secondary">
                            <span class="price-currency">R$</span>
                            <span class="price-fig">220<small>,00</small></span>
                            <span class="price-basis text-muted"> / 90 dias</span>
                        </div>
                    </div>
                    <div class="body">
                        <h6 class="heading text-primary font-bold">Plano</h6>
                        <ul class="list-default">
                            <li>
                                <p class="mb-0"><strong>Seu anúncio no topo da busca por 90 dias;</strong></p>
                            </li>                            
                        </ul>
                        <div class="text-center">
                            <a href="<?=$domain.'/users/register'?>" class="btn btn-outline-secondary mt-20">IMPULSIONE SEU ANÚNCIO
AGORA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-80 mb-80">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="heading-block">
                    <h3 class="heading font-bold">Planos lojistas</h3>
                    <p class="sub-heading">Escolha o plano que melhor se encaixa para você :)</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mt-20">
                <div class="pricing-box-1">
                    <div class="pricing-icon">
                        <i class="fa fa-solid fa-truck"></i>
                    </div>
                    <div class="header">
                        <h5 class="heading font-bold font-6 text-muted mb-50">PLANO MOTOR 15</h5>
                        <div class="price text-secondary">
                            <span class="price-currency">R$</span>
                            <span class="price-fig">297<small>,00</small></span>
                            <span class="price-basis text-muted"> / mensais</span>
                        </div>
                    </div>
                    <div class="body">
                        <h6 class="heading text-primary font-bold">Plano</h6>
                        <ul class="list-default">
                             <li>
                                <p class="mb-0">Acesso completo ao site e suas ferramentas;</p>
                            </li>
                            <li>
                                <p class="mb-0">Cobertura em todo o Brasil;</p>
                            </li>
                            <li>
                                <p class="mb-0">Anuncie até 15 pesados;</p>
                            </li>
                            <li>
                                <p class="mb-0"> Bônus: material de auxílio de usabilidade para lojistas do Seu
Caminhão</p>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="<?=$domain.'/users/register'?>" class="btn btn-outline-secondary mt-20">ANUNCIE SEU VEÍCULO
AGORA</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-20">
                <div class="pricing-box-1">
                    <div class="pricing-icon">
                        <i class="nav-icon fa fa-solid fa-truck"></i>
                    </div>
                    <div class="header">
                        <h5 class="heading font-bold font-6 text-muted mb-50">PLANO TURBO 50</h5>
                        <div class="price text-secondary">
                            <span class="price-currency">R$</span>
                            <span class="price-fig">597<small>,00</small></span>
                            <span class="price-basis text-muted"> / mensais</span>
                        </div>
                    </div>
                    <div class="body">
                        <h6 class="heading text-primary font-bold">Plano</h6>
                        <ul class="list-default">                            
                            <li>
                                <p class="mb-0">Acesso completo ao site suas ferramentas;</p>
                            </li>
                            <li>
                                <p class="mb-0">Cobertura em todo o Brasil;</p>
                            </li>
                            <li>
                                <p class="mb-0">Anuncie até 50 pesados;</p>
                            </li>
                            <li>
                                <p class="mb-0"> Bônus: material de auxílio de usabilidade para lojistas do Seu
Caminhão</p>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="<?=$domain.'/users/register'?>" class="btn btn-outline-secondary mt-20">ANUNCIE SEU VEÍCULO
AGORA</a>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <!-- Revolution Slider Ends -->

    <!--<div class="pt-120 pb-120" style="background-image: url(img/caminhoneiro.jpg); background-size: cover; background-position: center left;">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <h4 class="heading text-primary font-semi-bold mb-10"> Dental clinic</h4>
                    <h3 class="heading font-20 text-lh-2 font-bold mb-20">Get Your Smile <br> Back <span class="text-primary font-semi-bold">:)</span></h3>
                    <p class="text-lh-6 mb-30">Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="h6 d-flex align-items-center font-semi-bold mb-0">
                        <i class="ion-shield-checkmark-outline icon icon-primary icon-round mr-20"></i>
                        Following all Covid precautions
                    </p>
                    <p class="h6 d-flex align-items-center font-semi-bold mb-0 mt-10">
                        <i class="ion-car-outline icon icon-primary icon-round mr-20"></i>
                        Free home pickup & drop off
                    </p>
                </div>
            </div>
        </div>
    </div>-->

     <div class="container mt-80" id="contact-area">
        <div class="row">
            <div class="col-lg-5 bg-light p-40">
                <h3 class="heading font-bold mb-40">Fale conosco</h3>                
                <hr>
                <div class="contact-icon">
                    <div class="con-icon">
                        <i class="ion-call-outline"></i>
                    </div>
                    <div class="con-body">
                        <h5 class="heading font-bold d-flex align-items-center mb-10">Whatsapp</h5>
                        <p class="mb-0 h6">83 988114138</p>
                    </div>
                </div>
                <hr>
                <div class="contact-icon">
                    <div class="con-icon">
                        <i class="ion-mail-outline"></i>
                    </div>
                    <div class="con-body">
                        <h5 class="heading font-bold d-flex align-items-center mb-10">Email</h5>
                        <p class="mb-0 h6">contato@truckzone.com.br</p>
                    </div>
                </div>
                <p class="mb-0 h6 mt-50 text-muted">Para cadastrar seu anúncio agora faça <a href=<?=$domain.'/Users/login'?>>login</a>, ou <br> <a href=<?=$domain.'/Users/register'?>>registre-se aqui!</a></p>
            </div>
            <div class="col-lg-7 p-40 border border-lg-left-0" style="background-image: url(<?=$domain?>/images/world-map-1.png); background-repeat: no-repeat; background-position: 95% 4%">
                <h3 class="heading font-bold mb-20">Formulário de Contato</h3>
                <p class="h6 mb-50 text-muted">Sugestões e feedback</p>
                <form id="main-contact-form">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nome" id="fname" name="fname">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Telefone" id="mobile" name="mobile">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" placeholder="Mensagem" id="message" name="message"></textarea>
                    </div>
                    <p id="status"></p>
                    <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <br>