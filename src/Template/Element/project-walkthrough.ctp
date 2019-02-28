<div class="container">
<div class="white_bg">
<div class="row">
<div class="col-lg-9 col-sm-8">
<!--<COMMON>-->
<div class="col-lg-12">
<h2><? print_r($projects[0]['gallery_heading']);?></h2>
<div class="locality">
<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" name="cbox1360839005618" src="<? print_r($projects[0]['youtube_url']);?>"></iframe></div>
</div>
</div>
<!--<COMMON>-->
</div>
<?php  echo $this->element('common-form'); ?>
</div>
</div>
</div>
<?php  echo $this->element('footer'); ?>
