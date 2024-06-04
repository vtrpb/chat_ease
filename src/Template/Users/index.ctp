<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
use Cake\Core\Configure;


$session    = $this->request->session();

$domain     = Configure::read('domain');        

$user_id    = $session->read('Users.id');
$user_role  = $session->read('Users.role'); 

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/Users/index') ?></li> / 
                <li>USUÁRIOS</li>
            </ul>        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <ul class="list-inline">                            
                    <?php if ($user_role == 'admin' || $user_role == 'editor')  : ?>
                        <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cadastra novo cliente.">NOVO CLIENTE</button>',['controller' => 'Users','action' => 'add'],['escape' => false]); ?>                                        
                    <?php endif; ?>
                </ul>    
                <div class="card">
                    <?php if ($user_role == 'admin' || $user_role == 'editor')  : ?>
                        <div class="card-header">
                            <?= $this->Form->create('search') ?>                        
                                <?php                                 
                                    echo $this->Form->control('search',['label'=>'Pesquisar Clientes...','class'=>'form-control']);
                                ?>
                                <div class="form-group">
                                        <br>
                                        <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="nav-icon fas fa-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'Reports','action' => 'index'],['escape' => false]); ?>
                                </div>                                   
                                        
                            <?= $this->Form->end() ?>
                            <?= $this->Flash->render() ?> 
                        </div>
                    <?php endif; ?>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','#') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('name','Nome') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('email','E-mail') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('mobile_number','Celular') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('corporate_name','Empresa') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('commercial_number','Tel.Comercial') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('cnpj','C.N.P.J') ?></th>                                    
                                    <th scope="col"><?= $this->Paginator->sort('date_of_birth','Data Nas.') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('cpf','C.P.F') ?></th>                                                                                                            
                                    <th scope="col"><?= $this->Paginator->sort('is_representative','Parceiro?') ?></th>                                                                        
                                    <th scope="col"><?= $this->Paginator->sort('representative_code','Código') ?></th>                                                                        
                                    <th scope="col"><?= $this->Paginator->sort('referral_code','Código Indic.') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                                    <th scope="col" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user):         ?>
                                <tr>
                                    <td><?= $this->Number->format($user->id) ?></td>
                                    <td><?= h($user->name) ?></td>
                                    <td><?= h($user->email) ?></td>                                   
                                    <td><?= h($user->mobile_number) ?></td>
                                    <td><?= h($user->corporate_name) ?></td>                                    
                                    <td><?= h($user->commercial_number) ?></td>
                                    <td><?= h($user->cnpj) ?></td>                                    
                                    <td><?= h($user->date_of_birth) ?></td>
                                    <td><?= h($user->cpf) ?></td>                                    
                                    <td><?= $user->is_representative ? __('SIM') : __('NÃO'); ?></td>
                                    <td><?= $user->representative_code; ?></td>
                                    <td><?= $user->referral_code; ?></td>
                                    <td><?= h($user->modified) ?></td>
                                    <td class="actions text-nowrap">                                        

                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye"  title="Detalhar"></button>',['action' => 'view',$user->id],['escape' => false]); ?>
                                        <?php if ($user_role == 'admin' || $user_role == 'individual' || $user_role == 'lojista') :?>

                                            <?= $this->Html->link('<button type="button" class="btn btn-info    btn-sm nav-icon fas fa-edit" title="Editar"></button>',['action' => 'edit',$user->id],['escape' => false]); ?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-secondary btn-sm nav-icon fas fa-file" title="Documentos"></button>',['controller'=>'Files','action' => 'userFiles',$user->id],['escape' => false]); ?>
                                            <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir"></button>',['action' => 'delete',$user->id],['escape' => false,'confirm'=>'Tem certeza que excluir o usuário "'. $user->name . '"?']); ?>                                            

                                        <?php endif ?>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
                                <?= $this->Paginator->prev('< ' . __('anterior ')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__(' próximo') . ' > ') ?>
                                <?= $this->Paginator->last(__('último') . ' >> ') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registros, do total de  {{count}}.')] ) ?></p>
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