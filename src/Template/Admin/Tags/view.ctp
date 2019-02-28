<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tag Relations'), ['controller' => 'TagRelations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag Relation'), ['controller' => 'TagRelations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="tags view large-10 medium-9 columns">
    <h2><?= h($tag->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($tag->name) ?></p>
            <h6 class="subheader"><?= __('Slug') ?></h6>
            <p><?= h($tag->slug) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($tag->id) ?></p>
            <h6 class="subheader"><?= __('Group') ?></h6>
            <p><?= $this->Number->format($tag->group) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related TagRelations') ?></h4>
    <?php if (!empty($tag->tag_relations)): ?>
    <table class="table table-bordered">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Tag Id') ?></th>
            <th><?= __('Blog Id') ?></th>
            <th><?= __('Tag Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($tag->tag_relations as $tagRelations): ?>
        <tr>
            <td><?= h($tagRelations->id) ?></td>
            <td><?= h($tagRelations->tag_id) ?></td>
            <td><?= h($tagRelations->blog_id) ?></td>
            <td><?= h($tagRelations->tag_type) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'TagRelations', 'action' => 'view', $tagRelations->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'TagRelations', 'action' => 'edit', $tagRelations->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TagRelations', 'action' => 'delete', $tagRelations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagRelations->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
