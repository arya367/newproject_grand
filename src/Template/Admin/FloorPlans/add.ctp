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
            <li class="breadcrumb-item active">Floor Plan Add</li>
          </ol>
<? use Cake\ORM\TableRegistry;
$builders = TableRegistry::get('Builders');
$builder = $builders->find('list')->select(['id','name']);
?>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Floor Plans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['controller' => 'FloorCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategories'), ['controller' => 'FloorSubcategories', 'action' => 'index']) ?> </li>
        
    </ul>

<div class="form-group container">
    <?= $this->Form->create($floorPlan,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Add Floor Plan') ?></legend>
        <?php
		  
		    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
		    echo  "<tr><td><label>Builder</label><td>".$this->Form->input('builder_id', ['options' => $builder,'label'=>false,'class'=>'overview'])."</td></tr>";
            echo  "<tr><td>Properties Name<td>".$this->Form->input('property_id', ['options' => $properties,'label'=>false,'class'=>'overview'])."</td></tr>";
            echo  "<tr><td>Floor Category<td>".$this->Form->input('floor_category_id', ['options' => $floorCategories,'label'=>false,'class'=>'overview'])."</td></tr>";
            echo  "<tr><td>Floor SubCategory<td>".$this->Form->input('floor_subcategory_id',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo  "<tr><td>Name<td>".$this->Form->input('name',['name'=>'name[]','label'=>false,'class'=>'overview'])."</td></tr>";
			echo  "<tr><td>Carpet Area<td>".$this->Form->input('carpet',['name'=>'carpet[]','label'=>false,'class'=>'overview'])."</td></tr>";
			echo  "<tr><td>Balcony Area<td>".$this->Form->input('balcony',['name'=>'balcony[]','label'=>false,'class'=>'overview'])."</td></tr>";
			echo  "<tr><td>Saleable Area<td>".$this->Form->input('saleable',['name'=>'saleable[]','label'=>false,'class'=>'overview'])."</td></tr>";
			echo  "<tr><td>Image<td>".$this->Form->input('photo',['type'=>'file','name'=>'photo[]','label'=>false,'class'=>'overview'])."</td></tr>";
			echo '</table>';
            //echo $this->Form->input('status');
        ?>
        <div id="itemRows">
    </fieldset>
    <?= $this->Form->button('Add row',['type'=>'button','onclick'=>'addRow(this.form)']) ?><?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>

var rowNum = 0;
function addRow(frm) {
	rowNum ++;
	var row = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><tr><td><div id="rowNum'+rowNum+'"><div class="input text required"><label for="name">Name '+rowNum+'</label></td><td><input type="text" name="name[]" required="required" maxlength="150" id="name"></td></div></tr><tr><td><div id="rowNum'+rowNum+'"><div class="input text required"><label for="carpet">Carpet Area '+rowNum+'</label></td><td><input type="text" name="carpet[]" required="required" maxlength="150" id="carpet"></td></div></tr><tr><td><div id="rowNum'+rowNum+'"><div class="input text required"><label for="balcony">Balcony '+rowNum+'</label></td><td><input type="text" name="balcony[]" required="required" maxlength="150" id="balcony"></td></div></tr><tr><td><div id="rowNum'+rowNum+'"><div class="input text required"><label for="name">Saleable '+rowNum+'</label></td><td><input type="text" name="saleable[]" required="required" maxlength="150" id="saleable"></td></div></tr><tr><td><div class="input file required"><label for="photo">Photo '+rowNum+'</label><td><input type="file" name="photo[]" required="required" id="photo"></td></div><tr><td><input type="button" value="Remove" onclick="removeRow('+rowNum+');"></td></tr></div></table>';
	
	jQuery('#itemRows').append(row);
	frm.add_qty.value = '';
	frm.add_name.value = '';
}

function removeRow(rnum) {
	jQuery('#rowNum'+rnum).remove();
}

$(document).ready(function(){
  $("#builder-id").change(function(){ 
  var c=$(this).val();
 $.ajax({url:"<?=SITE_PATH?>admin/properties/proplist/"+escape(c),dataType:"html",success:function(result){
		$("#property-id").html(result);
		}});
  });
});

$(document).ready(function(){
  $("#floor-category-id").change(function(){
  var c=$(this).val();
  $.ajax({url:"<?=SITE_PATH?>admin/floor_subcategories/subfloor/"+c,success:function(result){$("#floor-subcategory-id").html(result);}});
  
  });
});


</script>