<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ValidatedUser $validatedUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Validated User'), ['action' => 'edit', $validatedUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Validated User'), ['action' => 'delete', $validatedUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $validatedUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Validated Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validated User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Validated User States'), ['controller' => 'ValidatedUserStates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Validated User State'), ['controller' => 'ValidatedUserStates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="validatedUsers view large-9 medium-8 columns content">
    <h3><?= h($validatedUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $validatedUser->has('user') ? $this->Html->link($validatedUser->user->name, ['controller' => 'Users', 'action' => 'view', $validatedUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validated User State') ?></th>
            <td><?= $validatedUser->has('validated_user_state') ? $this->Html->link($validatedUser->validated_user_state->name, ['controller' => 'ValidatedUserStates', 'action' => 'view', $validatedUser->validated_user_state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($validatedUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($validatedUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($validatedUser->modified) ?></td>
        </tr>
    </table>
</div>
