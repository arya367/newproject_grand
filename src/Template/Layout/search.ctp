<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><? print_r(trim($seo_title));?></title>
<meta name="description" content="<? print_r(trim($seo_description));?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<? print_r($robots);?>
<meta http-equiv="expires" content="<?=gmdate("D, d M Y H:i:s", time() + (3600*24)) . ' GMT'?>">
<meta http-equiv="pragma" content="no-cache">
<link rel="author" href="<?=SITE_PATH?>">
<?php  echo $this->element('common-hco'); ?>
<link href="<?=CDN_PATH?>css/project_list.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php  echo $this->element('inner-header'); ?>
<div class="content-wrapper">
<div class="container">
<div class="row">
<div class="col-lg-12"><ol itemprop="breadcrumb" class="breadcrumb"><li><a href="<?=SITE_PATH?>" itemprop="url" class="brd_icon">Home</a></li><li>Search</li></ol></div></div>
<div class="row">
<div class="col-lg-12 list_content"><?php /*?><h1>Search</h1><?php */?><?=$content[0]['description']; ?></div>
</div>
<div class="row marginT10 marginB20">
<div class="col-lg-12">
<div class="col-lg-3 col-md-3 col-sm-3 border_t">
<form method="get" action="<?=SITE_PATH?>search/" class="auto_submit_item">
<div class="rfn_con">
<div class="rfn_heading">Refine Result</div>
<div class="form-group"><label>Budget:</label>
<div class="input-group"><select class="form-control builder_select" id='min'  name="min"><option value="0">Min</option></select><span class="input-group-addon">to</span><select class="form-control builder_select" id='max' name="max"><option value="0">Max</option></select></div></div>

<div class="form-group"><label>Builder:</label>
<select class="form-control builder_select"  id="bid" name="bid"><option value="0">Select Builder</option></select></div>
<?=$dataofsubtype=$this->cell('Common::builderList');  ?>

<div class="form-group"><label>Location:</label>
<select class="form-control builder_select" id='loc' name="loc"><option value="0">Select Location</option></select></div>
<?=$dataofsubtype=$this->cell('Common::locationListOnBuilder');  ?>
<div class="form-group"><label>Property Type:</label>
<select class="form-control builder_select" id='type_id'  name="type"><option value="0">Select Property Type</option></select></div>
<div class="form-group"><label>Property Sub Type:</label>
<select class="form-control builder_select" id='sub_type_id'  name="subtype"><option value="0">Select Sub Type</option></select></div>
<?=$dataofsubtype=$this->cell('Common::propertySubtypes');  ?>
<?php /*?><? if($ptypeid!=2) { ?><?php */?><div class="form-group"><label>Bed:</label>
<select class="form-control builder_select" id="bed"   name="beds">
<option value="0">Beds</option></select></div><?php /*?><? } else { echo "<input type='hidden' class='form-control builder_select' value=\"0\">";} ?><?php */?>
<div class="form-group"><input type="button" id='filter-clear' value="Reset" class="btn btn-danger"></div>
</div></form>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 border_l border_t">
<div class="row"><div class="border_t"></div></div>
<div class="pr_con">
 <?= $this->fetch('content') ?></div></div></div></div></div></div>
<?php  echo $this->element('footer'); ?>
</div>
<script type="text/javascript">
selected='';
 for(var item in locations){
     <? if(isset($this->request->query['loc'])) {?>
	 if(locations[item]==="<?=$this->request->query['loc']?>") { selected='selected="selected"';} else {selected='';} <? } ?>
	 $('<option value="'+locations[item]+'" '+selected+'>'+locations[item]+'</option>').appendTo('#loc');
	 
	 }
	 
	 for(var item in builders){
     <? if(isset($this->request->query['bid'])) {?>
	 if(item==="<?=$this->request->query['bid']?>") { selected='selected="selected"';} else {selected='';} <? } ?>
	 $('<option value="'+item+'" '+selected+'>'+builders[item]+'</option>').appendTo('#bid');
	 
	 }
	 
