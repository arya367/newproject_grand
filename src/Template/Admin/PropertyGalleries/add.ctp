<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Gallery Add</li>
          </ol>
<? use Cake\ORM\TableRegistry;
$builders = TableRegistry::get('Builders');
$builder = $builders->find()->select(['id','name']);

//$properties = TableRegistry::get('Properties');
//$property = $properties->find()->select(['id','name']);
?>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Property Galleries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($propertyGallery,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Add Property Gallery') ?></legend>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<tr><td><label for="builder-id">Builders</label>
		<td><select name="builder_id" id="builder-id" required="required">
		<option value="">Select Builder</option>
		<? foreach($builder as $data) { ?><option value="<?=$data['id']?>"><?=$data['name']?></option>
		<? } ?>
		</select>
        </td></tr>
		<tr><td><label for="property-id">Properties</label></td>
		<td><select name="property_id" id="property-id" required="required">
		<option value="">Select Property</option>
		</select>
        </td>
        </tr>
		</div>
        <?php
		
		
			//echo $this->Form->input('property_id', ['options' => $property]);
            echo "<tr><td>Alt<td>".$this->Form->input('alt',array('label'=>false));
            echo "<tr><td>Image<td>".$this->Form->input('image',['type'=>'file','multiple'=>'multiple','name'=>'image[]','label'=>false]);
            echo "<tr><td>Type<td>".$this->Form->input('type',["type"=>"radio",'options' => ['gallery'=>'Gallery'],'label'=>false]);
        ?>
    </fieldset>
    </table>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("#builder-id").change(function(){
  var c=$(this).val();
  $.ajax({url:"<?=SITE_PATH?>admin/properties/proplist/"+c,success:function(result){$("#property-id").html(result);}});
  
  });
});
</script>