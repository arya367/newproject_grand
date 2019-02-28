<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Searchkeyword'), ['action' => 'edit', $searchkeyword->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Searchkeyword'), ['action' => 'delete', $searchkeyword->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchkeyword->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Searchkeywords'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Searchkeyword'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="searchkeywords view large-10 medium-9 columns">
    <h2><?= h($searchkeyword->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($searchkeyword->url) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= h($searchkeyword->status) ?></p>
            <h6 class="subheader"><?= __('Category') ?></h6>
            <p><?= h($searchkeyword->category) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($searchkeyword->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <?= $this->Text->autoParagraph(h($searchkeyword->name)); ?>

        </div>
    </div>
</div>
