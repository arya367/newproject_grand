<? //use Cake\I18n\Time; ?><div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="properties form large-10 medium-9 columns">
    <?= $this->Form->create($priceManagement); ?>
    <fieldset>
        <legend><?= __('Update price') ?></legend>
       <?php  $count=count($priceManagement);
	  
	if(iterator_count($priceManagement)) { foreach($priceManagement as $key1=>$value2){
		echo "<div id='rowNum".($key1+1)."'><table><tr><td><label for='Unit'>Unit</label><select name='unit_id[]' id='unit-id' required='required'>";
		if(iterator_count($unit)){foreach($unit as $key=>$value){
		if($value2['unit_id']==$value['id']){$checked="selected='selected'";} else { $checked="";}
		
		echo "<option value='".$value['id']."' $checked>".$value['name']."</option>";}}
		echo "</select></td>";
		echo "<td>".$this->Form->input('price',["name"=>"price[]","value"=>$value2['price'],"class"=>"rmv"])."</td><td>".$this->Form->input('size',["name"=>"size[]","value"=>$value2['size']])."</td></tr></table><div class='small_button'><input type='button' value='Remove' onclick='removeRow(".($key1+1).");'></div></div>";
		echo $this->Form->input('id',['name'=>'id[]','value'=>$value2['id']]);
		}
		}
		else
		{ 
		echo "<table><tr><td><label for='Unit'>Unit</label><select name='unit_id[]' id='unit-id' required>";
		if(iterator_count($unit)){foreach($unit as $key=>$value){ echo "<option value='".$value['id']."'>".$value['name']."</option>";}}
		echo "</select></td>";
		echo "<td>".$this->Form->input('price',["name"=>"price[]"])."</td><td>".$this->Form->input('size',["name"=>"size[]"])."</td></tr></table>";
		//echo $this->Form->input('id',['name'=>'id[]','type'=>'hidden']);
		}
	?>
	<div id="itemRows"></div>
    </fieldset>
    <div class="small_button"><input  onClick="addRow(this.form);" type="button" value="Add row"></div><?php echo $this->Form->input('property_id',["type"=>"hidden","value"=>$this->request->params['pass'][0]]); ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
var rowNum = <?=$count+1?>;
function addRow(frm) {
	rowNum ++;
	var row = '<div id="rowNum'+rowNum+'"><table><tr><td><div class="input select required"><label for="unit-id">Unit'+rowNum+'</label><select name="unit_id[]" id="unit-id" required="required"><? foreach($unit as $key=>$value){echo "<option value=".$value['id'].">".$value['name']."</option>";}?></select></div></td><td><div class="input text required"><label for="PriceManagementPrice">Price'+rowNum+'</label><input name="price[]" maxlength="120" type="text" id="PriceManagementPrice" required="required"/></div></td><td><div class="input text required"><label for="PriceManagementSize">Size'+rowNum+'</label><input name="size[]" maxlength="120" type="text" id="PriceManagementSize" required="required"/></div></td></tr></table> <div class="small_button"><input type="button" value="Remove" onclick="removeRow('+rowNum+');"></div></div>';
	

	
	
	jQuery('#itemRows').append(row);
	frm.add_qty.value = '';
	frm.add_name.value = '';
}

function removeRow(rnum) {
	$('#rowNum'+rnum+' .rmv').val(0);
	$('#rowNum'+rnum).hide();
}


var unittype={<? if(iterator_count($unit)){foreach($unit as $key=>$value){?>"<?=$value['id']?>":"<?=$value['name']?>",<? } } ?>}
for(var item in unittype){$('<option value="'+item+'">'+unittype[item]+'</option>').appendTo('.PriceManagementUnitId');}
</script>
