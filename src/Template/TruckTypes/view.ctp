<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckType $truckType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Truck Type'), ['action' => 'edit', $truckType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Truck Type'), ['action' => 'delete', $truckType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $truckType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Truck Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trucks'), ['controller' => 'Trucks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck'), ['controller' => 'Trucks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="truckTypes view large-9 medium-8 columns content">
    <h3><?= h($truckType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($truckType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($truckType->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($truckType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($truckType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($truckType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trucks') ?></h4>
        <?php if (!empty($truckType->trucks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Truck Type Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Mileage') ?></th>
                <th scope="col"><?= __('Condition') ?></th>
                <th scope="col"><?= __('Brand') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Traction') ?></th>
                <th scope="col"><?= __('Transmission') ?></th>
                <th scope="col"><?= __('Implement') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($truckType->trucks as $trucks): ?>
            <tr>
                <td><?= h($trucks->id) ?></td>
                <td><?= h($trucks->user_id) ?></td>
                <td><?= h($trucks->truck_type_id) ?></td>
                <td><?= h($trucks->state_id) ?></td>
                <td><?= h($trucks->city_id) ?></td>
                <td><?= h($trucks->year) ?></td>
                <td><?= h($trucks->mileage) ?></td>
                <td><?= h($trucks->condition) ?></td>
                <td><?= h($trucks->brand) ?></td>
                <td><?= h($trucks->model) ?></td>
                <td><?= h($trucks->traction) ?></td>
                <td><?= h($trucks->transmission) ?></td>
                <td><?= h($trucks->implement) ?></td>
                <td><?= h($trucks->created) ?></td>
                <td><?= h($trucks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trucks', 'action' => 'view', $trucks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trucks', 'action' => 'edit', $trucks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trucks', 'action' => 'delete', $trucks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trucks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
