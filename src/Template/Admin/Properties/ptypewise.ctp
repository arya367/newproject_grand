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
            <li class="breadcrumb-item active">Property Type Wise Priority</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?></li>
    </ul>

<div class="form-group container">
	<h2><?php echo __('Property Type Wise Priority'); ?></h2>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	
	<tr><th> <? echo $this->Html->link("RESIDENTIAL",array("controller"=>"properties","action"=>"ptypewise",'1'))?> </th><th> <? echo $this->Html->link("COMMERCIAL",array("controller"=>"properties","action"=>"ptypewise",'2'))?></th><th><select name="filter" id="filter"><option value="">Select Column</option><? if(isset($this->request->params['pass'][0])){ foreach ($locations as $key=>$value) { ?><option value="<?=$value['id']?>" <? if($loc==$value['id']) { ?> selected <? } ?>><?=$value['name']?></option><? } } ?></select></th>
	</tr>
	</table>
	
	<div id="response">
	<? if(isset($this->request->params['pass'][1])){ ?>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<tr><td colspan="4"> <button class="resetall" name="reset">Reset All Priority</button></td></tr>
		<tr>
		<th>id</th>
		<th>Name</th>
		<th>Status</th>
		<th class="actions">Priority</th><input type="hidden" value="<?=$filter?>" name="[<?=$filter?>]">
		</tr>
		<?php foreach ($properties as $key=>$property): ?>
		<tr>
		<td><?php echo h($property['id']); ?>&nbsp;</td>
		<td><?php echo h($property['name']); ?>&nbsp;</td>
		<td><?php echo h($property['status']); ?>&nbsp;</td>
		<td class="actions">
		<input type="number" class="small_txt"  value="<?=$property['orderby']?>" id="<?=$key?>_new<?=$property['id']?>" onChange="changePriority('<?=$key?>','<?=$property['id']?>')">
		<input type="hidden"  value="<?=$property['orderby']?>" id="<?=$key?>_old<?=$property['id']?>">
		</td>
		</tr>
		<?php endforeach; ?>
		<tr><td colspan="4"> <button class="resetall" name="reset">Reset All Priority</button></td></tr>
		</table>
		<? } ?>
	
	</div>

</div>

<script>
$(document).ready(function(){
  $("#filter").change(function(){ 
  var c=$(this).val();
  window.location.href="<?=SITE_PATH?>admin/properties/ptypewise/<?=$type?>/"+escape(c);
  });
});

$(document).ready(function(){
 $(".resetall").click(function(){
 $("#response").html("loading please wait......");
   var c="<?=$loc?>";
	 var type="<?=$type?>";
	 var loc="<?=$loc?>";
		$.ajax({url:"<?=SITE_PATH?>admin/properties/resetallptypewisepriority/"+escape(type)+"/"+escape(loc),dataType:"html",success:function(result){
		 window.location.href="<?=SITE_PATH?>admin/properties/ptypewise/<?=$type?>/"+escape(c);
		}});
	});
});


function changePriority(key,field){
 
  var newpr=$("#"+key+"_new"+field).val();
  var oldpr=$("#"+key+"_old"+field).val();
  var orderby='ptypewise';
  var c="<?=$loc?>";
  var type="<?=$type?>";
  var loc="<?=$loc?>";
  if(newpr<=0){alert("Please Insert Ranking For Project"); return false;}
  else if($.isNumeric( newpr )==false){alert("Please enter numeric value"); return false;}
  else
  {
     $("#response").html("loading please wait......");
     $.ajax({url:"<?=SITE_PATH?>admin/properties/swapptypewisepriority/"+escape(orderby)+"/"+escape(type)+"/"+escape(loc)+"/"+escape(newpr)+"/"+escape(oldpr),dataType:"html",success:function(result){
     window.location.href="<?=SITE_PATH?>admin/properties/ptypewise/<?=$type?>/"+escape(c);
	 
}});
}
}
</script>

