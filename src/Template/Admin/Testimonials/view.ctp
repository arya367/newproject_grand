<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="blogs view large-10 medium-9 columns">
    <h2><?= h($blog->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($blog->name) ?></p>
            <h6 class="subheader"><?= __('Cat') ?></h6>
            <p><?= h($blog->cat) ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($blog->url) ?></p>
            <h6 class="subheader"><?= __('Author') ?></h6>
            <p><?= $blog->has('author') ? $this->Html->link($blog->author->name, ['controller' => 'Authors', 'action' => 'view', $blog->author->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($blog->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($blog->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($blog->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Short Post') ?></h6>
            <?= $this->Text->autoParagraph(h($blog->short_post)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Post') ?></h6>
            <?= $this->Text->autoParagraph(h($blog->post)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Seo Title') ?></h6>
            <?= $this->Text->autoParagraph(h($blog->seo_title)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Seo Keyword') ?></h6>
            <?= $this->Text->autoParagraph(h($blog->seo_keyword)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Seo Description') ?></h6>
            <?= $this->Text->autoParagraph(h($blog->seo_description)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <?= $this->Text->autoParagraph(h($blog->status)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related TagRelations') ?></h4>
    <?php if (!empty($blog->tag_relations)): ?>
    <table class=" table table-bordered">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Tag Id') ?></th>
            <th><?= __('Blog Id') ?></th>
            <th><?= __('Tag Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($blog->tag_relations as $tagRelations): ?>
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
