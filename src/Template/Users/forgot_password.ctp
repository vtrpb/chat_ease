<?php

  use Cake\Core\Configure;
  
  $domain = Configure::read('domain');

?>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Página de recuperação de senha</p>
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
              <div class="row">                
                <!-- /.col -->
                <div class="col-4">        
                  <?=  $this->Form->button('Recuperar', ['type' => 'submit','class' => 'btn btn-primary btn-block']); ?>
                </div>
                <!-- /.col -->
              </div>
            <?=  $this->Form->end() ?>      
    </div>
    <!-- /.login-card-body -->
  </div>

  