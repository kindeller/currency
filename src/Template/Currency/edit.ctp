<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Currency $currency
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $currency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Currency'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Currency Values'), ['controller' => 'CurrencyValues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency Value'), ['controller' => 'CurrencyValues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="currency form large-9 medium-8 columns content">
    <?= $this->Form->create($currency) ?>
    <fieldset>
        <legend><?= __('Edit Currency') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('abbreviation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
