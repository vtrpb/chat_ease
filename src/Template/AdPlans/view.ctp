<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdPlan $adPlan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Plan'), ['action' => 'edit', $adPlan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Plan'), ['action' => 'delete', $adPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adPlan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Plan'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adPlans view large-9 medium-8 columns content">
    <h3><?= h($adPlan->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($adPlan->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($adPlan->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adPlan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Days') ?></th>
            <td><?= $this->Number->format($adPlan->active_days) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($adPlan->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adPlan->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adPlan->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Free') ?></th>
            <td><?= $adPlan->free ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
