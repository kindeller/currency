<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CurrencyValue[]|\Cake\Collection\CollectionInterface $currencyValues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Currency Value'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currency'), ['controller' => 'Currency', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currency', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="currencyValues index large-9 medium-8 columns content">
    <h3><?= __('Currency Values') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('currency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timestamp') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currencyValues as $currencyValue): ?>
            <tr>
                <td><?= $this->Number->format($currencyValue->id) ?></td>
                <td><?= $currencyValue->has('currency') ? $this->Html->link($currencyValue->currency->name, ['controller' => 'Currency', 'action' => 'view', $currencyValue->currency->id]) : '' ?></td>
                <td><?= $this->Number->format($currencyValue->value) ?></td>
                <td><?= h($currencyValue->timestamp) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $currencyValue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $currencyValue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $currencyValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currencyValue->id)]) ?>
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
