<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countries view large-9 medium-8 columns content">
    <h3><?= h($country->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($country->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($country->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($country->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($country->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related States') ?></h4>
        <?php if (!empty($country->states)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->states as $states): ?>
            <tr>
                <td><?= h($states->id) ?></td>
                <td><?= h($states->name) ?></td>
                <td><?= h($states->alias) ?></td>
                <td><?= h($states->country_id) ?></td>
                <td><?= h($states->created) ?></td>
                <td><?= h($states->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'States', 'action' => 'view', $states->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'States', 'action' => 'edit', $states->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'States', 'action' => 'delete', $states->id], ['confirm' => __('Are you sure you want to delete # {0}?', $states->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
