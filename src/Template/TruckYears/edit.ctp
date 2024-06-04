<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TruckYear $truckYear
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $truckYear->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $truckYear->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Truck Years'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Truck Models'), ['controller' => 'TruckModels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Truck Model'), ['controller' => 'TruckModels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="truckYears form large-9 medium-8 columns content">
    <?= $this->Form->create($truckYear) ?>
    <fieldset>
        <legend><?= __('Edit Truck Year') ?></legend>
        <?php
            echo $this->Form->control('truck_model_id', ['options' => $truckModels]);
            echo $this->Form->control('name');
            echo $this->Form->control('external_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
