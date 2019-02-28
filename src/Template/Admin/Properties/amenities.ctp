<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Amenities</li>
          </ol>
<?
use Cake\ORM\TableRegistry;


$amenities = TableRegistry::get('Amenities');
$amenity = $amenities->find('list')->select(['id','name'])->where(['type'=>'aminity'])->order(['priority' => 'ASC']);

//$properties = TableRegistry::get('Properties');
//$property = $properties->find()->select(['id','name']);
?><div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($property); ?>
    <fieldset>
        <legend><?= __('Add Amenities') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		
        <?php
		    
			$selectedtabs=@unserialize($property->amenities);
			echo "<tr><td>Amenities</td><td>".$this->Form->input('amenities',['options' => $amenity,'multiple'=>'checkbox','val'=>$selectedtabs,'label'=>false])."</td></tr>";
	
        ?>
		
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
