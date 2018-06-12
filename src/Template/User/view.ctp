<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Role'), ['controller' => 'Role', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Role', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="user view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($user->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($user->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Role', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($user->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related User Currency Tracking') ?></h4>
        <?php if (!empty($user->user_currency_tracking)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Currency Id') ?></th>
                <th scope="col"><?= __('Threshold') ?></th>
                <th scope="col"><?= __('Direction') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_currency_tracking as $userCurrencyTracking): ?>
            <tr>
                <td><?= h($userCurrencyTracking->id) ?></td>
                <td><?= h($userCurrencyTracking->user_id) ?></td>
                <td><?= h($userCurrencyTracking->currency_id) ?></td>
                <td><?= h($userCurrencyTracking->threshold) ?></td>
                <td><?= h($userCurrencyTracking->direction) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserCurrencyTracking', 'action' => 'view', $userCurrencyTracking->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserCurrencyTracking', 'action' => 'edit', $userCurrencyTracking->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserCurrencyTracking', 'action' => 'delete', $userCurrencyTracking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCurrencyTracking->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
