<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Tag Relation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="tagRelations index large-10 medium-9 columns">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('tag_id') ?></th>
            <th><?= $this->Paginator->sort('blog_id') ?></th>
            <th><?= $this->Paginator->sort('tag_type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tagRelations as $tagRelation): ?>
        <tr>
            <td><?= $this->Number->format($tagRelation->id) ?></td>
            <td>
                <?= $tagRelation->has('tag') ? $this->Html->link($tagRelation->tag->name, ['controller' => 'Tags', 'action' => 'view', $tagRelation->tag->id]) : '' ?>
            </td>
            <td>
                <?= $tagRelation->has('blog') ? $this->Html->link($tagRelation->blog->name, ['controller' => 'Blogs', 'action' => 'view', $tagRelation->blog->id]) : '' ?>
            </td>
            <td><?= h($tagRelation->tag_type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $tagRelation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tagRelation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tagRelation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagRelation->id)]) ?>
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
