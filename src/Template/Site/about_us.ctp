<?php

use Cake\Core\Configure;

$domain     = Configure::read('domain');        

?>    

<style>
    .highlighted-text {
        font-size: 2.5 rem;
        text-align: center;
        color: red;
    }
</style>

<div class=" container about-us-container mt-80">
    <div class="row justify-content-center align-items-center">            
        <div class="col-lg-6 p-20">
            <h3 class="heading font-bold">Quem somos</h3>
            <p class="lead">Seu caminhão em boas mãos! :)</p>
            <p class="mb-30"> Há mais de 25 anos, nossa paixão é vender caminhões e ajudar caminhoneiros a melhorarem a qualidade das suas viagens com um custo-benefício justo e acessível.

Mas, apenas em 2022, decidimos trazer essa paixão para a Internet e expandir nossa missão para todo o Brasil.

Vender ou comprar seu caminhão online não precisa ser uma estrada com muitas curvas (ou até mesmo uma rua sem saída). Deve ser fácil, seguro, rápido e justo.

Aqui no Truck Zone você não tem apenas isso, mas também tem a certeza que tem ao seu lado quem realmente entende do mercado. </p>
            <a href=<?=$domain.'/Users/register'?> class="btn btn-secondary">Registre-se</a>
        </div>
        <div class="col-lg-6">
            <?= $this->Html->image('about-us.jpg', ['alt' => 'Exemplo de imagem', 'class' => 'img-responsive']); ?>
        </div>
    </div>
</div>
<br>
<div class="about-us-container"></div>
<div class="container mt-80">       
    <div class="row d-flex  align-items-center">
        <div class="col-lg-3 mt-20 d-flex">                             
            <div class="feature-box pl-lg-10">
                <div class="text">
                    <h3 class="heading font-bold mb-10">Certeza de negócio</h3>
                    <p class="mb-0">Aqui no Truck Zone você tem a certeza que tem ao seu lado uma equipe que realmente entende do mercado.</p>
                </div>
            </div>                                             
        </div>
        <div class="col-lg-6 mt-20 d-none d-lg-block">
            <?= $this->Html->image('why-us.jpg', ['alt' => 'Exemplo de imagem', 'class' => 'img-fluid pl-20 pr-20']); ?>                
        </div>
        <div class="col-lg-3 mt-20">               
           <div class="feature-box pr-lg-10">
                <div class="text">
                    <h5 class="heading font-bold mb-10"><i class="ion-golf-outline text-primary icon-left"></i>Nossa Missão</h5>
                    <p class="mb-0">Conectar pessoas com interesses em comum à uma experiência de negociação segura e fácil.</p>
                </div>
            </div>
            <div class="feature-box pr-lg-10 mt-30">
                <div class="text">
                    <h5 class="heading font-bold mb-10"><i class="ion-medkit-outline text-primary icon-left"></i> Nossa Visão</h5>
                    <p class="mb-0">Ajudar revendedores e caminhoneiros de todo o Brasil a fazerem a melhor escolha na compra e venda de seus veículos.</p>
                </div>
            </div>
            <div class="feature-box pr-lg-10 mt-30 mb-lg-80">
                <div class="text">
                    <h5 class="heading font-bold mb-10"><i class="ion-people-outline text-primary icon-left"></i> Nossos Valores</h5>
                    <p class="mb-0">Inovação • Confiança • Transparência • Ambição • Honestidade</p>
                </div>
            </div>
        </div>
    </div>        
</div>
<br>
<div class="container mt-80">       
        <div class="row d-flex align-items-center">
            <div class="col-lg-12 mt-20 d-flex">                             
                <div class="feature-box pl-lg-10">
                    <div class="text">   
                        <h3 class="highlighted-text">Vender ou comprar seu caminhão online não precisa ser uma estrada com muitas curvas, muito menos uma rua sem saída. Deve ser fácil, seguro, rápido e justo!</h3>
                        <h4 align="center">Deve ser fácil, seguro, rápido e justo!</h4>
                    </div>
                </div>                                             
            </div>        
        </div>        
    </div>
<br>


