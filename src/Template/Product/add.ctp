<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Store'), ['controller' => 'Store', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Store', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="product form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->input('productName');
            echo $this->Form->input('productDescription');
            echo $this->Form->input('userID');
            echo $this->Form->input('active');
            echo $this->Form->input('unsoldStock');
            echo $this->Form->input('store._ids', ['options' => $store]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
