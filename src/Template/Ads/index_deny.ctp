<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ad[]|\Cake\Collection\CollectionInterface $ads
 */
use Cake\Core\Configure;
use Cake\Routing\Router;

$domain     = Configure::read('domain');        

$session    = $this->request->session();

$user_id    = $session->read('Users.id');
$user_role  = $session->read('Users.role'); 
?>

<style>
.carousel-container {
  height: 120px;
  width: 200px;
  overflow: hidden;
  position: relative;
}

.carousel-img {
  height: auto;
  width: 100%;
  display: block;
}

</style>

<script type="text/javascript">
    $(document).ready(function() {        
        $('#clean').on('click', function() {
            $('#clean').val('');
    });
});
</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                
            <ul class="breadcrumb">
                <li class="active"><?= $this->Html->link("Truck Zone", '/Users/index') ?></li> / 
                <li>ANÚNCIOS NEGADOS</li>
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
                    <?= $this->Html->link('<button type="button" class="btn btn-default" title="Cadastra novo veículo.">NOVO ANÚNCIO</button>',['controller' => 'Ads','action' => 'add'],['escape' => false]); ?>
                </ul>    
                <div>
                    <div class="btn-group btn-group-toggle justify-content-end" data-toggle="buttons">
                      <label class="btn btn-info active">
                        <a href="<?php echo Router::url(['controller' => 'Ads', 'action' => 'index']); ?>" role="button" style="color: inherit; text-decoration: none;">Pendentes</a>
                        <input type="radio" name="options" id="option_a1" autocomplete="off" checked>
                      </label>
                      <label class="btn btn-success">
                        <a href="<?php echo Router::url(['controller' => 'Ads', 'action' => 'indexApproved']); ?>" role="button"  style="color: inherit; text-decoration: none;">Ativos</a>
                        <input type="radio" name="options" id="option_a2" autocomplete="off">
                      </label>
                      <label class="btn btn-danger">
                        <a href="<?php echo Router::url(['controller' => 'Ads', 'action' => 'indexDeny']); ?>" role="button"  style="color: inherit; text-decoration: none;">Negados</a>
                        <input type="radio" name="options" id="option_a3" autocomplete="off">
                      </label>                      
                    </div>                
                </div>
                <div class="card">
                    <div class="card-header">
                        <?= $this->Form->create('search') ?>                        
                            <?php                                 
                                echo $this->Form->control('search',['label'=>'Pesquisar ANÚNCIOS...','class'=>'form-control']);
                            ?>
                            <div class="row d-flex align-items-center">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <br>
                                  <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Pequisar..."><span class="nav-icon fas fa-search" aria-hidden="true" ></span> PESQUISAR</button>',['controller' => 'Ads','action' => 'index'],['escape' => false]); ?>                                    
                                  <?= $this->Html->link('<button type="submit" class="btn btn-default" title="Limpar" id="clean"><span class="nav-icon fas fa-times-circle" aria-hidden="true" ></span> LIMPAR BUSCA</button>',['controller' => 'Ads','action' => 'index'],['escape' => false]); ?>                                    
                                </div>                                   
                              </div>                              
                            </div>                            
                                    
                        <?= $this->Form->end() ?>
                        <?= $this->Flash->render() ?> 

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id','Código') ?></th>
                                    <?php
                                        if ($user_role == 'admin' || $user_role == 'editor' || $user_role == 'validador' )  {
                                                echo "<th scope=\"col\">" . $this->Paginator->sort('user_id','Usuário') ."</th>";
                                        }
                                    ?>                                    
                                    <th scope="col"><?= $this->Paginator->sort('truck_id','Caminhão') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('image','Fotos') ?></th>                                    
                                    <?php if ($user_role == 'lojista') : ?>
                                        <th scope="col"><?= $this->Paginator->sort('representative_user_id','Representante') ?></th>
                                    <?php endif; ?>
                                    <th scope="col"><?= $this->Paginator->sort('title','Título') ?></th>
                                    <!--<th scope="col"><?= $this->Paginator->sort('initial_date','Data Início') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('final_date','Data Fim') ?></th>-->
                                    <!--<th scope="col"><?= $this->Paginator->sort('number_of_photos','Qtd.Fotos') ?></th>-->
                                    <th scope="col"><?= $this->Paginator->sort('truck_price','Preço') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('ad_state_id','Status') ?></th>
                                    <?php
                                        if ($user_role == 'individual' )  {
                                            echo "<th scope=\"col\">" . $this->Paginator->sort('payment_button','PagSeguro') ."</th>";
                                        }
                                        else if ($user_role == 'validador' || $user_role == 'admin' )  {
                                            echo "<th scope=\"col\">" . $this->Paginator->sort('paid','Pagamento') ."</th>";
                                        }
                                    ?>
                                    <!--<th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>-->
                                    <th scope="col-2" class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ads as $ad): ?>
                                <tr>
                                    <td><?= $ad->id ?></td>
                                    <?php
                                        if ($user_role == 'admin' || $user_role == 'editor' || $user_role == 'validador' )  {
                                            echo "<td>". ($ad->has('user') ? $this->Html->link($ad->user->name, ['controller' => 'Users', 'action' => 'view', $ad->user->id]) : '') . "</td>";
                                        }
                                    ?> 
                                    <td><?= $ad->has('truck') ? $this->Html->link($ad->truck->model, ['controller' => 'Trucks', 'action' => 'view', $ad->truck->id]) : '' ?></td>
                                    <td>
                                      <div class="img-box mx-3">
                                        <div class="carousel-container">
                                          <div id="carousel<?= $ad->id ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                                            <ol class="carousel-indicators">
                                              <?php foreach ($ad->ad_images as $index => $image): ?>
                                                <li data-target="#carousel<?= $ad->id ?>" data-slide-to="<?= $index ?>" <?= $index === 0 ? 'class="active"' : '' ?>></li>
                                              <?php endforeach; ?>
                                            </ol>
                                            <div class="carousel-inner">
                                              <?php $count = 0; ?>
                                              <?php foreach ($ad->ad_images as $index => $image): ?>
                                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">                                                  
                                                  <a href=<?= $domain . '/site/viewAd/'.$ad->id ?> target="_blank">
                                                    <img src="<?= $domain.'/files/ad_images/' . $image->name ?>" class="img-fluid carousel" alt="">
                                                  </a>
                                                </div>
                                                <?php $count++; ?>
                                              <?php endforeach; ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel<?= $ad->id ?>" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Anterior</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel<?= $ad->id ?>" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Próxima</span>
                                            </a>
                                          </div>
                                        </div>
                                      </div>
                                    </td>                                                                        
                                    <?php if ($user_role == 'lojista') : ?>
                                        <td><?= $this->Number->format($ad->representative_user_id) ?></td>
                                    <?php endif; ?>
                                    <td><?= h($ad->title) ?></td>
                                    <!--<td><?= h($ad->initial_date) ?></td>
                                    <td><?= h($ad->final_date) ?></td>-->
                                    <!--<td><?= $this->Number->format($count) ?></td>-->
                                    <!--<td><?= h($ad->free) ?></td>-->
                                    <?php                                        
                                        switch ($ad->ad_state_id) {
                                            case 1:
                                                $name = 'Ativo';
                                                $color = 'success';
                                                break;
                                            case 2:
                                                $name = 'Pausado';
                                                $color = 'warning';
                                                break;
                                            case 3:
                                                $name = 'Expirado';
                                                $color = 'danger';
                                                break;
                                            case 4:
                                                $name = 'Pendente';                                            
                                                $color = 'info';
                                                break;
                                            case 5:
                                                $name = 'Negado';                                            
                                                $color = 'danger';
                                                break;
                                            default:
                                                $name = 'Desconhecido';
                                                $color = 'secondary';
                                        }
                                        if ($count == 0)  {
                                            $name = 'Sem fotos';
                                            $color = 'warning';
                                        }
                                        $status =  '<span class="badge badge-' . $color . '">' . $name . '</span>';
                                    ?>
                                    <td><?= $ad->truck_price_display ?></td>
                                    <td><?= $status?></td>                                                                        
                                    <td>
                                    <?php                                        
                                        if ($user_role == 'individual' && !is_null($ad->ad_plan_id) ) {
                                            switch ($ad->ad_plan_id) {
                                                case 1:
                                                    // PLANO MOTOR 30
                                                    echo '<a href="https://pag.ae/7ZsdeJh15" target="_blank" title="Pagar com PagSeguro"><img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar-azul.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></a>';
                                                    break;

                                                case 2:
                                                    // PLANO POTENCIA 60
                                                    echo '<a href="https://pag.ae/7ZsdgaMb4" target="_blank" title="Pagar com PagSeguro"><img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar-azul.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></a>';
                                                    break;

                                                case 3:
                                                    // PLANO TURBO 90
                                                    echo '<a href="https://pag.ae/7ZsdhagNK" target="_blank" title="Pagar com PagSeguro"><img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar-azul.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></a>';
                                                    break;
                                            }
                                        }
                                        else if ($user_role == 'validador' || $user_role == 'admin' )  {
                                            if ($ad->paid)  {
                                              echo '<span class="badge badge-success"> Pago </span>';  
                                            } 
                                            else  {
                                              echo '<span class="badge badge-danger">Não Pago</span>';  
                                            } 
                                        }
                                    ?>
                                    </td>

                                    <!--<td><?= h($ad->modified) ?></td>-->
                                    <td class="actions text-nowrap">                                        


                                        <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye"  title="Ver ANÚNCIO"></button>',['controller'=>'Site','action' => 'viewAd',$ad->id],['escape' => false,'target'=>'_blank']); ?>                                        

                                        <?php if ($user_role == 'validador' || $user_role == 'admin') :?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-primary btn-sm nav-icon fas fa-eye"  title="Detalhes do ANÚNCIO"></button>',['controller'=>'Ads','action' => 'view',$ad->id],['escape' => false,'target'=>'_self']); ?>                                                                                    
                                            <?= $this->Html->link('<button type="button" class="btn btn-warning    btn-sm nav-icon fas fa-folder-open" title="Documentação CLIENTE"></button>',['controller'=>'Files','action' => 'userFiles',$ad->user_id],['escape' => false]); ?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-warning    btn-sm nav-icon fas fa-folder-open" title="Documentação VEÍCULO"></button>',['controller'=>'Files','action' => 'truckFiles',$ad->truck_id],['escape' => false]); ?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-danger    btn-sm nav-icon fas fa-times-circle" title="Negar ANÚNCIO"></button>',['action' => 'deny',$ad->id],['escape' => false,'confirm'=>'Tem certeza que deseja reprovar o ANÚNCIO "'. $ad->title . '"?']); ?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-success    btn-sm nav-icon fas fa-check-circle" title="Aprovar ANÚNCIO"></button>',['action' => 'approve',$ad->id],['escape' => false,'confirm'=>'Tem certeza que deseja aprovar o ANÚNCIO "'. $ad->title . '"?']); ?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-success    btn-sm nav-icon fas fa-money-bill-alt" title="PAGO"></button>',['action' => 'paid',$ad->id],['escape' => false,'confirm'=>'Tem certeza que alterar o PAGAMENTO deste anúncio "'. $ad->title . '"?']); ?>

                                        <?php endif ?>

                                        <?php if ($user_role == 'admin' || $user_role == 'individual' || $user_role == 'lojista' ) :?>
                                            <?= $this->Html->link('<button type="button" class="btn btn-info    btn-sm nav-icon fas fa-edit" title="Editar"></button>',['action' => 'edit',$ad->id],['escape' => false]); ?>
                                            <?= $this->Form->postlink('<button type="button" class="btn btn-danger btn-sm nav-icon fas fa-trash-alt" title="Excluir"></button>',['action' => 'delete',$ad->id],['escape' => false,'confirm'=>'Tem certeza que excluir o usuário "'. $ad->title . '"?']); ?>
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