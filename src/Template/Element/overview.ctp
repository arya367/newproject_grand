<div class="col-md-8 order-md-1">
<div class="pr_config prject_heading"><div class="h3">Configuration of <?=$title?></div></div>
<? if($projects[0]['offer_payment_plan']=='N/A') {  } else {?>
<>
<div class="row"><div class="col-md-12"><div class="offer_con"><span>Offers</span> <i><?php echo $projects[0]['offer_payment_plan']; ?> </i><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalLong">Know More</a></div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content offer_bg">
<div class="modal-header offer_header"></div>
<div class="offers_rbn"></div>
<div class="modal-body offer-body">
<div class="special_text">Special Offers</div>
<div class="offer_border"><?php echo $projects[0]['offer_payment_plan']; ?></div>
</div>
</div>
</div>
</div>
</div> </div>
<? }?>
<?php  echo $this->element('projects-details'); ?>

</div>
</div>
</div></div>
</section>
<section class="overview">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="description">
<div class="prject_heading"><h2><?php echo stripslashes($projects[0]['overview_heading']);?></h2></div>
<?php echo stripslashes($projects[0]['overview']);?>
</div>
</div>
</div>
</div>
</section>