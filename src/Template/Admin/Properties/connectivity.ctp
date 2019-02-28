<style>
td select {margin-left: 15px}
td input {margin-left: 15px;width:85%}
</style>
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Connectivity</li>
          </ol>
<?
use Cake\ORM\TableRegistry;


$amenities = TableRegistry::get('Amenities');
$amenity = $amenities->find('list')->select(['id','name'])->where(['type'=>'connectivity'])->order(['priority' => 'ASC']);

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
    <?= $this->Form->create($connectivity); ?>
    <fieldset>
        <legend><?= __('Edit Connectivity') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
		    
			$selectedtabs=@unserialize($property->amenity);
			
			if(iterator_count($connectivity)) { foreach($connectivity as $key=>$value){
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity,'val'=>$value['amenity_id']])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description','val'=>$value['name']]). $this->Form->input('id',['name'=>'id[]','value'=>$value['id']])."</td></tr>";
			
			}
		}
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo "<tr><td>".$this->Form->input('amenity_id[]',['label'=>'Connectivity','options' => $amenity])."</td>  <td>".$this->Form->input('name[]',['label'=>'Description'])."</td></tr>";
			
			echo $this->Form->input('property_id',["type"=>"hidden","value"=>$this->request->params['pass'][0]]);
	
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
