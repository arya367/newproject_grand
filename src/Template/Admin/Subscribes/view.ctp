<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Subscribe'), ['action' => 'edit', $subscribe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subscribe'), ['action' => 'delete', $subscribe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscribe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subscribes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscribe'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="subscribes view large-10 medium-9 columns">
    <h2><?= h($subscribe->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($subscribe->email) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($subscribe->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($subscribe->created) ?></p>
        </div>
    </div>
</div>
