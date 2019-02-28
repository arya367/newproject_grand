<? use Cake\Datasource\ConnectionManager; $connection = ConnectionManager::get('default'); ?>
<div class="col-md-8 order-md-1">
<div class="pr_config prject_heading"><h2><?=$title;?>- Floor Plan</h2></div>
<div class="floor_con">
<div class="row">

<? $count=0;
$floorCategory=$connection->execute("select f.floor_category_id as catid,fn.name as floorcat from floor_plans as f join floor_categories as fn on fn.id=f.floor_category_id where f.property_id=:pid group by f.floor_category_id",['pid'=>$projects[0]['id']])->fetchAll('assoc');
foreach($floorCategory as $key1=>$value1) {

$floorSubCategory1=$connection->execute("select fp.floor_subcategory_id as subcatid from floor_plans as fp where fp.floor_category_id=:catid and property_id=:pid",['catid'=>$value1['catid'],'pid'=>$projects[0]['id']])->fetchAll('assoc');
	//print_r($value1); ?>
	
    <?  if ($floorSubCategory1[0]['subcatid']=='0') { ?>
	<div class="col-md-12"><div class="floor_heading"><?=$value1['floorcat']?></div></div>
    

<?
$floorlist=$connection->execute("select * from floor_plans where  floor_category_id=:catid  and property_id=:pid order by id desc",['catid'=>$value1['catid'],'pid'=>$projects[0]['id']])->fetchAll('assoc'); 
	
foreach($floorlist as $key3=>$value3) {  ?>

<figure class="col-md-6 col-sm-6 thumb_list"><a href="<?=SITE_PATH?>img/property/floor/orig/<?=$value3['photo']?>" data-fancybox="gallery" data-caption="<? echo $projects[0]['name']; ?>"><img src="<?=SITE_PATH?>img/property/floor/thumb/<?=$value3['photo']?>" alt="<? echo $projects[0]['name']; ?>" class="img-fluid">
<figcaption><?=$value3['name']?>
<? if($value3['carpet']!=''){?><div class="area_det"><span>Carpet Area </span>: <?=$value3['carpet']?></div><? }?>
<? if($value3['balcony']!=''){?><div class="area_det"><span>Saleable Area </span>: <?=$value3['balcony']?></div><? }?>
<? if($value3['saleable']!=''){?><div class="area_det"><span>Balcony Area </span>: <?=$value3['saleable']?></div><? }?>
</figcaption>
</a>
</figure>
<? $count++;  }  ?>
    
    <? } else { ?>
    
    
<?	
$floorSubCategory=$connection->execute("select fp.floor_subcategory_id as subcatid,fsc.name as subcatname from floor_plans as fp join floor_subcategories as fsc on fsc.id=fp.floor_subcategory_id  where  fp.floor_category_id=:catid and  property_id=:pid  group by fp.floor_subcategory_id",['catid'=>$value1['catid'],'pid'=>$projects[0]['id']])->fetchAll('assoc');
?>


<div class="col-md-12"><div class="floor_heading"><?=$value1['floorcat']?></div></div>
  <?php     //print_r($value2) ?>

<? foreach($floorSubCategory as $key2=>$value2) {?>

<div class="col-md-12"><div class="floor_heading"><?=$value2['subcatname']?></div></div>
<?
$floorlist=$connection->execute("select * from floor_plans where  floor_category_id=:catid and floor_subcategory_id=:subcatid and property_id=:pid and property_id=:pid order by id asc",['catid'=>$value1['catid'],'pid'=>$projects[0]['id'],'subcatid'=>$value2['subcatid']])->fetchAll('assoc'); 
	
foreach($floorlist as $key3=>$value3) {  ?>

<figure class="col-md-6 col-sm-6 thumb_list"><a href="<?=SITE_PATH?>img/property/floor/orig/<?=$value3['photo']?>" data-fancybox="gallery" data-caption="<? echo $projects[0]['name']; ?>"><img src="<?=SITE_PATH?>img/property/floor/thumb/<?=$value3['photo']?>" alt="<? echo $projects[0]['name']; ?>" class="img-fluid">
<figcaption><?=$value3['name']?>
<? if($value3['carpet']!=''){?><div class="area_det"><span>Carpet Area </span>: <?=$value3['carpet']?></div><? }?>
<? if($value3['balcony']!=''){?><div class="area_det"><span>Saleable Area </span>: <?=$value3['balcony']?></div><? }?>
<? if($value3['saleable']!=''){?><div class="area_det"><span>Balcony Area </span>: <?=$value3['saleable']?></div><? }?>
</figcaption>
</a>
</figure>
<? $count++;  }  ?>

<? } }  } ?>


