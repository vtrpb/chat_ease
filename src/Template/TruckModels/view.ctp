<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckModel $truckModel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Truck Model'), ['action' => 'edit', $truckModel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Truck Model'), ['action' => 'delete', $truckModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $truckModel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Truck Models'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Model'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Truck Brands'), ['controller' => 'TruckBrands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Brand'), ['controller' => 'TruckBrands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Truck Types'), ['controller' => 'TruckTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Type'), ['controller' => 'TruckTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Truck Years'), ['controller' => 'TruckYears', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Year'), ['controller' => 'TruckYears', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="truckModels view large-9 medium-8 columns content">
    <h3><?= h($truckModel->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Truck Brand') ?></th>
            <td><?= $truckModel->has('truck_brand') ? $this->Html->link($truckModel->truck_brand->name, ['controller' => 'TruckBrands', 'action' => 'view', $truckModel->truck_brand->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Truck Type') ?></th>
            <td><?= $truckModel->has('truck_type') ? $this->Html->link($truckModel->truck_type->name, ['controller' => 'TruckTypes', 'action' => 'view', $truckModel->truck_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($truckModel->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($truckModel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('External Id') ?></th>
            <td><?= $this->Number->format($truckModel->external_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($truckModel->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($truckModel->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Truck Years') ?></h4>
        <?php if (!empty($truckModel->truck_years)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Truck Model Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('External Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($truckModel->truck_years as $truckYears): ?>
            <tr>
                <td><?= h($truckYears->id) ?></td>
                <td><?= h($truckYears->truck_model_id) ?></td>
                <td><?= h($truckYears->name) ?></td>
                <td><?= h($truckYears->external_id) ?></td>
                <td><?= h($truckYears->created) ?></td>
                <td><?= h($truckYears->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TruckYears', 'action' => 'view', $truckYears->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TruckYears', 'action' => 'edit', $truckYears->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TruckYears', 'action' => 'delete', $truckYears->id], ['confirm' => __('Are you sure you want to delete # {0}?', $truckYears->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
