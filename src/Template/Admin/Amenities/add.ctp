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
            <li class="breadcrumb-item active">Amenities</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Amenities'), ['action' => 'index']) ?></li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($amenity); ?>
    <fieldset>
        <legend><?= __('Add Amenity') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Class</td><td>".$this->Form->input('class',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Priority</td><td>".$this->Form->input('priority',array('label'=>false,'class'=>'overview'))."</td></tr>";
			echo "<tr><td>Type</td><td>".$this->Form->input('type',['type'=>'radio','options'=>['aminity'=>'Aminities','connectivity'=>'Connectivity'],'label'=>false,'class'=>'overview'])."</td></tr>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
