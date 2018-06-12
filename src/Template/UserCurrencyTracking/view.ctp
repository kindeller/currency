<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCurrencyTracking $userCurrencyTracking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Currency Tracking'), ['action' => 'edit', $userCurrencyTracking->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Currency Tracking'), ['action' => 'delete', $userCurrencyTracking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCurrencyTracking->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Currency Tracking'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Currency Tracking'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'User', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'User', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currency'), ['controller' => 'Currency', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currency', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userCurrencyTracking view large-9 medium-8 columns content">
    <h3><?= h($userCurrencyTracking->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userCurrencyTracking->has('user') ? $this->Html->link($userCurrencyTracking->user->id, ['controller' => 'User', 'action' => 'view', $userCurrencyTracking->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Currency') ?></th>
            <td><?= $userCurrencyTracking->has('currency') ? $this->Html->link($userCurrencyTracking->currency->name, ['controller' => 'Currency', 'action' => 'view', $userCurrencyTracking->currency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userCurrencyTracking->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Threshold') ?></th>
            <td><?= $this->Number->format($userCurrencyTracking->threshold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direction') ?></th>
            <td><?= $userCurrencyTracking->direction ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
