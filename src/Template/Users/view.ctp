<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("USUÁRIOS", '/Users/index') ?></li>
                <li><strong>  /  </strong></li>
                <li><?= " ".$user->name ?> </li>                        
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
                    <div class="card-body table-responsive p-0">                        
                      <table class="table">                                    
                            <tr>
                                <th scope="row"><?= __('Ativo') ?></th>
                                <td><?= $user->active ? __('SIM') : __('NÃO'); ?></td>
                            </tr>                                                  
                            <tr>
                                <th scope="row"><?= __('Nome') ?></th>
                                <td><?= h($user->name) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('E-mail') ?></th>
                                <td><?= h($user->email) ?></td>
                            </tr>                            
                            <?php if(!empty($user->cnpj) )  : ?>
                                <tr>
                                    <th scope="row"><?= __('Empresa') ?></th>
                                    <td><?= h($user->corporate_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('C.N.P.J') ?></th>
                                    <td><?= h($user->cnpj) ?></td>
                                </tr>                            
                                <tr>
                                    <th scope="row"><?= __('Telefone Comercial') ?></th>
                                    <td><?= h($user->commercial_number) ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th scope="row"><?= __('Celular') ?></th>
                                <td><?= h($user->mobile_number) ?></td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><?= __('C.P.F') ?></th>
                                <td><?= h($user->cpf) ?></td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><?= __('Data de nascimento') ?></th>
                                <td><?= h($user->date_of_birth) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('É representante?') ?></th>
                                <td><?= $user->is_representative ? __('SIM') : __('NÃO'); ?></td>
                            </tr>  
                            <tr>
                                <th scope="row"><?= __('Código de Representante') ?></th>
                                <td><?= $user->representative_code; ?></td>
                            </tr>  
                            <tr>
                                <th scope="row"><?= __('Indicado por') ?></th>
                                <td><?= $user->referral_code; ?></td>
                            </tr>  
                            <tr>
                                <th scope="row"><?= __('Criado') ?></th>
                                <td><?= h($user->created) ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><?= __('Modificado') ?></th>
                                <td><?= h($user->modified) ?></td>
                            </tr>
                        </table>
                    </div>
                                <!--<div class="card-footer">                        
                                </div>-->
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