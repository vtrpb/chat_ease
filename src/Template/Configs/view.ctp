<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config $config
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Config'), ['action' => 'edit', $config->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Config'), ['action' => 'delete', $config->id], ['confirm' => __('Are you sure you want to delete # {0}?', $config->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Configs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Config'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="configs view large-9 medium-8 columns content">
    <h3><?= h($config->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $config->has('user') ? $this->Html->link($config->user->name, ['controller' => 'Users', 'action' => 'view', $config->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Management') ?></th>
            <td><?= h($config->management) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Core') ?></th>
            <td><?= h($config->core) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sector') ?></th>
            <td><?= h($config->sector) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($config->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($config->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($config->modified) ?></td>
        </tr>
    </table>
</div>
