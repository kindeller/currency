<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Role'), ['controller' => 'Role', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Role', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Currency Tracking'), ['controller' => 'UserCurrencyTracking', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="user form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('firstName');
            echo $this->Form->control('lastName');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('role_id', ['options' => $role]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>