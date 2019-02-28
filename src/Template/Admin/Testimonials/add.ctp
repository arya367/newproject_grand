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
            <li class="breadcrumb-item active">Testimonial</li>
          </ol>

<script src="<? echo JS_PATH?>ckeditor/ckeditor.js"></script>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Testimonials'), ['action' => 'index']) ?></li>
        
        <li><?= $this->Html->link(__('New Testimonial'), ['action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($testimonial,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Add Testimonial') ?></legend>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</td></tr>";          
            echo "<tr><td>location</td><td>".$this->Form->input('location',array('label'=>false,'class'=>'overview'))."</td></tr>";
			echo "<tr><td>Image</td><td>".$this->Form->input('image',['type'=>'file','label'=>false])."</td></tr>";
            echo "<tr><td>Post</td><td>".$this->Form->input('post', ['type'=>'textarea','label'=>false])."</td></tr>";
           // echo $this->Form->input('seo_title');
            //echo $this->Form->input('seo_keyword');
            //echo $this->Form->input('seo_description');
            //echo $this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive']]);
            //echo $this->Form->input('author_id', ['options' => $authors]);
			//echo $this->Form->input('cat',['type'=>'radio','options'=>['news'=>'News','project reviews'=>'Project Reviews','market trends'=>'Market Trends','user-guide'=>'User Guide']]);
        ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php echo $this->SetupEditor->setupEditor('post'); ?>