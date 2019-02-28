<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $searchkeyword->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $searchkeyword->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Searchkeywords'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="searchkeywords form large-10 medium-9 columns">
    <?= $this->Form->create($searchkeyword); ?>
    <fieldset>
        <legend><?= __('Edit Searchkeyword') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('url');
            echo $this->Form->input('status');
            echo $this->Form->input('category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
