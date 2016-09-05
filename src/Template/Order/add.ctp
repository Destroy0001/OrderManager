<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Order'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="order form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->input('productStoreID');
            echo $this->Form->input('orderDate');
            echo $this->Form->input('orderCustomerName');
            echo $this->Form->input('orderLastUpdated');
            echo $this->Form->input('orderShippingDate');
            echo $this->Form->input('orderCustomerAddress');
            echo $this->Form->input('orderActive');
            echo $this->Form->input('isOrderShipped');
            echo $this->Form->input('orderDescription');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
