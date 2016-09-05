<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store'), ['controller' => 'Store', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Store', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="product view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('ProductName') ?></th>
            <td><?= h($product->productName) ?></td>
        </tr>
        <tr>
            <th><?= __('ProductDescription') ?></th>
            <td><?= h($product->productDescription) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th><?= __('UserID') ?></th>
            <td><?= $this->Number->format($product->userID) ?></td>
        </tr>
        <tr>
            <th><?= __('UnsoldStock') ?></th>
            <td><?= $this->Number->format($product->unsoldStock) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Updated') ?></th>
            <td><?= h($product->updated) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $product->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Store') ?></h4>
        <?php if (!empty($product->store)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Storename') ?></th>
                <th><?= __('Storeactive') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Lastupdated') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->store as $store): ?>
            <tr>
                <td><?= h($store->id) ?></td>
                <td><?= h($store->storename) ?></td>
                <td><?= h($store->storeactive) ?></td>
                <td><?= h($store->created) ?></td>
                <td><?= h($store->lastupdated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Store', 'action' => 'view', $store->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Store', 'action' => 'edit', $store->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Store', 'action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
