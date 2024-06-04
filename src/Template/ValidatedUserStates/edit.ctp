<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ValidatedUserState $validatedUserState
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $validatedUserState->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $validatedUserState->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Validated User States'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Validated Users'), ['controller' => 'ValidatedUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Validated User'), ['controller' => 'ValidatedUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="validatedUserStates form large-9 medium-8 columns content">
    <?= $this->Form->create($validatedUserState) ?>
    <fieldset>
        <legend><?= __('Edit Validated User State') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('alias');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
