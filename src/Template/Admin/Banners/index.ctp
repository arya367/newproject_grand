<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Banner'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="banners index large-10 medium-9 columns">
    <table class=" table table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('photo') ?></th>
            <th><?= $this->Paginator->sort('property_id') ?></th>
            <th><?= $this->Paginator->sort('url') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($banners as $banner): ?>
        <tr>
            <td><?= $this->Number->format($banner->id) ?></td>
            <td><?= h($banner->name) ?></td>
            <td><?= $this->Html->image(IMG_PATH.'banner/thumb/'.$banner->photo, ['width' => '20','height' => '20']); ?></td>
            <td>
                <?= $banner->has('property') ? $this->Html->link($banner->property->name, ['controller' => 'Properties', 'action' => 'view', $banner->property->id]) : '' ?>
            </td>
            <td><?= h($banner->url) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $banner->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $banner->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]) ?>
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
