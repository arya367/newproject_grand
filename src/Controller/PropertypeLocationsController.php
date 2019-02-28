<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;

/**
 * PropertypeLocations Controller
 *
 * @property \App\Model\Table\PropertypeLocationsTable $PropertypeLocations
 */
class PropertypeLocationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {    
	//$this->loadComponent('Pagination');
	//$this->loadModel('Properties');
	//$propertypeLocations = TableRegistry::get('PropertypeLocations');
	//$properties = TableRegistry::get('Properties');
	$connection = ConnectionManager::get('default');
	
	
	if(isset($this->request->query['page']) and !filter_var($this->request->query['page'], FILTER_VALIDATE_INT) || $this->request->query['page']==1){ echo SITE_PATH.'property/'.$this->request->params['pass'][0]."/";
	return $this->redirect(SITE_PATH.'property/'.$this->request->params['pass'][0]."/");  exit;}
			else if(isset($this->request->query['page'])){ $page = $this->request->query['page']; }
			else{ $page = 1; }
	        $cur_page = $page;
			$page -= 1;
			$per_page = 6;
			$start = $page * $per_page;
			
			if(isset($this->request->params['pass'][1])){ $this->redirect(SITE_PATH.'property/'.$this->request->params['pass'][0]."/"); }
			
			
			if(isset($this->request->params['pass'][0])) { $param=$this->request->params['pass'][0];} else { $param='';}
			
			
			/*$location = $propertypeLocations->find()->select(['PropertypeLocations.name','PropertypeLocations.url','PropertypeLocations.location_id','PropertypeLocations.property_type_id','PropertypeLocations.seo_title','PropertypeLocations.seo_keyword','PropertypeLocations.seo_description','Locations.name','Locations.url','Locations.photo'])->join(['table' => 'locations','alias' => 'Locations','type' => 'LEFT','conditions' => 'PropertypeLocations.location_id=Locations.id'])->where(['PropertypeLocations.url'=>$param])->hydrate(false);*/
			
			$location = $connection->execute("select PropertypeLocations.name,PropertypeLocations.heading2,PropertypeLocations.description,PropertypeLocations.url,PropertypeLocations.location_id,PropertypeLocations.property_type_id,PropertypeLocations.seo_title,PropertypeLocations.seo_keyword,PropertypeLocations.seo_description,Locations.name as locname,Locations.url as locurl,Locations.photo from propertype_locations as PropertypeLocations join locations as Locations on PropertypeLocations.location_id=Locations.id where PropertypeLocations.url=:url and PropertypeLocations.status=:status",['url'=>$param,'status'=>'active'])->fetchAll('assoc');
			
			
			
			if (count($location)===0) { throw new NotFoundException('Page not found on the server'); exit; }	
			
			
			$locationid=$location[0]['location_id']; 
			$ptypeid=$location[0]['property_type_id'];
			
			//$count = $properties->find()->select('id')->where(['location_id'=> $locationid,'property_type_id' => $ptypeid]);
			
			$count = $connection->execute("select count(*) as total from properties where status='active' and  location_id= :location_id and property_type_id= :property_type_id ",['location_id' => $locationid,'property_type_id' => $ptypeid])->fetchAll('assoc');
			
			
			$results = $connection->execute("select pro.name,pro.url,pro.heading3,pro.small_description,pro.area,pro.property_image,pro.property_image_alt_tag,pro.price,pro.small_info,pro.property_subtype_id,pro.availability,pro.location_text,sec.url as sectorurl,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl  from properties as pro left join property_types as ptype on pro.property_type_id=ptype.id  left join builders as build  on pro.builder_id=build.id left join locations as locat on pro.location_id=locat.id left join sectors as sec on pro.sector_id=sec.id where pro.status='active' and  pro.location_id= :location_id and pro.property_type_id= :property_type_id order by pro.ptypewise asc  limit $start,$per_page",['location_id' => $locationid,'property_type_id' => $ptypeid])->fetchAll('assoc');
			
			
			
			
			if(!isset($this->request->query['page'])){
			$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
			$this->set('canonical', SITE_PATH.'property/'.$this->request->params['pass'][0]."/");
			}
			else{
			$this->set('robots','<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">');
			$this->set('canonical', SITE_PATH.'property/'.$this->request->params['pass'][0].'/?page='.$this->request->query['page']);
			}
			
