<style>
.overview{width:100%}
</style>
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Seo</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($property); ?>
    <fieldset>
        <legend><?= __('Update Seo') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            
		echo "<tr><td>Seo Title</td><td>".$this->Form->input('seo_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Seo Description</td><td>".$this->Form->input('seo_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		echo "<tr><td>Specification Title</td><td>".$this->Form->input('specification_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Specification Description</td><td>".$this->Form->input('specification_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		echo "<tr><td>location Title</td><td>".$this->Form->input('location_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Location Description</td><td>".$this->Form->input('location_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		echo "<tr><td>Pricelist Title</td><td>".$this->Form->input('pricelist_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Pricelist Description</td><td>".$this->Form->input('pricelist_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		echo "<tr><td>Masterplan Title</td><td>".$this->Form->input('masterplan_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Masterplan Description</td><td>".$this->Form->input('masterplan_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		echo "<tr><td>Siteplan Title</td><td>".$this->Form->input('siteplan_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Siteplan Description</td><td>".$this->Form->input('siteplan_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		echo "<tr><td>Floorplan Title</td><td>".$this->Form->input('floorplan_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Floorplan Description</td><td>".$this->Form->input('floorplan_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		echo "<tr><td>Gallery Title</td><td>".$this->Form->input('gallery_title',array("rows"=>"1",'label'=>false,'class'=>'overview'));
		echo "<tr><td>Gallery Description</td><td>".$this->Form->input('gallery_description',array("maxLength"=>"160",'label'=>false,'class'=>'overview'),array("rows"=>"5"));
		//echo $this->Form->input('seo_keyword',array("rows"=>"5"));
		//echo $this->Form->input('open_graph_status',array("type"=>"radio",'options' => array('active'=>'active', 'deactive'=>'deactive')));
			
			
			?>
			</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
