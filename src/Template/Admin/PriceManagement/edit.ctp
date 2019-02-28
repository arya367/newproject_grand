<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $priceManagement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $priceManagement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Price Management'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="priceManagement form large-10 medium-9 columns">
    <?= $this->Form->create($priceManagement); ?>
    <fieldset>
        <legend><?= __('Edit Price Management') ?></legend>
        <?php
            echo $this->Form->input('property_id', ['options' => $properties]);
            echo $this->Form->input('unit_id', ['options' => $units]);
            echo $this->Form->input('price');
            echo $this->Form->input('size');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
