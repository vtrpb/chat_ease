<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trucks'), ['controller' => 'Trucks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck'), ['controller' => 'Trucks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($city->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $city->has('state') ? $this->Html->link($city->state->name, ['controller' => 'States', 'action' => 'view', $city->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($city->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($city->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($city->addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Address Street') ?></th>
                <th scope="col"><?= __('Address Number') ?></th>
                <th scope="col"><?= __('Address Complement') ?></th>
                <th scope="col"><?= __('Address District') ?></th>
                <th scope="col"><?= __('Address Zip Code') ?></th>
                <th scope="col"><?= __('Phone Number1') ?></th>
                <th scope="col"><?= __('Phone Number2') ?></th>
                <th scope="col"><?= __('Mobile Number') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->user_id) ?></td>
                <td><?= h($addresses->state_id) ?></td>
                <td><?= h($addresses->city_id) ?></td>
                <td><?= h($addresses->address_street) ?></td>
                <td><?= h($addresses->address_number) ?></td>
                <td><?= h($addresses->address_complement) ?></td>
                <td><?= h($addresses->address_district) ?></td>
                <td><?= h($addresses->address_zip_code) ?></td>
                <td><?= h($addresses->phone_number1) ?></td>
                <td><?= h($addresses->phone_number2) ?></td>
                <td><?= h($addresses->mobile_number) ?></td>
                <td><?= h($addresses->created) ?></td>
                <td><?= h($addresses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Trucks') ?></h4>
        <?php if (!empty($city->trucks)): ?>
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
            <?php foreach ($city->trucks as $trucks): ?>
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
