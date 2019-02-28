<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Tag Relation'), ['action' => 'edit', $tagRelation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag Relation'), ['action' => 'delete', $tagRelation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagRelation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tag Relations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag Relation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="tagRelations view large-10 medium-9 columns">
    <h2><?= h($tagRelation->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Tag') ?></h6>
            <p><?= $tagRelation->has('tag') ? $this->Html->link($tagRelation->tag->name, ['controller' => 'Tags', 'action' => 'view', $tagRelation->tag->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Blog') ?></h6>
            <p><?= $tagRelation->has('blog') ? $this->Html->link($tagRelation->blog->name, ['controller' => 'Blogs', 'action' => 'view', $tagRelation->blog->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Tag Type') ?></h6>
            <p><?= h($tagRelation->tag_type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($tagRelation->id) ?></p>
        </div>
    </div>
</div>
