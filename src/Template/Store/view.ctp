<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Store'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="store view large-9 medium-8 columns content">
    <h3><?= h($store->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Storename') ?></th>
            <td><?= h($store->storename) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($store->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($store->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastupdated') ?></th>
            <td><?= h($store->lastupdated) ?></td>
        </tr>
        <tr>
            <th><?= __('Storeactive') ?></th>
            <td><?= $store->storeactive ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product') ?></h4>
        <?php if (!empty($store->product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('ProductName') ?></th>
                <th><?= __('ProductDescription') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Updated') ?></th>
                <th><?= __('UserID') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('UnsoldStock') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->product as $product): ?>
            <tr>
                <td><?= h($product->id) ?></td>
                <td><?= h($product->productName) ?></td>
                <td><?= h($product->productDescription) ?></td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->updated) ?></td>
                <td><?= h($product->userID) ?></td>
                <td><?= h($product->active) ?></td>
                <td><?= h($product->unsoldStock) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Product', 'action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Product', 'action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Product', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
