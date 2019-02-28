
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
            <li class="breadcrumb-item active">Properties Type</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Property Types'), ['action' => 'index']) ?></li>
    </ul>
<div class="form-group container">
    <?= $this->Form->create($propertyType); ?>
    <fieldset>
        <legend><?= __('Add Property Type') ?></legend>
        <?php
		    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
            echo "<tr><td>Name<td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>URL<td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Priority<td>".$this->Form->input('priority',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>Status<td>".$this->Form->input('status',["type"=>"radio",'label'=>false,'options' => ['active'=>'active', 'deactive'=>'deactive']])."</tr></td>";
			
			echo '</table>'
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
