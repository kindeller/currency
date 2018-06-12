<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserCurrencyTracking $userCurrencyTracking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Currency Tracking'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'User', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'User', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Currency'), ['controller' => 'Currency', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['controller' => 'Currency', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userCurrencyTracking form large-9 medium-8 columns content">
    <?= $this->Form->create($userCurrencyTracking) ?>
    <fieldset>
        <legend><?= __('Add User Currency Tracking') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $user]);
            echo $this->Form->control('currency_id', ['options' => $currency]);
            echo $this->Form->control('threshold');
            echo $this->Form->control('direction');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
