<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdImage $adImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adImage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adImage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ad Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adImages form large-9 medium-8 columns content">
    <?= $this->Form->create($adImage) ?>
    <fieldset>
        <legend><?= __('Edit Ad Image') ?></legend>
        <?php
            echo $this->Form->control('ad_id', ['options' => $ads]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
