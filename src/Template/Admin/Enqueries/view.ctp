<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Enquery'), ['action' => 'edit', $enquery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enquery'), ['action' => 'delete', $enquery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enqueries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enquery'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="enqueries view large-10 medium-9 columns">
    <h2><?= h($enquery->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($enquery->name) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($enquery->email) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= h($enquery->phone) ?></p>
            <h6 class="subheader"><?= __('Project') ?></h6>
            <p><?= h($enquery->project) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($enquery->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Posted Date') ?></h6>
            <p><?= h($enquery->posted_date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Comment') ?></h6>
            <?= $this->Text->autoParagraph(h($enquery->comment)); ?>

        </div>
    </div>
</div>
