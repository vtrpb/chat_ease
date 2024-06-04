<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config[]|\Cake\Collection\CollectionInterface $configs
 */

use Cake\Core\Configure;

$domain = Configure::read('domain');

?>

<ul class="list-inline">        
    <?= $this->Html->link('<button type="button" class="btn-default" title="Detalhar"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span> Nova Configuração</button>',['controller' => 'Configs','action' => 'add'],['escape' => false]); ?>
</ul>


<div class="configs index large-9 medium-8 columns content">
    <h3><?= __('Configurações de Laudo por Perito(a)') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-condensed">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','Cód.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id','Perito(a)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('management','Gerência') ?></th>
                <th scope="col"><?= $this->Paginator->sort('core','Núcleo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sector','Setor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created','Criado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified','Modificado') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($configs as $config): ?>
            <tr>
                <td><?= $this->Number->format($config->id) ?></td>
                <td><?= $config->has('user') ? $this->Html->link($config->user->name, ['controller' => 'Users', 'action' => 'view', $config->user->id]) : '' ?></td>
                <td><?= h($config->management) ?></td>
                <td><?= h($config->core) ?></td>
                <td><?= h($config->sector) ?></td>
                <td><?= h($config->created) ?></td>
                <td><?= h($config->modified) ?></td>
                <td class="actions text-nowrap">
                    <?= $this->Html->link('<button type="button" class="btn-default" title="Detalhar"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span></button>',['controller' => 'Configs','action' => 'view',$config->id],['escape' => false]); ?>
                    <?= $this->Html->link('<button type="button" class="btn-default" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></button>',['controller' => 'Configs','action' => 'edit',$config->id],['escape' => false]); ?>                                                            
                    <?= $this->Form->postlink('<button type="button" class="btn-default" title="Excluir Laudo"><span class="glyphicon glyphicon-remove" aria-hidden="true" ></span></button>',['controller'=>'Configs','action' => 'delete',$config->id],['escape' => false,'confirm'=>'Tem certeza que excluir essa configuração?']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registros, do total de  {{count}}.')] ) ?></p>
    </div>
</div>
