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
            <li class="breadcrumb-item active">Blog Add</li>
          </ol>
<script src="<? echo JS_PATH?>ckeditor/ckeditor.js"></script>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($blog,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Add Blog') ?></legend>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name<td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'));
           
            echo "<tr><td>Url<td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Short Post<td>".$this->Form->input('short_post',array('label'=>false,'class'=>'overview'));
			echo "<tr><td>Image<td>".$this->Form->input('image',['type'=>'file','label'=>false,]);
            echo "<tr><td>Post<td>".$this->Form->input('post',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Seo Title<td>".$this->Form->input('seo_title',array('label'=>false,'class'=>'overview'));
            //echo $this->Form->input('seo_keyword');
            echo "<tr><td>Seo Description<td>".$this->Form->input('seo_description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Status<td>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive'],'label'=>false,]);
            echo "<tr><td>Author<td>".$this->Form->input('author_id', ['options' => $authors,'label'=>false,]);
			//echo "<tr><td>Category<td>".$this->Form->input('cat',['type'=>'radio','options'=>['news'=>'News','project reviews'=>'Project Reviews','market trends'=>'Market Trends','user-guide'=>'User Guide'],'label'=>false,]);
        ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php echo $this->SetupEditor->setupEditor('post'); ?>