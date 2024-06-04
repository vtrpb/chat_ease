<?php

  use Cake\Core\Configure;
  
  $domain = Configure::read('domain');

?>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Página de login</p>
            <?= $this->Flash->render() ?>
            <?= $this->Form->create() ?>
              <div class="input-group mb-3">
                <?= $this->Form->input('email', ['label'=>false,'class' => 'form-control','area-hidden'=>false,'placeholder'=>'Email']); ?>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <?= $this->Form->control('password', ['label'=>false,'class' =>'form-control','placeholder'=>'Senha']); ?>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Permanecer logado
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">        
                  <?=  $this->Form->button('Login', ['type' => 'submit','class' => 'btn btn-primary btn-block']); ?>
                </div>
                <!-- /.col -->
              </div>
            <?=  $this->Form->end() ?>

      <p class="mb-1">
        <a href=<?= $domain.'/Users/forgotPassword'?>>Esqueceu a senha?</a>
      </p>
      <p class="mb-0">        
        <a href=<?= $domain.'/Users/register' ?>  class="text-center">Registre-se</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>

  