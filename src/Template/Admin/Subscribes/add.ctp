<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Subscribes'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="subscribes form large-10 medium-9 columns">
    <?= $this->Form->create($subscribe); ?>
    <fieldset>
        <legend><?= __('Add Subscribe') ?></legend>
        <?php
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
