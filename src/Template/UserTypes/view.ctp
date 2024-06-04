<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserType $userType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Type'), ['action' => 'edit', $userType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Type'), ['action' => 'delete', $userType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userTypes view large-9 medium-8 columns content">
    <h3><?= h($userType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($userType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($userType->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($userType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($userType->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($userType->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('User Type Id') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Registration') ?></th>
                <th scope="col"><?= __('Class') ?></th>
                <th scope="col"><?= __('Formation') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Off') ?></th>
                <th scope="col"><?= __('Identity') ?></th>
                <th scope="col"><?= __('Cpf') ?></th>
                <th scope="col"><?= __('Mobile Number 1') ?></th>
                <th scope="col"><?= __('Mobile Number 2') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Address Zip Code') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Address Number') ?></th>
                <th scope="col"><?= __('Address Complement') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($userType->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->user_type_id) ?></td>
                <td><?= h($users->gender) ?></td>
                <td><?= h($users->registration) ?></td>
                <td><?= h($users->class) ?></td>
                <td><?= h($users->formation) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->off) ?></td>
                <td><?= h($users->identity) ?></td>
                <td><?= h($users->cpf) ?></td>
                <td><?= h($users->mobile_number_1) ?></td>
                <td><?= h($users->mobile_number_2) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->date_of_birth) ?></td>
                <td><?= h($users->address_zip_code) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->address_number) ?></td>
                <td><?= h($users->address_complement) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
