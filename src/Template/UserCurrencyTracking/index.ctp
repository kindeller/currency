<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCurrencyTracking[]|\Cake\Collection\CollectionInterface $userCurrencyTracking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Currency Tracking'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'User', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'User', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currency'), ['controller' => 'Currency', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currency', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userCurrencyTracking index large-9 medium-8 columns content">
    <h3><?= __('User Currency Tracking') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('currency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direction') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userCurrencyTracking as $userCurrencyTracking): ?>
            <tr>
                <td><?= $this->Number->format($userCurrencyTracking->id) ?></td>
                <td><?= $userCurrencyTracking->has('user') ? $this->Html->link($userCurrencyTracking->user->id, ['controller' => 'User', 'action' => 'view', $userCurrencyTracking->user->id]) : '' ?></td>
                <td><?= $userCurrencyTracking->has('currency') ? $this->Html->link($userCurrencyTracking->currency->name, ['controller' => 'Currency', 'action' => 'view', $userCurrencyTracking->currency->id]) : '' ?></td>
                <td><?= $this->Number->format($userCurrencyTracking->threshold) ?></td>
                <td><?= h($userCurrencyTracking->direction) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userCurrencyTracking->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userCurrencyTracking->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userCurrencyTracking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCurrencyTracking->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
