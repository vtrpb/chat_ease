<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckYear $truckYear
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Truck Year'), ['action' => 'edit', $truckYear->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Truck Year'), ['action' => 'delete', $truckYear->id], ['confirm' => __('Are you sure you want to delete # {0}?', $truckYear->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Truck Years'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Year'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Truck Models'), ['controller' => 'TruckModels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Model'), ['controller' => 'TruckModels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="truckYears view large-9 medium-8 columns content">
    <h3><?= h($truckYear->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Truck Model') ?></th>
            <td><?= $truckYear->has('truck_model') ? $this->Html->link($truckYear->truck_model->name, ['controller' => 'TruckModels', 'action' => 'view', $truckYear->truck_model->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($truckYear->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($truckYear->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('External Id') ?></th>
            <td><?= $this->Number->format($truckYear->external_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($truckYear->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($truckYear->modified) ?></td>
        </tr>
    </table>
</div>
