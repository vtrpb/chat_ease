<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ValidatedUser[]|\Cake\Collection\CollectionInterface $validatedUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Validated User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Validated User States'), ['controller' => 'ValidatedUserStates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Validated User State'), ['controller' => 'ValidatedUserStates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="validatedUsers index large-9 medium-8 columns content">
    <h3><?= __('Validated Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validated_user_state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($validatedUsers as $validatedUser): ?>
            <tr>
                <td><?= $this->Number->format($validatedUser->id) ?></td>
                <td><?= $validatedUser->has('user') ? $this->Html->link($validatedUser->user->name, ['controller' => 'Users', 'action' => 'view', $validatedUser->user->id]) : '' ?></td>
                <td><?= $validatedUser->has('validated_user_state') ? $this->Html->link($validatedUser->validated_user_state->name, ['controller' => 'ValidatedUserStates', 'action' => 'view', $validatedUser->validated_user_state->id]) : '' ?></td>
                <td><?= h($validatedUser->created) ?></td>
                <td><?= h($validatedUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $validatedUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $validatedUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $validatedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validatedUser->id)]) ?>
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
