<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ValidatedUserState $validatedUserState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Validated User State'), ['action' => 'edit', $validatedUserState->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Validated User State'), ['action' => 'delete', $validatedUserState->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validatedUserState->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Validated User States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validated User State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Validated Users'), ['controller' => 'ValidatedUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validated User'), ['controller' => 'ValidatedUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="validatedUserStates view large-9 medium-8 columns content">
    <h3><?= h($validatedUserState->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($validatedUserState->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($validatedUserState->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($validatedUserState->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($validatedUserState->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($validatedUserState->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Validated Users') ?></h4>
        <?php if (!empty($validatedUserState->validated_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Validated User State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($validatedUserState->validated_users as $validatedUsers): ?>
            <tr>
                <td><?= h($validatedUsers->id) ?></td>
                <td><?= h($validatedUsers->user_id) ?></td>
                <td><?= h($validatedUsers->validated_user_state_id) ?></td>
                <td><?= h($validatedUsers->created) ?></td>
                <td><?= h($validatedUsers->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ValidatedUsers', 'action' => 'view', $validatedUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ValidatedUsers', 'action' => 'edit', $validatedUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ValidatedUsers', 'action' => 'delete', $validatedUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validatedUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
