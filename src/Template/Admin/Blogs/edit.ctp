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
            <li class="breadcrumb-item active">Blog Edit</li>
          </ol>
<script src="<? echo JS_PATH?>ckeditor/ckeditor.js"></script>

    <h3><?= __('Actions'); ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $blog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($blog,["type"=>"file"]); ?>
    <fieldset>
        <legend><?= __('Edit Blog') ?></legend>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name</td><td colspan='3'>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Url<td colspan='3'>".$this->Form->input('url',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Short Post<td colspan='3'>".$this->Form->input('short_post',array('label'=>false,'class'=>'overview'))."</td></tr>";
			echo "<tr><td>Image<td>".$this->Form->input('imagenew',["type"=>"file",'label'=>false]);
		    echo "<td>".$this->Html->image(IMG_PATH.'blogs/'.$blog['image'], ['width' =>'40','height' =>'40'])."</td>";
		    echo       $this->Form->input('image',["type"=>"hidden"]);
			echo "<td><a href='javascript::void();' onclick='myFunction()'>More Images</a></td></tr>";
            echo "<tr><td>Post<td colspan='3'>".$this->Form->input('post',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Seo Title<td colspan='3'>".$this->Form->input('seo_title',array('label'=>false,'class'=>'overview'))."</td></tr>";
            //echo $this->Form->input('seo_keyword');
            echo "<tr><td>Seo Description<td colspan='3'>".$this->Form->input('seo_description',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Status<td colspan='3'>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive'],'label'=>false,])."</td></tr>";
            echo "<tr><td>Author<td colspan='3'>".$this->Form->input('author_id', ['options' => $authors,'label'=>false,])."</td></tr>";
			//echo "<tr><td>Category<td colspan='3'>". $this->Form->input('cat',['type'=>'radio','options'=>['news'=>'News','project-reviews'=>'Project Reviews','market-trends'=>'Market Trends','user-guide'=>'User Guide'],'label'=>false,]);
        ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
function myFunction() { 
    window.open("<?=SITE_PATH?>admin/blogs/uploadImage/<?=$blog['id']?>", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=200, left=500, width=1000, height=600");
}
</script>
<?php echo $this->SetupEditor->setupEditor('post'); ?>