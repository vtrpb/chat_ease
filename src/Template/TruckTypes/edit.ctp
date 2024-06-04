<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckType $truckType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $truckType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $truckType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Truck Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trucks'), ['controller' => 'Trucks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Truck'), ['controller' => 'Trucks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="truckTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($truckType) ?>
    <fieldset>
        <legend><?= __('Edit Truck Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('alias');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
