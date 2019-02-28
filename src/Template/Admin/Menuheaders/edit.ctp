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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menuheader->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menuheader->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Menuheaders'), ['action' => 'index']) ?></li>
        
    </ul>
<div class="form-group container">
    <?= $this->Form->create($menuheader); ?>
    <fieldset>
        <legend><?= __('Edit Menuheader') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name<td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Controller<td>".$this->Form->input('controller',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Action<td>".$this->Form->input('action',array('label'=>false,'class'=>'overview'))."</tr></td>";
            //echo $this->Form->input('navid');
            echo "<tr><td>Status<td>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive'],'label'=>false])."</tr></td>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></div></div>
