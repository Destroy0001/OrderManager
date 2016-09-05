<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Store'), ['action' => 'edit', $productStore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Store'), ['action' => 'delete', $productStore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productStore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Store'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Store'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store'), ['controller' => 'Store', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Store', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productStore view large-9 medium-8 columns content">
    <h3><?= h($productStore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('ProductID') ?></th>
            <td><?= $this->Number->format($productStore->productID) ?></td>
        </tr>
        <tr>
            <th><?= __('StoreID') ?></th>
            <td><?= $this->Number->format($productStore->storeID) ?></td>
        </tr>
        <tr>
            <th><?= __('ProductStorePrice') ?></th>
            <td><?= $this->Number->format($productStore->productStorePrice) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($productStore->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $productStore->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
