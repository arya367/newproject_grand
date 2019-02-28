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
            <li class="breadcrumb-item active">Author Add</li>
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
    <?= $this->Form->create($author,['type'=>'file']); ?>
    <fieldset>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <legend><?= __('Add Author') ?></legend>
        <?php
            echo "<tr><td>User Name</td><td>".$this->Form->input('user_name',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Password</td><td>".$this->Form->input('password',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td> email</td><td>".$this->Form->input('email',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>statuse</td><td>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive'],'label'=>false])."</tr></td>";
            echo "<tr><td>Occupation</td><td>".$this->Form->input('occupation',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>About user</td><td>".$this->Form->input('about_user',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Facebook</td><td>".$this->Form->input('facebook',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Twitter</td><td>".$this->Form->input('twitter',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Googlepluse</td><td>".$this->Form->input('googleplus',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Pintrest</td><td>".$this->Form->input('pintrest',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Linkedin</td><td>".$this->Form->input('linkedin',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Flicker</td><td>".$this->Form->input('flicker',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Photo</td><td>".$this->Form->input('photo',['type'=>'file','label'=>false])."</tr></td>";
        ?>
		 </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
