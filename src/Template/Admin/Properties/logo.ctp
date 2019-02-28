<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Logo</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($property,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Upadte Logo') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
           echo $property['project_of_the_month_banner']; 
		echo "<tr><td>Property Logo</td><td>".$this->Form->input('property_logo',array("type"=>"file",'label'=>false))."</td>";
		
		echo "<td>".$this->Html->image(SITE_PATH."img/property/logo/".$property['property_logo'],array("width"=>"50","height"=>"50")); 
		
		echo "</td><td><p>Property logo alt tag</p>".$this->Form->input('property_logo_alt_tag',array('label'=>false))."</tr></td>";
		
		 echo $this->Form->input('old_image_name',array("type"=>"hidden","value"=>$property['property_logo']));
			
		 echo "<tr><td>Property image</td><td>".$this->Form->input('property_image',array("type"=>"file",'label'=>false));
		 
		echo "</td><td>".$this->Html->image(SITE_PATH."img/property/propertyimage/".$property['property_image'],array("width"=>"50","height"=>"50"))."</td>"; 
		
		echo "<td><p>Property image alt tag</p>".$this->Form->input('property_image_alt_tag',array('label'=>false))."</td></tr>";
		
		echo $this->Form->input('old_property_image_name',array("type"=>"hidden","value"=>$property['property_image']));
		
		echo "<tr><td>Month Project</td><td>".$this->Form->input('project_of_the_month',['type'=>'checkbox','value'=>'Y'])."</td>";
		
		echo "<td>".$this->Form->input('project_of_the_month_banner',array("type"=>"file"))."</td>";	
		
		echo "<td>".$this->Html->image(SITE_PATH."img/property/project-of-the-month/".$property['project_of_the_month_banner'],array("width"=>"50","height"=>"50"))."</td></tr>";
		
		echo $this->Form->input('old_project_of_the_month_banner',array("type"=>"hidden","value"=>$property['project_of_the_month_banner']));
			
			?>
    </fieldset>
	</table>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
