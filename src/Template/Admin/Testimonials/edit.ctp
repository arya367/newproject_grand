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
            <li class="breadcrumb-item active">Testimonial Edit</li>
          </ol>
<script src="<? echo JS_PATH?>ckeditor/ckeditor.js"></script>

    <h3><?= __('Actions'); ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Testimonial'), ['action' => 'index']) ?></li>
     
        <li><?= $this->Html->link(__('New Testimonial'), ['action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($testimonial,["type"=>"file"]); ?>
    <fieldset>
        <legend><?= __('Edit Testimonial') ?></legend>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
          
            echo "<tr><td>Name</td><td colspan='2'>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</td></tr>";          
            echo "<tr><td>location</td><td colspan='2'>".$this->Form->input('location',array('label'=>false,'class'=>'overview'))."</td></tr>";
			echo "<tr><td>Image</td><td>".$this->Form->input('image',['type'=>'file','label'=>false])."</td>";
			echo "<td>".$this->Html->image(IMG_PATH.'blogs/'.$testimonial['image'], ['width' =>'40','height' =>'40'])."</td></tr>";
            echo "<tr><td>Post</td><td colspan='2'>".$this->Form->input('post', ['type'=>'textarea','label'=>false])."</td></tr>";
           
			
			
        ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
function myFunction() { 
    window.open("<?=SITE_PATH?>admin/blogs/uploadImage/<?=$testimonial['id']?>", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=200, left=500, width=1000, height=600");
}
</script>
<?php echo $this->SetupEditor->setupEditor('post'); ?>