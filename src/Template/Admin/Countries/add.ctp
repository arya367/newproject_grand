<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="countries form large-10 medium-9 columns">
    <?= $this->Form->create($country); ?>
    <fieldset>
        <legend><?= __('Add Country') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('active');
            echo $this->Form->input('priority');
            echo $this->Form->input('code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
