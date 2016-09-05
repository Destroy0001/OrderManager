<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Store'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="store form large-9 medium-8 columns content">
    <?= $this->Form->create($store) ?>
    <fieldset>
        <legend><?= __('Add Store') ?></legend>
        <?php
            echo $this->Form->input('storename');
            echo $this->Form->input('storeactive');
            echo $this->Form->input('lastupdated');
            echo $this->Form->input('product._ids', ['options' => $product]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
