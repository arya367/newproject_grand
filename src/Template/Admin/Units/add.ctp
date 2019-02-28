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
            <li class="breadcrumb-item active">Price Managemen Add</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?></li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($unit); ?>
    <fieldset>
        <legend><?= __('Add Unit') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name</td><td>".$this->Form->input('name' ,array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Url</td><td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Priority</td><td>".$this->Form->input('priority',array('label'=>false,'class'=>'overview'))."</td></tr>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div></div></div>