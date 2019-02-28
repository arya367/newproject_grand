<style>
.overview{width:100%}
</style>
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Plan</li>
          </ol>
<? //use Cake\I18n\Time; ?><div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($property,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Update Plans') ?></legend>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><tr>
		<?php
		echo "<td><p>location Heading</p>".$this->Form->input('location_heading',array('label'=>false,'class'=>'overview'))."</td>";
		echo "<td><p>location Image</p>".$this->Form->input('location_image',["type"=>"file",'label'=>false]). $this->Html->image("property/location_map/".$property['location_image'],["width"=>"50","height"=>"50"])."</td>";
		echo "<td><p>location Alt Tag</p>".$this->Form->input('location_alt_tag',array('label'=>false,'class'=>'overview'))."</td>";
		echo $this->Form->input('old_location_image_name',["type"=>"hidden","value"=>$property['location_image']]);
		?></tr>
		<tr>
		<?
		echo "<td><p>Master Heading</p>".$this->Form->input('master_heading',array('label'=>false,'class'=>'overview'))."</td>";
		echo "<td><p>Master Image</p>".$this->Form->input('master_image',["type"=>"file",'label'=>false]). $this->Html->image("property/master_plan/".$property['master_image'],["width"=>"50","height"=>"50"])."</td>";
		echo "<td><p>Master Alt Tag</p>".$this->Form->input('master_alt_tag',array('label'=>false,'class'=>'overview'))."</td>";
		echo $this->Form->input('old_master_image_name',["type"=>"hidden","value"=>$property['master_image']]);
		?>
		</tr>
		<tr>
		<?
		echo "<td><p>Site Heading</p>".$this->Form->input('site_heading',array('label'=>false,'class'=>'overview'))."</td>";
		echo "<td><p>Site Image</p>".$this->Form->input('site_image',["type"=>"file",'label'=>false]). $this->Html->image("property/site_plan/".$property['site_image'],["width"=>"50","height"=>"50"])."</td>";
		echo "<td><p>Site Alt Tag</p>".$this->Form->input('site_alt_tag',array('label'=>false,'class'=>'overview'))."</td>";
		echo $this->Form->input('old_site_image_name',["type"=>"hidden","value"=>$property['site_image']]);
		?>
		</tr>
		<tr>
		<?
		echo "<td><p>Numbering Heading</p>".$this->Form->input('numbering_heading',array('label'=>false,'class'=>'overview'))."</td>";
		echo "<td><p>Numbering Image</p>".$this->Form->input('numbering_image',["type"=>"file",'label'=>false]). $this->Html->image("property/numbering_plan/".$property['numbering_image'],["width"=>"50","height"=>"50"])."</td>";
		echo "<td><p>Numbering Alt Tag</p>".$this->Form->input('numbering_alt_tag',array('label'=>false,'class'=>'overview'))."</td>";
		echo $this->Form->input('old_numbering_image_name',["type"=>"hidden","value"=>$property['numbering_image']]);
		?>
		</tr>
		<tr>
		<?		
		echo "<td><p>Layout Heading</p>".$this->Form->input('layout_heading',array('label'=>false,'class'=>'overview'))."</td>";
		echo "<td><p>Layout Image</p>".$this->Form->input('layout_image',["type"=>"file",'label'=>false]). $this->Html->image("property/layout_plan/".$property['layout_image'],["width"=>"50","height"=>"50"])."</td>";
		echo "<td><p>Layout Alt Tag</p>".$this->Form->input('layout_image_alt',array('label'=>false,'class'=>'overview'))."</td>";
		echo $this->Form->input('old_layout_image_name',["type"=>"hidden","value"=>$property['layout_image']]);
       ?>
		</tr>
		<tr>
		<?		
		echo "<td><p>KeyPLan Heading</p>".$this->Form->input('keyplan_heading',array('label'=>false,'class'=>'overview'))."</td>";
		echo "<td><p>KeyPLan Image</p>".$this->Form->input('keyplan_image',["type"=>"file",'label'=>false]). $this->Html->image("property/keyplan_plan/".$property['keyplan_image'],["width"=>"50","height"=>"50"])."</td>";
		echo "<td><p>KeyPlan Alt Tag</p>".$this->Form->input('keyplan_alt_tag',array('label'=>false,'class'=>'overview'))."</td>";
		echo $this->Form->input('old_keyplan_image_name',["type"=>"hidden","value"=>$property['keyplan_image']]);
       ?>
	   </tr></table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>