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
<div class="col-lg-12">
<ol itemprop="breadcrumb" class="breadcrumb"><li><a href="<?=SITE_PATH?>" itemprop="url" class="brd_icon">Home</a></li><li><? print_r($content[0]['locname']);?></li><li><? print_r($content[0]['name']);?></li></ol></div></div>
<div class="row"><div class="col-lg-12 list_content"><h1><?=$content[0]['name']?></h1><?=$content[0]['description']; ?></div></div>
<div class="row marginT10 marginB20">
<div class="col-lg-12">
<div class="col-lg-3 col-md-3 col-sm-3 border_t">
<div class="rfn_con">
<div class="rfn_heading">Refine Result</div>
<div class="form-group"><label>Budget:</label>
<div class="input-group"><select class="form-control builder_select" id='budget-min' name="budget-min"><option value="0">Min</option></select><span class="input-group-addon">to</span><select class="form-control builder_select" id='budget-max' name="budget-max"><option value="0">Max</option></select></div></div>
<div class="form-group"><label>Builder:</label>
<select class="form-control builder_select"  id="builders" name="builders"><option value="0">Select Builder</option></select></div>
<?=$dataofsubtype=$this->cell('Common::builderList');  ?>
<div class="form-group"><label>Property Sub Type:</label>
<select class="form-control builder_select" id='sub_property_id'  name="sub_property_id"><option value="0">Select Sub Type</option></select></div>
<?=$dataofsubtype=$this->cell('Common::propertySubtypes',[$ptypeid]);  ?>
<? if($ptypeid!=2) { ?><div class="form-group"><label>Bed:</label>
<select class="form-control builder_select" id="beds"   name="beds">
<option value="0">Beds</option></select></div><? } else { echo "<input type='hidden' class='form-control builder_select' value=\"0\">";} ?>
<?php /*?>
<label>Types of Properties:</label>
<div class="checkbox">
<ul>
<li><label><input type="checkbox">Apartments</label></li>
<li><label><input type="checkbox">Independent House</label></li>
<li><label><input type="checkbox">Row House</label></li>
<li><label><input type="checkbox">Plot</label></li>
<li><label><input type="checkbox">Villa</label></li>
<li><label><input type="checkbox">Builder Floor</label></li>
<li><label><input type="checkbox">Farm House</label></li>
<li><label><input type="checkbox">Penthouse</label></li>
</ul>
</div><?php */?>
<div class="form-group"><input type="button" id='filter-clear' value="Reset" class="btn btn-danger"></div>
</div>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 border_l border_t">
<?php /*?><div class="row">
<div class="col-lg-12">
<div class="sort_con">
<ul><div class="sort_txt">Sort by:</div><li class="active"><a href="">HCO Recomended</a></li><li><a href="">Newest</a></li><li><a href="">All Project</a></li></ul>
</div>
</div>
</div><?php */?>
<div class="row"><div class="heading2"><h2><?=$content[0]['heading2']?></h2></div><div class="border_t"></div></div>
<div class="pr_con">
 <?= $this->fetch('content') ?></div></div></div></div></div></div>
<?php  echo $this->element('footer'); ?>
<script type="text/javascript">
$(".builder_select").change(function(){
var c=$(this).val();
var minnew=parseInt($("#budget-min").val());
var maxnew=parseInt($("#budget-max").val());
var location="<?=SITE_PATH?>propertype_locations/searchByTypeLocation/";
var params = $(".builder_select").map(function() { return this.value;}).get().join(",");
if(maxnew!=0 && maxnew<=minnew){ alert("MAXIMUM PRICE SHOULD BE GREATER THEN MINIMUM"); return false ;} 
$(".pr_con").html("loading please wait......");
$.ajax({url:location+escape(params)+"/"+<?=$ptypeid?>+"/"+<?=$locationid?>,dataType:"html",success:function(result){
$(".pr_con").html(result);
}});
});

$("#filter-clear").click(function(){
location.reload();
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