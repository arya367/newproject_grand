<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Datasource\ConnectionManager;
/**
 * Common cell
 */
class CommonCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function propertySubtypes($id=null)
    {
		$this->loadModel('PropertySubtypes');
		if($id){  
		$propertySubtypes = $this->PropertySubtypes->find()->select(['id', 'name'])->where(['property_type_id'=>$id]);
		}
	    else 
		{
		$propertySubtypes=$this->PropertySubtypes->find()->select(['id', 'name']); 
			} 
	   $this->set('propertySubtypes',$propertySubtypes); 
    }
	
	public function plpdata($id=null)
    {
		$this->loadModel('Properties');
		$actionableplp=$this->Properties->find()->select(['heading3','url'])->where(['Properties.status'=>'active','Properties.plp'=>'Y'])->order(['Properties.plp_priority'=>'asc'])->limit(6);
	   $this->set('actionableplp',$actionableplp); 
    }
	
	public function buybackdata($id=null)
    {
		$this->loadModel('Properties');
		$actionablebuyBack=$this->Properties->find()->select(['heading3','url'])->where(['Properties.status'=>'active','Properties.buyBack'=>'Y'])->order(['Properties.buyBack_priority'=>'asc'])->limit(6);
	   $this->set('actionablebuyBack',$actionablebuyBack); 
    }
	
	public function assureddata($id=null)
    {
		$this->loadModel('Properties');
		$actionableassured=$this->Properties->find()->select(['heading3','url'])->where(['Properties.status'=>'active','Properties.assured_return'=>'Y'])->order(['Properties.assured_return_priority'=>'asc'])->limit(6);
	   $this->set('actionableassured',$actionableassured); 
    }
	
	public function subventiondata($id=null)
    {
		$this->loadModel('Properties');
		 $actionablesubvention=$this->Properties->find()->select(['heading3','url'])->where(['Properties.status'=>'active','Properties.subvention'=>'Y'])->order(['Properties.subvention_priority'=>'asc'])->limit(6);
	   $this->set('actionablesubvention',$actionablesubvention); 
    }
	
	public function monthlyrentaldata($id=null)
    {
		$this->loadModel('Properties');
		$actionablemonthlyRental=$this->Properties->find()->select(['name','url'])->where(['Properties.status'=>'active','Properties.monthlyRental'=>'Y'])->order(['Properties.monthlyRental_priority'=>'asc'])->limit(6);
	   $this->set('actionablemonthlyRental',$actionablemonthlyRental); 
    }
	
	public function latestprojects($id=null)
    {
		$this->loadModel('Properties');
		$latestprojects=$this->Properties->find()->select(['heading3','url','small_info','property_image'])->where(['Properties.status'=>'active'])->order(['Properties.id'=>'desc'])->limit(6);
	   $this->set('latestprojects',$latestprojects); 
    }
	
	public function locationListOnBuilder($search=null) {
	$connection = ConnectionManager::get('default');
	if($search) {	
	$data=$connection->execute("select l.name,l.id from locations as l join properties as p on l.id=p.location_id  where p.builder_id=".$search." group by p.location_id order by l.navid")->fetchAll('assoc');
	}
	else {
	$data=$connection->execute("select l.name,l.id from locations as l join properties as p on l.id=p.location_id  where 1  group by p.location_id order by l.navid")->fetchAll('assoc');	
	}
	
	 $this->set('data',$data); 
	}
	
	public function builderList() {
		
		$this->loadModel('Builders');
		$bilderslist=$this->Builders->find()->select(['name','id'])->where(['Builders.status'=>'active'])->order(['Builders.navid'=>'asc']);
	    $this->set('bilderslist',$bilderslist); 
	}
	
	public function adminmenu($id=null)
    {   $data='<ul class="sidebar navbar-nav">';
		$connection = ConnectionManager::get('default');
		$header=$connection->execute("select name,action,id from menuheaders  where status='active' order by navid desc")->fetchAll('assoc');
		
	    foreach($header as $key=>$value) {
			
			$menu=$connection->execute("select name,action,controller from menus where status='active' and menuheader_id=".$value["id"]." order by navid desc")->fetchAll('assoc');
			
			if(!empty($menu))  {
				
			$data.='<li class="nav-item active">
			<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$value["name"].' <b class="caret"></b></a>
			 <i class="fas fa-fw fa-folder"></i> <ul class="dropdown-menu">';
			
			foreach($menu as $key2=>$value2) {
				
				
				
				$data.='<a class="dropdown-item" href="'.SITE_PATH.'admin/'.$value2["controller"].'/'.$value2["action"].'/">'.$value2["name"].'</a>';
				
			}
			$data.='</ul>';	
			}
			else {
			
			$data.='<li class="nav-item active"><a class="nav-link" href="'.SITE_PATH.'admin/'.$value["action"].'/index/'.'">'.$value["name"].'</a>';
			
			}
			$data.='</li>';	
		}
		$data.='</ul>';	
		$this->set('data',$data); 
    }
	
	public function homemenu()
    {   $data='';$data2='';
	    //$_SESSION['MENU']='';
		$connection = ConnectionManager::get('default');
		$category=$connection->execute("select name,url,heading3,id from properties")->fetchAll('assoc');
	    if(!empty($category)) { 
		
		foreach($category as $cat)
		{
			$data.='<a class="dropdown-item" href="'.SITE_PATH.'project/'.$cat["url"].'" target="_blank">'.$cat["heading3"].'</a>';	
			}
		
		}
		$_SESSION['LOCATIONBYTYPEMENU']=$data2;
		$this->set('homemenu',$data);
		$this->buildermenu();
		
		
    }
	
	
	public function buildermenu()
    {   $builderdata='';
	    //$_SESSION['MENU']='';
		$connection = ConnectionManager::get('default');
		$builders=$connection->execute("select name,url from builders where  status='active' order by navid asc limit 0,15")->fetchAll('assoc');
	    if(!empty($builders)) { 
		$builderdata.='<ul class="treeview-menu">';
		foreach($builders as $builder)
		{
			$builderdata.='<li><a href="'.SITE_PATH.'builder/'.$builder["url"].'/" title="'.$builder['name'].'">'.$builder['name'].'</a></li>';
			}
		
		$builderdata.='</ul>';
		}
		$_SESSION['BUILDERMENU']=$builderdata;

		
		
    }
	
	  public function recentPosts() {
	  $actual_link = "$_SERVER[REQUEST_URI]";
	  $moreurl= explode('/',$actual_link);
	  $current_url=$moreurl[4];
	  $connection = ConnectionManager::get('default');
	  $result_url=$connection->execute("select id from blogs where url='$current_url' and status='active'")->fetchAll('assoc');
	  $this->set('result_url',$result_url);
	  foreach($result_url as $cu_data){
	  $cu_url=$cu_data['id'];
	  //echo $cu_url;
	  
	  $result=$connection->execute("select name,url from blogs where status='active' order by id desc limit 0,5 ")->fetchAll('assoc');
	  $this->set('result',$result); 
	  }
	  }
	  public function sitemapdata($id=null)
      {   $data='';$data2='';
	  
		$connection = ConnectionManager::get('default');
		$category=$connection->execute("select name,url,id from property_types where  status='active' order by priority asc")->fetchAll('assoc');
	    if(!empty($category)) { 
		
		foreach($category as $cat)
		{
			$data.='<div class="col-md-3"><div class="sitemap_list"><div class="site_head1">'.$cat["name"].'</div>';
			$menulist=$connection->execute("select pl.location_id,pl.url,loct.name as locname,loct.url as locurl,loct.id as locid from propertype_locations as pl join locations as loct on loct.id=pl.location_id  where pl.property_type_id=".$cat["id"]." and  pl.status='active' group by  loct.id  order by loct.navid asc")->fetchAll('assoc');
			
			if(!empty($menulist)) { 
			
			$data.='<ul>';
			foreach($menulist as $menu)
			{
				$data.='<li><a href="'.SITE_PATH.'property/'.$menu["url"].'/" title="'.$menu['locname'].'">'.$menu['locname'].'</a></li>';
				}
			$data.='</ul>';
			}
			$data.='</div></div>';
			}
		
		
		}
		$this->set('data',$data);
    }
	
	public function recommendedprojects($id=null)
    {
		$this->loadModel('Properties');
		$recommendedprojects=$this->Properties->find()->select(['heading3','url'])->where(['Properties.status'=>'active','Properties.recommended'=>'Y'])->order(['Properties.id'=>'desc'])->limit(6);
	   $this->set('recommendedprojects',$recommendedprojects); 
    }
	
	public function realtedList($locid,$pid,$ptype,$sublocid) {
		$connection = ConnectionManager::get('default');
		$mimimumrange = ($this->priceRange($pid,'min')-1000000);
		$maximunrange = ($this->priceRange($pid,'max')+1000000);
		//echo $mimimumrange;
		//echo " is minimun<br>astha<br/> Maximum is ";
		//echo $maximunrange;
		//echo "<br/>";
		//echo "select relatedpro.name,relatedpro.heading3,relatedpro.location_text,relatedpro.url,relatedpro.property_image,relatedpro.price,relatedpro.location_id,relatedpro.sector_id,loc.name as locname,sector.name as sectorname,build.name as buildname  from properties as relatedpro join locations as loc on relatedpro.location_id=loc.id join sectors as sector on relatedpro.sector_id=sector.id and relatedpro.location_id=sector.location_id join builders as build on relatedpro.builder_id=build.id   where relatedpro.status='active' and relatedpro.location_id='$locid' and relatedpro.id!='$pid' and relatedpro.property_type_id='$ptype' and relatedpro.propertype_sublocation_id='$sublocid' and relatedpro.id in (SELECT DISTINCT`property_id` FROM `price_management` WHERE `price`BETWEEN $mimimumrange AND $maximunrange) order by rand() limit 3";
		
		$result=$connection->execute("select relatedpro.name,relatedpro.heading3,relatedpro.location_text,relatedpro.url,relatedpro.property_image,relatedpro.price,relatedpro.location_id,relatedpro.sector_id,loc.name as locname,sector.name as sectorname,build.name as buildname  from properties as relatedpro join locations as loc on relatedpro.location_id=loc.id join sectors as sector on relatedpro.sector_id=sector.id and relatedpro.location_id=sector.location_id join builders as build on relatedpro.builder_id=build.id   where relatedpro.status='active' and relatedpro.location_id='$locid' and relatedpro.id!='$pid' and relatedpro.property_type_id='$ptype' and relatedpro.propertype_sublocation_id='$sublocid' and relatedpro.id in (SELECT DISTINCT`property_id` FROM `price_management` WHERE `price`BETWEEN $mimimumrange AND $maximunrange) order by rand() limit 3")->fetchAll('assoc');
		
	$this->set('result',$result);
	}
	
	public function priceRange ($pid,$minormax)
	{
		$connection = ConnectionManager::get('default');
		$priceRanges=$connection->execute("select $minormax(pricerange.price) as pprice from price_management as pricerange where pricerange.property_id='$pid' limit 1")->fetch('assoc');
		if(!empty($priceRanges))
		{ 
		foreach($priceRanges as $priceRange)
			{
				return $ppp=$priceRanges["pprice"];
			}
		}
	}

}
