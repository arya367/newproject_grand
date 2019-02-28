<?  use Cake\Datasource\ConnectionManager; $connection = ConnectionManager::get('default');  if(!empty($result)) { foreach($result as $key=>$builders) { ?><div class="col-lg-6 col-md-6 col-sm-6"><div class="builder_list">
<div class="build_bg"><div class="build_logo"><img src="<?=SITE_PATH?>img/builder/orig/<?=$builders['photo'];?>" alt="<?=$builders['name'];?>" class="img-responsive"></div></div>
<div class="buider_inner">
<h3><a href="<?=SITE_PATH.'builder/'.$builders['url'];?>/"> <? echo $builders['name'];?> </a></h3>
<p><? echo $builders['short_description'];?><a href="<?=SITE_PATH.'builder/'.$builders['url'];?>/"><i class="fa fa-external-link"></i></a></p>

<? $prolist = $connection->execute("select pro.heading3,pro.url,pro.location_text,pro.price,loc.name as locname from properties as pro join locations as loc on pro.location_id=loc.id  where pro.status='active' and pro.recommended='Y' and pro.builder_id=:id  order by pro.builderwise_priority asc limit 0,3",['id'=>$builders['id']])->fetchAll('assoc'); 
if(!empty($prolist)) { ?>
<h3>Latest Project of <? echo $builders['name'];?></h3>
<? foreach($prolist as $key=>$list) {
?>
<div class="lt_bg">
<div class="lt_heading"><h4><a href="<?=SITE_PATH.'project/'.$list['url'];?>/"><? echo $list['heading3']; ?></a></h4></div>
<div class="lt_location"><i class="fa fa-map-marker"></i> <? echo $list['location_text']; ?> <span><? echo $list['locname'];?></span></div>
<div class="price"><i class="fa fa-rupee"></i> <? echo $list['price']; ?></div>
</div>
<? } } ?>
</div>
</div></div>
<? }  ?>
<? }  else { echo '<div class="message warning" id="flashMessage">DATA NOT FOUND.PLEASE CHANGE SEARCH CRITERIA.</div>'; } ?>