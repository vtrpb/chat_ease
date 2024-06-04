<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addresses view large-9 medium-8 columns content">
    <h3><?= h($address->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $address->has('user') ? $this->Html->link($address->user->name, ['controller' => 'Users', 'action' => 'view', $address->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $address->has('state') ? $this->Html->link($address->state->name, ['controller' => 'States', 'action' => 'view', $address->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $address->has('city') ? $this->Html->link($address->city->name, ['controller' => 'Cities', 'action' => 'view', $address->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Street') ?></th>
            <td><?= h($address->address_street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Number') ?></th>
            <td><?= h($address->address_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Complement') ?></th>
            <td><?= h($address->address_complement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address District') ?></th>
            <td><?= h($address->address_district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Zip Code') ?></th>
            <td><?= h($address->address_zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Number1') ?></th>
            <td><?= h($address->phone_number1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Number2') ?></th>
            <td><?= h($address->phone_number2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile Number') ?></th>
            <td><?= h($address->mobile_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($address->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($address->modified) ?></td>
        </tr>
    </table>
</div>
