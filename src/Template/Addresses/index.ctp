<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addresses index large-9 medium-8 columns content">
    <h3><?= __('Addresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_street') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_complement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_zip_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_number1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_number2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $address): ?>
            <tr>
                <td><?= $this->Number->format($address->id) ?></td>
                <td><?= $address->has('user') ? $this->Html->link($address->user->name, ['controller' => 'Users', 'action' => 'view', $address->user->id]) : '' ?></td>
                <td><?= $address->has('state') ? $this->Html->link($address->state->name, ['controller' => 'States', 'action' => 'view', $address->state->id]) : '' ?></td>
                <td><?= $address->has('city') ? $this->Html->link($address->city->name, ['controller' => 'Cities', 'action' => 'view', $address->city->id]) : '' ?></td>
                <td><?= h($address->address_street) ?></td>
                <td><?= h($address->address_number) ?></td>
                <td><?= h($address->address_complement) ?></td>
                <td><?= h($address->address_district) ?></td>
                <td><?= h($address->address_zip_code) ?></td>
                <td><?= h($address->phone_number1) ?></td>
                <td><?= h($address->phone_number2) ?></td>
                <td><?= h($address->mobile_number) ?></td>
                <td><?= h($address->created) ?></td>
                <td><?= h($address->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
