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
            <li class="breadcrumb-item active">Author Edit</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $author->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $author->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
    </ul>
<div class="form-group container">
    <?= $this->Form->create($author,["type"=>"file"]); ?>
    <fieldset>
        <legend><?= __('Edit Author') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>User Name<td colspan='2'>".$this->Form->input('user_name',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Password<td colspan='2'>".$this->Form->input('password',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Name<td colspan='2'>".$this->Form->input('name',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Email<td colspan='2'>".$this->Form->input('email',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Status<td colspan='2'>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive']]);
            echo "<tr><td>Occupation<td colspan='2'>".$this->Form->input('occupation',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>About_user<td colspan='2'>".$this->Form->input('about_user',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Facebook<td colspan='2'>".$this->Form->input('facebook',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Twitter<td colspan='2'>".$this->Form->input('twitter',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Googleplus<td colspan='2'>".$this->Form->input('googleplus',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Pintrest<td colspan='2'>".$this->Form->input('pintrest',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Linkedin<td colspan='2'>".$this->Form->input('linkedin',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Flicker<td colspan='2'>".$this->Form->input('flicker',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Photonew<td>".$this->Form->input('photonew',["type"=>"file",'label'=>false]);
		    echo "<td>".$this->Html->image(IMG_PATH.'author/thumb/'.$author['photo'], array('width' =>'20','height' =>'20'));
		    echo  $this->Form->input('photo',["type"=>"hidden"]);
        ?>
    </fieldset>
	</table>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
