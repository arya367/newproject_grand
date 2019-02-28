<? use Cake\Datasource\ConnectionManager; $connection = ConnectionManager::get('default'); ?>
<div class="col-md-8 order-md-1">
<div class="pr_config prject_heading"><h2><? echo $projects[0]['name'] ; ?> - Gallery</h2></div>
<? $count=0; $gallery=$connection->execute("select gall.* from property_galleries as gall where  gall.property_id=:pid and type=:type",['pid'=>$projects[0]['id'],'type'=>$this->request->params['pass'][1]])->fetchAll('assoc');?>
<div class="floor_con">
<div class="row">
<? if(!empty($gallery)) { foreach($gallery as $gall) {?>
<figure class="col-md-6 col-sm-6 thumb_list"><a href="<?=SITE_PATH?>img/property/gallery/orig/<?=$gall['image']?>" data-fancybox="gallery"><img src="<?=SITE_PATH?>img/property/gallery/orig/<?=$gall['image']?>" alt="<? echo $projects[0]['name']; ?>" class="img-fluid"></a></figure>
<? $count++;} }  ?>
</div>
</div>
</div>
</div>
</div></div>
</section>