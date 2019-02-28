<div class="row config_det">
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon h_proptype"></i> <span>Property Type </span> <label><? echo $projects[0]['ptypename']; ?></label></div></div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon h_location"></i> <span>Location </span> <label><?php echo $projects[0]['sectorname']; ?> , <?php echo $projects[0]['locationname']; ?></label></div></div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon h_sizes"></i> <span>Sizes </span> <label><? echo $projects[0]['area']; ?></label></div></div>
<?php if(!empty($unittypes)){ ?><div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon h_unit"></i> <span>Configuration </span> <label><?php $bhk=''; foreach($unittypes as $key=>$bhkvalue) { $bhk.=$bhkvalue['name'].', '; } echo rtrim($bhk," ,");?></label></div></div><? }?>
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><div class="rating"></div> <span>Rating </span> <label>4.8 Rating</label></div></div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon h_rera"></i> <span>RERA No. </span> <label><?php echo $projects[0]['reraid']; ?></label></div></div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon price"></i> <span>Price </span> <label><? echo $projects[0]['price']; ?></label></div></div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon h_status"></i> <span>Status </span> <label><?php echo $projects[0]['project_status']; ?></label></div></div>
<div class="col-lg-4 col-md-4 col-sm-6 col-6"><div class="icon_config"><i class="h_icon h_completion"></i> <span>Completion </span> <label><?php echo $projects[0]['completion']; ?></label></div></div>
</div>