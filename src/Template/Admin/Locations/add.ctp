
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
            <li class="breadcrumb-item active">Properties Location Add</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li>
    </ul>
<div class="form-group container">
    <?= $this->Form->create($location,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo "<tr><td>State</td><td>".$this->Form->input('state',array('label'=>false,'class'=>'overview'))."</tr></td>";
            echo  "<tr><td>Url</td><td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'))."</tr></td>";
           // echo $this->Form->input('photo',['type'=>'file','label'=>false]);
            echo "<tr><td>Navid</td><td>".$this->Form->input('navid',array('label'=>false,'class'=>'overview'))."</tr></td>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
</div>
