<?php
  
  use Cake\Core\Configure;

  $domain     = Configure::read('domain');      
  $userId    = $this->request->getSession()->read('Users.id');
  $userRole  = $this->request->getSession()->read('Users.role'); 
  $userName  = $this->request->getSession()->read('Users.name'); 

?>

 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <!-- Left navbar links -->
    <ul class="navbar-nav">      
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href=<?= $domain.'/Reports/index' ?> class="nav-link">Documentos</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href=<?= $domain.'/ReportTemplates/index' ?> class="nav-link">Modelos</a>
      </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">               
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->

  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=<?= $domain.'/Permissions/selectRole' ?> class="brand-link text-center">      
      <?= $this->Html->image("logo_extra_small.png"); ?>
      <!--<span class="brand-text font-weight-light">G.E.D.I</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=<?= $domain.'/img/profile.png' ?> class="img-circle elevation-2" alt="User Image">          
        </div>
        <div class="info">          
          <?php if (!is_null($userName))  : ?>
              <a href="#" class="d-block"><?= $userName ?></a>              
              <a href="#" class="d-block"><span class="badge" style="color: rgb(255, 133, 27)"><?= $userRole ?></span></a>


          <?php endif; ?>
        </div>
      </div>
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          
          
          <?php if ( $userRole == 'admin') :   ?>          

          <li class="nav-item">
            <a href=<?= $domain.'/Users/index' ?> class="nav-link">
              <i class="nav-icon fa fa-solid fa-users"></i><p>Clientes</p>
            </a>            
          </li>          
          <li class="nav-item">
            <a href=<?= $domain.'/Trucks/index' ?> class="nav-link">
              <i class="nav-icon fa fa-solid fa-truck"></i><p>Veículos</p>

            </a>            
          </li>                                       
          <li class="nav-item">
              <a href=<?= $domain.'/Ads/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-ad"></i><p>Anúncios</p>
              </a>            
            </li>                                                                                                                 
          <li class="nav-item">
            <a href="/docs/3.1//javascript" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p> Configurações <i class="right fas fa-angle-left"></i></p>
            </a>                                    
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=<?= $domain.'/TruckTypes/index' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-truck"></i><p>Tipos de Veículos</p>
                </a>            
              </li>
              <li class="nav-item">
                <a href=<?= $domain.'/TruckBrands/index' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-truck"></i><p>Marcas de Veículos</p>
                </a>            
              </li>
              <li class="nav-item">
                <a href=<?= $domain.'/TruckModels/index' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-truck"></i><p>Modelos de Veículos</p>
                </a>            
              </li>
              <!--<li class="nav-item">
                <a href=<?= $domain.'/TruckYears/index' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-truck"></i><p>Anos de Modelo de Veículos</p>
                </a>            
              </li>-->
              <li class="nav-item">
                <a href=<?= $domain.'/AdPlans/index' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-ad"></i><p>Planos de Anúncios</p>
                </a>            
              </li>
              <li class="nav-item">
                <a href=<?= $domain.'/AdStates/index' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-ad"></i><p>Estados dos anúncios</p>
                </a>            
              </li>
              <li class="nav-item">
                <a href=<?= $domain.'/Roles/index' ?> class="nav-link">
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>Perfis de Usuários</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=<?= $domain.'/Permissions/index' ?> class="nav-link">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Permissões dos Usuários</p>
                </a>
              </li>              
            </ul>
          </li>
            
          <?php endif; ?>

          <?php if ( $userRole == 'editor') :   ?>          
            <li class="nav-item">
              <a href=<?= $domain.'/Users/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-user"></i><p>Clientes</p>
              </a>            
            </li>                                       
            <li class="nav-item">
              <a href=<?= $domain.'/Ads/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-ad"></i><p>Anúncios</p>
              </a>            
            </li>                                                                                                               
          <?php endif; ?>

          <?php if ( $userRole == 'validador') :   ?>          
            <li class="nav-item">
              <a href=<?= $domain.'/Ads/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-ad"></i><p>Anúncios</p>
              </a>            
            </li>                                                                                                                 
          <?php endif; ?>

          <?php if ( $userRole == 'representante') :   ?>          
            <li class="nav-item">
              <a href=<?= $domain.'/Users/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-user"></i><p>Meus Clientes</p>
              </a>            
            </li>                                       
            <li class="nav-item">
              <a href=<?= $domain.'/Ads/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-ad"></i><p>Anúncios dos Clientes</p>
              </a>            
            </li>                                                               
          <?php endif; ?>

          <?php if ( $userRole == 'lojista') :   ?>          
            <li class="nav-item">
            <a href="/docs/3.1//javascript" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p> Novo Anúncio <i class="right fas fa-angle-left"></i></p>
            </a>                                    
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=<?= $domain.'/Trucks/add' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-truck"></i><p>Passo 1 - Adicionar Carro</p>
                </a>            
              </li>
              <li class="nav-item">
                <a href=<?= $domain.'/Ads/add' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-ad"></i><p>Passo 2 - Descrição e Fotos</p>
                </a>            
              </li>              
            </ul>
          </li>
            <li class="nav-item">
              <a href=<?= $domain.'/Trucks/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-truck"></i><p>Meus Veículos</p>
              </a>            
            </li>                                       
            <li class="nav-item">
              <a href=<?= $domain.'/Ads/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-ad"></i><p>Meus Anúncios</p>
              </a>            
            </li>   
            <li class="nav-item">
              <a href=<?= $domain.'/AdPlans/recurringPlans' ?> class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i><p>Meu Plano</p>
              </a>            
            </li>   
          <?php endif; ?>

          <?php if ( $userRole == 'individual') :   ?>          
            <li class="nav-item">
            <a href="/docs/3.1//javascript" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p> Novo Anúncio <i class="right fas fa-angle-left"></i></p>
            </a>                                    
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=<?= $domain.'/Trucks/add' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-truck"></i><p>Passo 1 - Adicionar Carro</p>
                </a>            
              </li>
              <li class="nav-item">
                <a href=<?= $domain.'/Ads/add' ?> class="nav-link">
                  <i class="nav-icon fa fa-solid fa-ad"></i><p>Passo 2 - Descrição e Fotos</p>
                </a>            
              </li>              
            </ul>
          </li>
            <li class="nav-item">
              <a href=<?= $domain.'/Trucks/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-truck"></i><p>Meus Veículos</p>
              </a>            
            </li>                                       
            <li class="nav-item">
              <a href=<?= $domain.'/Ads/index' ?> class="nav-link">
                <i class="nav-icon fa fa-solid fa-ad"></i><p>Meus Anúncios</p>
              </a>            
            </li>                                                               
          <?php endif; ?>

          <li class="nav-item">
            <a href=<?= $domain.'/Files/UserFiles/'.$userId ?> class="nav-link">
              <i class="nav-icon fa fa-file"></i><p>Meus Documentos</p>

            </a>            
          </li>

          <li class="nav-item">
            <a href=<?= $domain.'/Users/edit/'.$userId ?> class="nav-link">
              <i class="nav-icon fa fa-user"></i><p>Editar Perfil</p>

            </a>            
          </li>
          <?php if ( $userRole != 'individual') :   ?>          
            <li class="nav-item">
              <a href=<?= $domain.'/Permissions/selectRole' ?> class="nav-link">
                <i class="nav-icon fa fa-users"></i><p>Mudar Perfil</p>
              </a>            
            </li>                                                   
          <?php endif; ?>
          <li class="nav-item">
            <a href=<?= $domain.'/Users/logout' ?> class="nav-link">
              <i class="nav-icon fas fa-times"></i><p>Sair</p>              
            </a>            
          </li>         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>