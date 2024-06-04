<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckBrand $truckBrand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Truck Brand'), ['action' => 'edit', $truckBrand->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Truck Brand'), ['action' => 'delete', $truckBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $truckBrand->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Truck Brands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Brand'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Truck Models'), ['controller' => 'TruckModels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Model'), ['controller' => 'TruckModels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="truckBrands view large-9 medium-8 columns content">
    <h3><?= h($truckBrand->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($truckBrand->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($truckBrand->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('External Id') ?></th>
            <td><?= $this->Number->format($truckBrand->external_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($truckBrand->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($truckBrand->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Truck Models') ?></h4>
        <?php if (!empty($truckBrand->truck_models)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Truck Brand Id') ?></th>
                <th scope="col"><?= __('Truck Type Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('External Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($truckBrand->truck_models as $truckModels): ?>
            <tr>
                <td><?= h($truckModels->id) ?></td>
                <td><?= h($truckModels->truck_brand_id) ?></td>
                <td><?= h($truckModels->truck_type_id) ?></td>
                <td><?= h($truckModels->name) ?></td>
                <td><?= h($truckModels->external_id) ?></td>
                <td><?= h($truckModels->created) ?></td>
                <td><?= h($truckModels->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TruckModels', 'action' => 'view', $truckModels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TruckModels', 'action' => 'edit', $truckModels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TruckModels', 'action' => 'delete', $truckModels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $truckModels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
