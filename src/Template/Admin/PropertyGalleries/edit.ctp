<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Gallery Edit</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertyGallery->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertyGallery->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Property Galleries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($propertyGallery,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Edit Property Gallery') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <?php
            echo "<tr><td>Property<td>".$this->Form->input('property_id', ['options' => $properties,'label'=>false])."</tr></td>";
            echo "<tr><td>Alt<td>".$this->Form->input('alt',array('label'=>false))."</tr></td>";
            echo "<tr><td>Photonew<td>".$this->Form->input('photonew',['type'=>'file','label'=>false])."</tr></td>";
			echo  $this->Form->input('image',array("type"=>"hidden"));
            echo "<tr><td>Type<td>".$this->Form->input('type',["type"=>"radio",'options' => ['elevation-images'=>'Elevation', 'elevation-images-apartments'=>'Elevation-Apartments', 'elevation-images-floors'=>'Elevation-Floors', 'elevation-images-plots'=>'Elevation-Plots', 'elevation-images-villas'=>'Elevation-Villas', 'construction-images'=>'Construction', 'construction-images-apartments'=>'Construction-Apartments', 'construction-images-floors'=>'Construction-Floors', 'construction-images-plots'=>'Construction-Plots', 'construction-images-villas'=>'Construction-Villas'],'label'=>false])."</tr></td>";
			echo "<tr><td>Image<td>".$this->Html->image(IMG_PATH.'property/gallery/thumb/'.$propertyGallery['image'], array('width' =>'100','height' =>'100'))."</tr></td>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>
</div>