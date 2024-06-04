<?php 
    use Cake\Core\Configure;

    $domain = Configure::read('domain');
?>

  <header class="header-1">           <!-- Header -->
        <div class="topbar">            <!-- Topbar -->
            <!--
            <div class="container-lg">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="topbar-items">
                            <ul class="topbar-social d-none d-lg-inline-flex">
                                <li><a href=""><i class="ion-logo-facebook"></i></a></li>
                                <li><a href=""><i class="ion-logo-twitter"></i></a></li>
                                <li><a href=""><i class="ion-logo-youtube"></i></a></li>
                                <li><a href=""><i class="ion-logo-vimeo"></i></a></li>
                            </ul>
                            <ul class="widgets">
                                <li class="region-widget d-none d-lg-inline-flex"><i class="ion-earth"></i> Brasil</li>
                                <li class="email-widget d-none d-lg-inline-flex"><i class="ion-mail-outline"></i> contato@truckzone.com.br</a></li>
                                <li class="emergency-widget">
                                    <h4 class="emergency"> 
                                        <span class="sub-text">Whatsapp</span>
                                        <span class="number"><a href="https://wa.me/5583988114138" style="color: white;">+5583988114138</a></span><br/>
                                    </h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>

        <nav class="navbar navbar-expand-lg sticky-nav">         <!-- Navigation Bar -->
            <div class="container">            
                <a class="navbar-brand" href=<?= $domain ?>>
                    <img src=<?=$domain."/img/logo_small.png"?> alt="" class="logo">         <!-- Replace with your Logo -->
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#main-navigation">
                    <span class="navbar-toggler-icon">          <!-- Mobile Menu Toggle -->
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                    </span>
                </button>
               
                <div class="navbar-collapse collapse" id="main-navigation">                    
                    <table class="navbar-nav">
                        <tr>
                            <td class="nav-item custom-nav-item"><a href=<?= $domain. '/Site/search' ?>>Compre</a></td>
                            <!--<td class="nav-item custom-nav-item"><a href=<?= $domain . '/Site/aboutUs'?> >Ajuda</a></td>-->
                            <td class="nav-item custom-nav-item"><a href=<?= $domain . '/Users/login'?> >COMECE A ANUNCIAR</a></td>                            
                        </tr>
                    </table>                       
                </div>


                <div class="navbar-collapse collapse" id="main-navigation">         <!-- Main Menu -->
                    <ul class="navbar-nav">                      
                        <!--<li>  
                            <div class="col mt-10 mb-10">                                                      
                                <?= $this->Html->link('<button type="button" class="btn btn-primary" title="Bem vindo!">Quero vender</button>',['controller' => 'Users','action' => 'register'],['escape' => false]); ?>
                            </div>
                        </li>                        -->
                        <li>
                            <div class="col mt-10 mb-10">                                                      
                                <?= $this->Html->link('<button type="button" class="btn btn-primary" title="Bem vindo!">Entrar</button>',['controller' => 'Users','action' => 'login'],['escape' => false]); ?>                    
                            </div>
                        </li>                                               
                    </ul>
                </div>
            </div>          
        </nav>
    </header>
   

    <div class="bg-secondary pt-30 pb-30">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Site', 'action' => 'search']]) ?>        
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-5 align-items-center">                
                <div class="col mt-10 mb-10">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control style-1" width="100%" name="search" placeholder="busque aqui...">
                    </div>
                </div>                
                <div class="col mt-10 mb-10">
                        <?= $this->Form->button(' <i class="fa fa-search"></i>&nbsp;Pesquisar', ['type' => 'submit', 'class' => 'btn btn-primary', 'title' => 'Pesquise pesados para comprar!', 'id'=>'btn-main-search']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>