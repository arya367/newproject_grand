<style>
.overview{width:100%}
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Tabs</li>
          </ol>


    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertyTab->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertyTab->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Property Tabs'), ['action' => 'index']) ?></li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($propertyTab); ?>
    <fieldset>
        <legend><?= __('Edit Property Tab') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
		    echo "<tr><td>Catid</td><td>".$this->Form->input('catid' ,array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Url</td><td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Priority</td><td>".$this->Form->input('priority',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Status</td><td>".$this->Form->input('status',["type"=>"radio",'options' => ['active'=>'active', 'deactive'=>'deactive'],'label'=>false])."</tr></td>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
