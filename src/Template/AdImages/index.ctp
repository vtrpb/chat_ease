<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdImage[]|\Cake\Collection\CollectionInterface $adImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adImages index large-9 medium-8 columns content">
    <h3><?= __('Ad Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adImages as $adImage): ?>
            <tr>
                <td><?= $this->Number->format($adImage->id) ?></td>
                <td><?= $adImage->has('ad') ? $this->Html->link($adImage->ad->title, ['controller' => 'Ads', 'action' => 'view', $adImage->ad->id]) : '' ?></td>
                <td><?= h($adImage->name) ?></td>
                <td><?= h($adImage->created) ?></td>
                <td><?= h($adImage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adImage->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
