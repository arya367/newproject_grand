<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Enqueries'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="enqueries form large-10 medium-9 columns">
    <?= $this->Form->create($enquery); ?>
    <fieldset>
        <legend><?= __('Add Enquery') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('project');
            echo $this->Form->input('comment');
            echo $this->Form->input('posted_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
-->