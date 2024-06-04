<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ValidatedUserState[]|\Cake\Collection\CollectionInterface $validatedUserStates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Validated User State'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Validated Users'), ['controller' => 'ValidatedUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Validated User'), ['controller' => 'ValidatedUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="validatedUserStates index large-9 medium-8 columns content">
    <h3><?= __('Validated User States') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alias') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($validatedUserStates as $validatedUserState): ?>
            <tr>
                <td><?= $this->Number->format($validatedUserState->id) ?></td>
                <td><?= h($validatedUserState->name) ?></td>
                <td><?= h($validatedUserState->alias) ?></td>
                <td><?= h($validatedUserState->created) ?></td>
                <td><?= h($validatedUserState->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $validatedUserState->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $validatedUserState->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $validatedUserState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validatedUserState->id)]) ?>
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
