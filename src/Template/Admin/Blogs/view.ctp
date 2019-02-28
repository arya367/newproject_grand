<style>
.overview{width:100%}
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Menu Header</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($blog->name) ?></h2>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td> <p><?= h($blog->name) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Cat') ?></h6>
           <td> <p><?= h($blog->cat) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Url') ?></h6>
           <td> <p><?= h($blog->url) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Author') ?></h6>
           <td> <p><?= $blog->has('author') ? $this->Html->link($blog->author->name, ['controller' => 'Authors', 'action' => 'view', $blog->author->id]) : '' ?></p>
       
           <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
           <td> <p><?= $this->Number->format($blog->id) ?></p>
        
            <tr><td><h6 class="subheader"><?= __('Created') ?></h6>
           <td> <p><?= h($blog->created) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Modified') ?></h6>
           <td> <p><?= h($blog->modified) ?></p>
      
            <tr><td><h6 class="subheader"><?= __('Short Post') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($blog->short_post)); ?>

            <tr><td><h6 class="subheader"><?= __('Post') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($blog->post)); ?>

        
           <tr><td> <h6 class="subheader"><?= __('Seo Title') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($blog->seo_title)); ?>

     
           <tr><td> <h6 class="subheader"><?= __('Seo Keyword') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($blog->seo_keyword)); ?>

        
            <tr><td><h6 class="subheader"><?= __('Seo Description') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($blog->seo_description)); ?>

  
            <tr><td><h6 class="subheader"><?= __('Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($blog->status)); ?>

      	</table>
		
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related TagRelations') ?></h4>
    <?php if (!empty($blog->tag_relations)): ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
