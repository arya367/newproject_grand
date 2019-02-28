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
            <li class="breadcrumb-item active">Properties Type Location Edit</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertypeLocation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertypeLocation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Propertype Locations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Property Types'), ['controller' => 'PropertyTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Type'), ['controller' => 'PropertyTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Property Subtypes'), ['controller' => 'PropertySubtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Subtype'), ['controller' => 'PropertySubtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
<div class="form-group container">
    <?= $this->Form->create($propertypeLocation); ?>
    <fieldset>
        <legend><?= __('Edit Propertype Location') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php print_r($propertypeLocation->updated);
            echo "<tr><td>Property Type</td><td>".$this->Form->input('property_type_id', ['options' => $propertyTypes,'label'=>false,'class'=>'overview']);
            //echo $this->Form->input('property_subtype_id', ['options' => $propertySubtypes,'label'=>false,'class'=>'overview']);
            echo "<tr><td>Location</td><td>".$this->Form->input('location_id', ['options' => $locations,'label'=>false,'class'=>'overview']);
            echo "<tr><td>Url</td><td>". $this->Form->input('url',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'));
			echo "<tr><td>Heading2</td><td>".$this->Form->input('heading2',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Seo Title</td><td>".$this->Form->input('seo_title',array('label'=>false,'class'=>'overview'));
           // echo $this->Form->input('seo_keyword');
            echo "<tr><td>Seo Description</td><td>".$this->Form->input('seo_description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Description</td><td>". $this->Form->input('description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Status</td><td>".$this->Form->input('status',["type"=>"radio",'options' => ['active'=>'active', 'deactive'=>'deactive'],'label'=>false,'class'=>'overview']);
            //echo $this->Form->input('issublocation',["type"=>"radio",'options' => ['active'=>'active', 'deactive'=>'deactive']]);
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></div></div>
