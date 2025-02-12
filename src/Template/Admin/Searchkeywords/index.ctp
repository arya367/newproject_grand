<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Searchkeyword'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="searchkeywords index large-10 medium-9 columns">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('url') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th><?= $this->Paginator->sort('category') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($searchkeywords as $searchkeyword): ?>
        <tr>
            <td><?= $this->Number->format($searchkeyword->id) ?></td>
            <td><?= h($searchkeyword->url) ?></td>
            <td><?= h($searchkeyword->status) ?></td>
            <td><?= h($searchkeyword->category) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $searchkeyword->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $searchkeyword->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $searchkeyword->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchkeyword->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
