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
            <li class="breadcrumb-item active">Floor Plan Edit</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $floorPlan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $floorPlan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Floor Plans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['controller' => 'FloorCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategories'), ['controller' => 'FloorSubcategories', 'action' => 'index']) ?> </li>
    </ul>
<div class="form-group container">
    <?= $this->Form->create($floorPlan,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Edit Floor Plan') ?></legend>
        <?php
		 echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
		//print_r($floorPlan);
            echo "<tr><td><label>Property</label><td>".$this->Form->input('property_id', ['options' => $properties,'label'=>false,'class'=>'overview']);
            echo "<tr><td><label>Floor Category_id</label><td>".$this->Form->input('floor_category_id', ['options' => $floorCategories,'label'=>false,'class'=>'overview']);
            echo "<tr><td><label>Floor Subcategory</label><td>".$this->Form->input('floor_subcategory_id', ['options' => $floorSubcategories,'label'=>false,'class'=>'overview']);
            echo "<tr><td><label>Name</label><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'));
            echo "<tr><td><label>Photonew</label><td>".$this->Form->input('photonew',array("type"=>"file",'label'=>false));
		    echo "<tr><td><label>Image</label><td>".$this->Html->image(IMG_PATH.'property/floor/thumb/'.$floorPlan->photo, array('width' =>'50','height' =>'50'));
		    echo  $this->Form->input('photo',["type"=>"hidden"]);
			echo '</table>';
            //echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
