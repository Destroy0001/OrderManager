<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Store'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Store'), ['controller' => 'Store', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Store', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productStore index large-9 medium-8 columns content">
    <h3><?= __('Product Store') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('productID') ?></th>
                <th><?= $this->Paginator->sort('storeID') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('productStorePrice') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productStore as $productStore): ?>
            <tr>
                <td><?= $this->Number->format($productStore->productID) ?></td>
                <td><?= $this->Number->format($productStore->storeID) ?></td>
                <td><?= h($productStore->active) ?></td>
                <td><?= $this->Number->format($productStore->productStorePrice) ?></td>
                <td><?= $this->Number->format($productStore->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productStore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productStore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productStore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productStore->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