			$this->set('title', $location[0]['name']);
			$this->set('seo_title', $location[0]['seo_title']);
			$this->set('seo_description', $location[0]['seo_description']);
			$this->set('seo_keyword', $location[0]['seo_keyword']);
			
			
			$this->set('content', $location);
			$this->set('results', $results);
			
			$this->set('total',$count[0]['total']);
			$this->set('currentpage',$cur_page);
			$this->set('table','property');
			$this->set('paginglink',$this->request->params['pass'][0]);
			$this->set('ptypeid', $ptypeid);
			$this->set('locationid', $locationid);
			
			$this->layout='location'; 
    }
	
	
	public function searchByTypeLocation($search=null,$search2=null,$search3=null,$pages=null) {
	     if ($this->request->is('ajax') and isset($search)) {
			 
			 $connection = ConnectionManager::get('default');
	
	       if($pages)
			{
			$pg = $pages;
			$page = $pages; 
			}
			else
			{
			$pg = 1;
			$page = 1;
			}
	        $cur_page = $page;
			$page -= 1;
			$per_page = 6;
			$start = $page * $per_page;
	

	list($min,$max,$bid,$spid,$bhk)=@explode(',',$search);
	$sql="select properties.name,properties.heading3,properties.location_text,properties.availability,properties.url,properties.small_description,properties.price,properties.area,properties.property_image,properties.property_image_alt_tag,properties.small_info,properties.property_subtype_id,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl,sec.url as sectorurl ";
	if($min!=0 || $max!=0){$sql.=" , pricem.price ";}
	$sql.=" from properties as properties join locations as locat on properties.location_id=locat.id join sectors as sec on properties.sector_id=sec.id join property_types as ptype on properties.property_type_id=ptype.id  join builders as build  on properties.builder_id=build.id     ";
	
	
	if($min!=0 || $max!=0){$sql.=" join price_management as pricem on properties.id=pricem.property_id ";}
	 
	  $sql.="where  1 ";
	  
	  
	//
	
	if($bid){ $sql.=" and  properties.builder_id='".$bid."'";}
	if($spid){ $sql.=" and  properties.property_subtype_id like '%\"".$spid."\"%'";}
	if($bhk) { $sql.=" and  properties.bhk like '%\"".$bhk."\"%' ";}
	if($min!=0 || $max!=0){ 
	if($min!=0 and $max!=0){$sql.=" and ( pricem.price >".$min." and  pricem.price <=".$max.")";}
	else if($min==0 and $max!=0){$sql.=" and   pricem.price <=".$max."";}
	else if($min!=0 and $max==0){$sql.=" and   pricem.price >=".$min."";}
	else{}
	}
	
	$sql.=" and properties.property_type_id='".$search2."' and properties.location_id='".$search3."'  and properties.status='active'";
	
	if($min!=0 || $max!=0){$sql.=" group by pricem.property_id";}
	$sql.="  order by properties.ptypewise asc  ";
	$count=count($connection->execute($sql)->fetchAll('assoc')); 
	$data= $connection->execute($sql." limit $start,$per_page")->fetchAll('assoc');
	$this->set('currentpage',$cur_page);
	$this->set('total',$count);
	$this->set('ptypeid',$search2);
	$this->set('locationid',$search3);
	$this->set('results',$data);
	if($per_page*$pg >=$count) { $last=$count;} else { $last=$per_page*$pg;}
	$this->set('status',$start+1 ." to ". $last." out of ".$count);
	}
	//else {throw new NotFoundException(__('Invalid Property'));}
	$this->layout='ajax';
	}
	
	


}
