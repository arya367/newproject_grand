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
            <li class="breadcrumb-item active">Blog</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
		    
            echo "<tr><td>Username</td><td>".$this->Form->input('username',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>password</td><td>".$this->Form->input('password',array('label'=>false,'class'=>'overview'))."</tr></td>";
            //echo $this->Form->input('menu');
			echo "<tr><td>Role</td><td>".$this->Form->input('role',['type'=>'radio','options' => ['admin'=>'Admin', 'regular'=>'Regular', 'seo'=>'Seo', 'resale'=>'Resale'],'label'=>false]);
			echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</tr></td>";
			
			use Cake\ORM\TableRegistry;
            $query = TableRegistry::get('Menuheaders')->find();
        ?>
		</table>
		
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
