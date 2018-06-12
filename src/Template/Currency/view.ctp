<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Currency $currency
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Currency'), ['action' => 'edit', $currency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Currency'), ['action' => 'delete', $currency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Currency'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Currency Values'), ['controller' => 'CurrencyValues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency Value'), ['controller' => 'CurrencyValues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="currency view large-9 medium-8 columns content">
    <h3><?= h($currency->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($currency->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Abbreviation') ?></th>
            <td><?= h($currency->abbreviation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($currency->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Currency Values') ?></h4>
        <?php if (!empty($currency->currency_values)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Currency Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Timestamp') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($currency->currency_values as $currencyValues): ?>
            <tr>
                <td><?= h($currencyValues->id) ?></td>
                <td><?= h($currencyValues->currency_id) ?></td>
                <td><?= h($currencyValues->value) ?></td>
                <td><?= h($currencyValues->timestamp) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CurrencyValues', 'action' => 'view', $currencyValues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CurrencyValues', 'action' => 'edit', $currencyValues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CurrencyValues', 'action' => 'delete', $currencyValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currencyValues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Currency Tracking') ?></h4>
        <?php if (!empty($currency->user_currency_tracking)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Currency Id') ?></th>
                <th scope="col"><?= __('Threshold') ?></th>
                <th scope="col"><?= __('Direction') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($currency->user_currency_tracking as $userCurrencyTracking): ?>
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
