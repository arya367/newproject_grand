<? $ebro=unserialize($property['ebrochure_pdf']); 
   $appl=unserialize($property['application_pdf']);
   
   $eebrochure='';if(isset($ebro['e-brochure'])) { $eebrochure=$ebro['e-brochure'];}
   $eapartments='';if(isset($ebro['e-brochure-apartments'])) { $eapartments=$ebro['e-brochure-apartments'];}
   $efloors='';if(isset($ebro['e-brochure-floors'])) { $efloors=$ebro['e-brochure-floors'];}
   $eplots='';if(isset($ebro['e-brochure-plots'])) { $eplots=$ebro['e-brochure-plots'];}
   $evillas='';if(isset($ebro['e-brochure-villas'])) { $evillas=$ebro['e-brochure-villas'];}
   
   $aapplication='';if(isset($appl['application-form'])) { $aapplication=$appl['application-form'];}
   $aapartments='';if(isset($appl['application-form-apartments'])) { $aapartments=$appl['application-form-apartments'];}
   $afloors='';if(isset($appl['application-form-floors'])) { $afloors=$appl['application-form-floors'];}
   $aplots='';if(isset($appl['application-form-plots'])) { $aplots=$appl['application-form-plots'];}
   $avillas='';if(isset($appl['application-form-villas'])) { $avillas=$appl['application-form-villas'];}
   
   
   
//print_r($dd);?>
<? //use Cake\I18n\Time; ?><div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="properties form large-10 medium-9 columns">
    <?= $this->Form->create($property,['type'=>'file']); ?>
    <fieldset>
    <table>
        <legend><?= __('Update PDF Documents') ?></legend>
       <?php
		//echo "<td>".$this->Form->input('ebrochure_heading')."</td>";
		echo "<tr><td>".$this->Form->input('e-brochure',["type"=>"file"])." <a class='eebrochure'>".$eebrochure." remove </a>";
		echo "<span id='eebrochure'>".$this->Form->input('old-ebrochure',["type"=>"hidden","value"=>$eebrochure])." </span></td></tr>";
		
		echo "<tr><td>".$this->Form->input('e-brochure-apartments',["type"=>"file"])." <a class='eapartments'>".$eapartments." remove </a>";
		echo "<span id='eapartments'>".$this->Form->input('old-ebrochure-apartments',["type"=>"hidden","value"=>$eapartments])." </span></td></tr>";
		
		echo "<tr><td>".$this->Form->input('e-brochure-floors',["type"=>"file"])." <a class='efloors'>".$efloors." remove </a>";
		echo "<span id='efloors'>".$this->Form->input('old-ebrochure-floors',["type"=>"hidden","value"=>$efloors])." </span></td></tr>";
		
		echo "<tr><td>".$this->Form->input('e-brochure-plots',["type"=>"file"])." <a class='eplots'>".$eplots." remove </a>";
		echo "<span id='eplots'>".$this->Form->input('old-ebrochure-plots',["type"=>"hidden","value"=>$eplots])." </span></td></tr>";
		
		echo "<tr><td>".$this->Form->input('e-brochure-villas',["type"=>"file"])." <a class='evillas'>".$evillas." remove </a>";
		echo "<span id='evillas'>".$this->Form->input('old-ebrochure-villas',["type"=>"hidden","value"=>$evillas])." </span></td></tr>";
		
		//echo "<td>".$this->Form->input('application_heading')."</td>";
		
		echo "<tr><td>".$this->Form->input('application-form',["type"=>"file"])." <a class='aapplication'>".$aapplication." remove </a>";
		echo "<span id='aapplication'>".$this->Form->input('old-application',["type"=>"hidden","value"=>$aapplication])."</span></td></tr>";
		
	echo "<tr><td>".$this->Form->input('application-form-apartments',["type"=>"file"])." <a class='aapartments'>".$aapartments." remove </a>";
	echo "<span id='aapartments'>".$this->Form->input('old-application-apartments',["type"=>"hidden","value"=>$aapartments])." </span></td></tr>";
		
		echo "<tr><td>".$this->Form->input('application-form-floors',["type"=>"file"])." <a class='afloors'>".$afloors." remove </a>";
		echo "<span id='afloors'>".$this->Form->input('old-application-floors',["type"=>"hidden","value"=>$afloors])." </span></td></tr>";
		
		echo "<tr><td>".$this->Form->input('application-form-plots',["type"=>"file"])." <a class='aplots'>".$aplots." remove </a>";
		echo "<span id='aplots'>".$this->Form->input('old-application-plots',["type"=>"hidden","value"=>$aplots])." </span></td></tr>";
		
		echo "<tr><td>".$this->Form->input('application-form-villas',["type"=>"file"])." <a class='avillas'>".$avillas." remove </a>";
		echo "<span id='avillas'>".$this->Form->input('old-application-villas',["type"=>"hidden","value"=>$avillas])." </span></td></tr>";
		
		
		?>
	   </table>
    </fieldset>
     <?= $this->Form->input('remove',["name"=>'removethis',"type"=>"hidden","value"=>""]); ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("form a").click(function(){
 // var c=$(this).parent().attr('id');
  
  var c=$(this).attr('class');
  //alert($("#"+c).children().attr('value')); 
  confirmv=confirm('are you sure to remove this');
  if(confirmv)
  {
	  $(this).remove();
	  $('[name="removethis"]').val($('#remove').val()+","+$("#"+c).children().val());
	  $("#"+c).children().val('');
	  }
	  //alert($("#"+c).children().val());
  });
});
</script>