var bugmin={"1000000":"10 Lacs","2000000":"20 Lacs","3000000":"30 Lacs","4000000":"40 Lacs","5000000":"50 Lacs","6000000":"60 Lacs","7000000":"70 Lacs","8000000":"80 Lacs","9000000":"90 Lacs","10000000":"1 Cr","20000000":"2 Cr","30000000":"3 Cr","40000000":"4 Cr","50000000":"5 Cr","60000000":"6 Cr","70000000":"7 Cr","80000000":"8 Cr","90000000":"9 Cr","100000000":"10 Cr","110000000":"11 Cr","120000000":"12 Cr","130000000":"13 Cr","140000000":"14 Cr","150000000":"15 Cr","160000000":"16 Cr","170000000":"17 Cr","180000000":"18 Cr","190000000":"19 Cr","200000000":"20 Cr","210000000":"21 Cr","220000000":"22 Cr","230000000":"23 Cr","240000000":"24 Cr","250000000":"25 Cr",}
for(var item in bugmin){
	<? if(isset($this->request->query['min'])) {?>
	if(item==="<?=$this->request->query['min']?>") { selected='selected="selected"';} else {selected='';} <? } ?>
	$('<option value="'+item+'" '+selected+'>'+bugmin[item]+'</option>').appendTo('#min');
	
	}

var bugmax={"1000000":"10 Lacs","2000000":"20 Lacs","3000000":"30 Lacs","4000000":"40 Lacs","5000000":"50 Lacs","6000000":"60 Lacs","7000000":"70 Lacs","8000000":"80 Lacs","9000000":"90 Lacs","10000000":"1 Cr","20000000":"2 Cr","30000000":"3 Cr","40000000":"4 Cr","50000000":"5 Cr","60000000":"6 Cr","70000000":"7 Cr","80000000":"8 Cr","90000000":"9 Cr","100000000":"10 Cr","110000000":"11 Cr","120000000":"12 Cr","130000000":"13 Cr","140000000":"14 Cr","150000000":"15 Cr","160000000":"16 Cr","170000000":"17 Cr","180000000":"18 Cr","190000000":"19 Cr","200000000":"20 Cr","210000000":"21 Cr","220000000":"22 Cr","230000000":"23 Cr","240000000":"24 Cr","250000000":"25 Cr","260000000":"26 Cr","270000000":"27 Cr","280000000":"28 Cr","290000000":"29 Cr","300000000":"30 Cr","190000000":"31 Cr","320000000":"32 Cr","330000000":"33 Cr","340000000":"34 Cr","350000000":"35 Cr","360000000":"36 Cr","370000000":"37 Cr","380000000":"38 Cr","3990000000":"39 Cr","400000000":"40 Cr",}

for(var item in bugmax){
	<? if(isset($this->request->query['max'])) {?>
	if(item==="<?=$this->request->query['max']?>") { selected='selected="selected"';} else {selected='';} <? } ?>
	$('<option value="'+item+'" '+selected+'>'+bugmax[item]+'</option>').appendTo('#max');
	
	}
var beds={"1":"1 Bhk","2":"2 Bhk","3":"3 Bhk","4":"4 Bhk","5":"5 Bhk"}
for(var item in beds){
	
	<? if(isset($this->request->query['beds'])) {?>
	if(item==="<?=$this->request->query['beds']?>") { selected='selected="selected"';} else {selected='';} <? } ?>
	$('<option value="'+item+'" '+selected+'>'+beds[item]+'</option>').appendTo('#bed');
	}

for(var item in subtypes){
	<? if(isset($this->request->query['subtype'])) {?>
	if(item==="<?=$this->request->query['subtype']?>") { selected='selected="selected"';} else {selected='';} <? } ?>
	$('<option value="'+item+'" '+selected+'>'+subtypes[item]+'</option>').appendTo('#sub_type_id');
	}

var propertytype={"residential":"Residential","commercial":"Commercial"}
for(var item in propertytype){
	<? if(isset($this->request->query['type'])) {?>
	if(item==="<?=$this->request->query['type']?>") { selected='selected="selected"';} else {selected='';} <? } ?>
	$('<option value="'+item+'" '+selected+'>'+propertytype[item]+'</option>').appendTo('#type_id');
	}
	
$(function() {
   $(".auto_submit_item").change(function() {
     $(".auto_submit_item").submit();
   });
 });


$("#filter-clear").click(function(){
window.location.href="<?=SITE_PATH?>search/";
<?php /*?>$(".builder_select").val(0);
var c=$(".builder_select").val();
var params = $(".builder_select").map(function() { return this.value;}).get().join(",");
var location="<?=SITE_PATH?>propertype_locations/searchByTypeLocation/"; 
$(".pr_con").html("loading please wait......");
$.ajax({url:location+escape(params)+"/"+<?=$ptypeid?>+"/"+<?=$locationid?>,dataType:"html",success:function(result){
$(".pr_con").html(result);
}});<?php */?>
});
</script>
</body>
</html>