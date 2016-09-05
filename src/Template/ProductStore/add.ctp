<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Store'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Store'), ['controller' => 'Store', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Store', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productStore form large-9 medium-8 columns content">
    <?= $this->Form->create($productStore) ?>
    <fieldset>
        <legend><?= __('Add Product Store') ?></legend>
        <?php
            echo $this->Form->input('productID');
            echo $this->Form->input('storeID');
            echo $this->Form->input('active');
            echo $this->Form->input('productStorePrice');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
