<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trucks'), ['controller' => 'Trucks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Truck'), ['controller' => 'Trucks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="states view large-9 medium-8 columns content">
    <h3><?= h($state->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($state->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($state->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $state->has('country') ? $this->Html->link($state->country->name, ['controller' => 'Countries', 'action' => 'view', $state->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($state->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($state->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($state->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($state->addresses)): ?>
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
            <?php foreach ($state->addresses as $addresses): ?>
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
        <h4><?= __('Related Cities') ?></h4>
        <?php if (!empty($state->cities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($state->cities as $cities): ?>
            <tr>
                <td><?= h($cities->id) ?></td>
                <td><?= h($cities->name) ?></td>
                <td><?= h($cities->alias) ?></td>
                <td><?= h($cities->state_id) ?></td>
                <td><?= h($cities->created) ?></td>
                <td><?= h($cities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cities', 'action' => 'view', $cities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cities', 'action' => 'edit', $cities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cities', 'action' => 'delete', $cities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Trucks') ?></h4>
        <?php if (!empty($state->trucks)): ?>
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
            <?php foreach ($state->trucks as $trucks): ?>
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
