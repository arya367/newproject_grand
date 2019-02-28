<style>
.overview{width:100%}
</style>
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Builder</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $builder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $builder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Builders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($builder,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Edit Builder') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>name<td colspan='2'>".$this->Form->input('name',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>heading<td colspan='2'>".$this->Form->input('heading',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>heading2<td colspan='2'>".$this->Form->input('heading2',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>url<td colspan='2'>".$this->Form->input('url',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>photonew<td>".$this->Form->input('photonew',["type"=>"file"]);
		    echo "<td>".$this->Html->image(IMG_PATH.'builder/thumb/'.$builder['photo'], ['width' =>'40','height' =>'40']);
		    echo  $this->Form->input('photo',["type"=>"hidden"]);
            echo "<tr><td>short_description<td colspan='2'>".$this->Form->input('short_description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>description<td colspan='2'>".$this->Form->input('description',array('label'=>false,'class'=>'overview'));
            echo"<tr><td>seo_title<td colspan='2'>". $this->Form->input('seo_title',array('label'=>false,'class'=>'overview'));
           // echo $this->Form->input('seo_keyword');
            echo "<tr><td>seo_description<td colspan='2'>".$this->Form->input('seo_description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Status<td colspan='2'>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive'],'label'=>false]);
            //echo $this->Form->input('navid');
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></div></div>
