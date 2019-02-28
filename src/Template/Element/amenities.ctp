<? if(!empty($allamenities)){ ?>
<section class="ameni_con">
<div class="container">
<div class="row"><div class="col-md-12"><div class="ameni_heading"><h3><?=$title;?>- Updated Amenities</h3> <span>Get the International range of modern amenities at a single spot for mega entertainment</span></div></div></div>
<div class="row justify-content-md-center">
<? foreach($allamenities as $am) { ?>
<div class="col-lg-2 col-md-3 col-sm-4 col-6 px-sm-2"><div class="ameni_inner"><i class="amen_icon <? echo $am['class']; ?>"></i><span><? echo $am['name']; ?></span></div></div>
<? } ?>
</div>
</div>
</section>
<? } ?>