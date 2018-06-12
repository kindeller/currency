<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CurrencyValue $currencyValue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Currency Value'), ['action' => 'edit', $currencyValue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Currency Value'), ['action' => 'delete', $currencyValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currencyValue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Currency Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency Value'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currency'), ['controller' => 'Currency', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currency', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="currencyValues view large-9 medium-8 columns content">
    <h3><?= h($currencyValue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= $currencyValue->has('currency') ? $this->Html->link($currencyValue->currency->name, ['controller' => 'Currency', 'action' => 'view', $currencyValue->currency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($currencyValue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($currencyValue->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timestamp') ?></th>
            <td><?= h($currencyValue->timestamp) ?></td>
        </tr>
    </table>
</div>
