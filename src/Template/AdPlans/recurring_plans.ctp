<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdPlan[]|\Cake\Collection\CollectionInterface $adPlans
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/AdPlans/index') ?></li> / 
                <li>Tipos de Plano</li>
            </ul>        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">                                   
        <div class="card">
          <div class="card-header">                        
            <h3>Escolha seu Plano</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">PLANO MOTOR 15</h3>
                  </div>
                  <div class="box-body">
                    <p class="plan-description">Plano:</p>
                    <ul class="plan-features">
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
                    <!-- PLANO MOTOR 15  INICIO-->
                    <!-- INICIO FORMULARIO BOTAO PAGBANK: NAO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                    <form action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post">
                    <input type="hidden" name="code" value="4DCF1A9B99993CACC4010FAE2F32B8D1" />
                    <input type="hidden" name="iot" value="button" />
                    <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/120x53-assinar-azul.gif" name="submit" alt="Pague com PagBank - É rápido, grátis e seguro!" width="120" height="53"/>
                    </form>
                    <!-- FINAL FORMULARIO BOTAO PAGBANK -->
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">PLANO TURBO 50</h3>
                  </div>
                  <div class="box-body">
                    <p class="plan-description">Plano:</p>
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
                    <!-- PLANO MOTOR 50  INICIO-->
                    <!-- INICIO FORMULARIO BOTAO PAGBANK: NAO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
                    <form action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post">
                    <input type="hidden" name="code" value="1E954E852E2EFF2114ADFF98A5FDDEDA" />
                    <input type="hidden" name="iot" value="button" />
                    <input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/120x53-assinar-azul.gif" name="submit" alt="Pague com PagBank - É rápido, grátis e seguro!" width="120" height="53"/>
                    </form>
                    <!-- FINAL FORMULARIO BOTAO PAGBANK -->
                  </div>
                </div>
              </div>
            </div>
          </div>                   
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.main-content -->
</div>
<!-- /.content-wrapper -->
