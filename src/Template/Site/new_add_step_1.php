<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Assistente para Criação de Anúncio
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Seção do wizard -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Preencha as informações a seguir:</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <!-- Progresso do Wizard -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?= $step * 25 ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $step * 25 ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Navegação do Wizard -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li <?= $step == 1 ? 'class="active"' : '' ?>>
                                    <a href="<?= $this->Url->build(['action' => 'step', 1]) ?>">
                                        <i class="fa fa-user"></i> Dados Pessoais
                                    </a>
                                </li>
                                <li <?= $step == 2 ? 'class="active"' : '' ?>>
                                    <a href="<?= $this->Url->build(['action' => 'step', 2]) ?>">
                                        <i class="fa fa-car"></i> Veículos
                                    </a>
                                </li>
                                <li <?= $step == 3 ? 'class="active"' : '' ?>>
                                    <a href="<?= $this->Url->build(['action' => 'step', 3]) ?>">
                                        <i class="fa fa-bullhorn"></i> Anúncio
                                    </a>
                                </li>
                                <li <?= $step == 4 ? 'class="active"' : '' ?>>
                                    <a href="<?= $this->Url->build(['action' => 'step', 4]) ?>">
                                        <i class="fa fa-camera"></i> Fotos
                                    </a>
                                </li>
                                <li <?= $step == 5 ? 'class="active"' : '' ?>>
                                    <a href="<?= $this->Url->build(['action' => 'step', 5]) ?>">
                                        <i class="fa fa-credit-card"></i> Plano
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane <?= $step == 1 ? 'active' : '' ?>" id="step1">                                    
                                    <?php echo $this->element('Wizard/NewAd/ad',[]); ?>
                                    <!--<?php echo $this->element('my_element', ['var1' => $var1, 'var2' => $var2]); ?>-->


                                </div>
                                <div class="tab-pane <?= $step == 2 ? 'active' : '' ?>" id="step2">
                                    <!-- Conteúdo do Passo 2 -->
                                </div>
                                <div class="tab-pane <?= $step == 3 ? 'active' : '' ?>" id="step3">
                                    <!-- Conteúdo do Passo 3 -->
                                </div>
                                <div class="tab-pane <?= $step == 4 ? 'active' : '' ?>" id="step4">
                                    <!-- Conteúdo do Passo 4 -->
                                </div>
                                <div class="tab-pane <?= $step == 5 ? 'active' : '' ?>" id="step5">
                                    <!-- Conteúdo do Passo 4 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</
