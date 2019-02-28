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
            <li class="breadcrumb-item active">Author View</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Author'), ['action' => 'edit', $author->id]) ?> </li>
        <li><?= $this->Html->link(__('List Authors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($author->name) ?></h2>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <tr><td><h6 class="subheader"><?= __('User Name') ?></h6>
             <td><p><?= h($author->user_name) ?></p>
             <tr><td><h6 class="subheader"><?= __('Password') ?></h6>
             <td><p><?= h($author->password) ?></p>
             <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
             <td><p><?= h($author->name) ?></p>
             <tr><td><h6 class="subheader"><?= __('Email') ?></h6>
             <td><p><?= h($author->email) ?></p>
             <tr><td><h6 class="subheader"><?= __('Occupation') ?></h6>
             <td><p><?= h($author->occupation) ?></p>
             <tr><td><h6 class="subheader"><?= __('Facebook') ?></h6>
             <td> <p><?= h($author->facebook) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Twitter') ?></h6>
             <td><p><?= h($author->twitter) ?></p>
             <tr><td><h6 class="subheader"><?= __('Googleplus') ?></h6>
             <td><p><?= h($author->googleplus) ?></p>
             <tr><td><h6 class="subheader"><?= __('Pintrest') ?></h6>
             <td><p><?= h($author->pintrest) ?></p>
             <tr><td><h6 class="subheader"><?= __('Linkedin') ?></h6>
             <td> <p><?= h($author->linkedin) ?></p>
             <tr><td><h6 class="subheader"><?= __('Flicker') ?></h6>
              <td><p><?= h($author->flicker) ?></p>
             <tr><td><h6 class="subheader"><?= __('Photo') ?></h6>
              <td><p><? echo $this->Html->image(IMG_PATH.'author/orig/'.$author['photo']);?></p>
      
            <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
              <td><p><?= $this->Number->format($author->id) ?></p>
       
             <tr><td><h6 class="subheader"><?= __('Created') ?></h6>
              <td><p><?= h($author->created) ?></p>
             <tr><td><h6 class="subheader"><?= __('Modified') ?></h6>
               <td><p><?= h($author->created) ?></p>
             <tr><td><h6 class="subheader"><?= __('Status') ?></h6>
             <td><?= $this->Text->autoParagraph(h($author->status)); ?>

            <tr><td> <h6 class="subheader"><?= __('About User') ?></h6>
             <td> <?= $this->Text->autoParagraph(h($author->about_user)); ?>
</table>
        </div>
    </div>
</div>

