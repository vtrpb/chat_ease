<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportFile $reportFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Report File'), ['action' => 'edit', $reportFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Report File'), ['action' => 'delete', $reportFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reportFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Report Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reportFiles view large-9 medium-8 columns content">
    <h3><?= h($reportFile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Report') ?></th>
            <td><?= $reportFile->has('report') ? $this->Html->link($reportFile->report->id, ['controller' => 'Reports', 'action' => 'view', $reportFile->report->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($reportFile->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Filename') ?></th>
            <td><?= h($reportFile->filename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File Category') ?></th>
            <td><?= h($reportFile->file_category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reportFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Document') ?></th>
            <td><?= h($reportFile->date_of_document) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reportFile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reportFile->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Canceled') ?></th>
            <td><?= $reportFile->canceled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
