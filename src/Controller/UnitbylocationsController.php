<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;

/**
 * Units Controller
 *
 * @property \App\Model\Table\UnitsTable $Units
 */
class UnitbylocationsController extends AppController
{

    
    public function view(){
		   
	
	   $connection = ConnectionManager::get('default');
	   
	     
		 if(isset($this->request->params['pass'][0])){$location=$this->request->params['pass'][0];}
		 if(isset($this->request->params['pass'][1])){$url=$this->request->params['pass'][1];}
		 else { throw new NotFoundException(__('Page not found on the server')); }
		
         $mainurl=rtrim($this->request->url,"/"); 
			if(isset($this->request->query['page']) and !filter_var($this->request->query['page'], FILTER_VALIDATE_INT) || $this->request->query['page']==1){
			return $this->redirect(SITE_PATH.'unit/'.$location.'/'.$url.'/'); exit; }
			
			
			
			else if(isset($this->request->query['page']))
			{
			$page = $this->request->query['page']; 
			}
			else
			{
			$page = 1;
			}
	        $cur_page = $page;
			$page -= 1;
			$per_page = 6;
			$start = $page * $per_page;
			$pagedata = $connection->execute("SELECT unit.* FROM unitbylocations as unit join locations as  loc on unit.location_id=loc.id where loc.name=:name and unit.url=:url and unit.status=:status",['name'=>$location,'url'=>$url,'status'=>'active'])->fetchAll('assoc');
			
			if(empty($pagedata)) {throw new NotFoundException(__('Page not found on the server'));}
			
			
$count = $connection->execute("select count(*) as total from properties where status=:status and location_id=:location_id and bhk like '%\"".$pagedata[0]['unit_id']."\"%'",['status'=>'active','location_id'=>$pagedata[0]['location_id']])->fetchAll('assoc');
			
			$property = $connection->execute("select pro.name,pro.heading3,pro.url,pro.small_description,pro.area,pro.property_image,pro.property_image_alt_tag,pro.price,pro.small_info,pro.property_subtype_id,pro.availability,pro.location_text,sec.url as sectorurl,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl from properties as pro left join property_types as ptype on pro.property_type_id=ptype.id  left join builders as build  on pro.builder_id=build.id left join locations as locat on pro.location_id=locat.id left join sectors as sec on pro.sector_id=sec.id where pro.status=:status and pro.location_id=:location_id and pro.bhk like '%\"".$pagedata[0]['unit_id']."\"%' order by pro.builderwise_priority asc  limit $start,$per_page",['status'=>'active','location_id'=>$pagedata[0]['location_id']])->fetchAll('assoc');
			
			
			
			
			
	        $this->set('title', $pagedata[0]['heading1']);
			$this->set('heading2', $pagedata[0]['heading2']);
			$this->set('description', $pagedata[0]['description']);
			$this->set('seo_title', $pagedata[0]['seo_title']);
			$this->set('seo_description', $pagedata[0]['seo_description']);
			$this->set('seo_keyword', $pagedata[0]['seo_keyword']);
			$this->set('locid', $pagedata[0]['location_id']);
			$this->set('secid', $pagedata[0]['unit_id']);
			$this->set('table','unit/'.$location.'/'.$url);
			$this->set('total',$count[0]['total']);
			$this->set('currentpage',$cur_page);
			$this->set('paginglink','null');
			$this->set('results', $property);
			$this->set('content', $pagedata);

			
			if(!isset($this->request->query['page'])){
			$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
			$this->set('canonical', SITE_PATH.'unit/'.$location.'/'.$url.'/');
			}
			else{
			$this->set('robots','<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">');
			$this->set('canonical',SITE_PATH.'unit/'.$location.'/'.$url.'/?page='.$this->request->query['page']);
			}
		
		    $this->layout='unit-by-location';
		
		}
		
		
	public function searchProp($search=null,$pages=null) {
		
			
			
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
	

	list($min,$max,$bid,$spid,$locid,$unitid)=@explode(',',$search);
	$sql="select properties.name,properties.heading3,properties.location_text,properties.availability,properties.url,properties.small_description,properties.price,properties.area,properties.property_image,properties.small_info,properties.property_subtype_id,properties.property_image_alt_tag,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl,sec.url as sectorurl ";
	if($min!=0 || $max!=0){$sql.=" , pricem.price ";}
	$sql.=" from properties as properties join locations as locat on properties.location_id=locat.id join sectors as sec on properties.sector_id=sec.id join property_types as ptype on properties.property_type_id=ptype.id  join builders as build  on properties.builder_id=build.id     ";
	
	
	if($min!=0 || $max!=0){$sql.=" join price_management as pricem on properties.id=pricem.property_id ";}
	 
	  $sql.="where  1 ";
	  
	  
	//
	
	if($locid!=0 and $locid!=''){ $sql.=" and  properties.location_id='".$locid."'";}
	if($unitid) { $sql.=" and  properties.bhk like '%\"".$unitid."\"%' ";}
	if($bid!=0 and $bid!=''){ $sql.=" and  properties.builder_id='".$bid."'";}
	if($spid!=0 and $spid!=''){ $sql.=" and  properties.property_subtype_id like '%\"".$spid."\"%'";}
	if($min!=0 || $max!=0){ 
	if($min!=0 and $max!=0){$sql.=" and ( pricem.price >".$min." and  pricem.price <=".$max.")";}
	else if($min==0 and $max!=0){$sql.=" and   pricem.price <=".$max."";}
	else if($min!=0 and $max==0){$sql.=" and   pricem.price >=".$min."";}
	else{}
	}
	
	$sql.="  and properties.status='active'";
	
	if($min!=0 || $max!=0){$sql.=" group by pricem.property_id";}
	//echo $sql;
	$sql.="  order by properties.builderwise_priority asc  ";
	$count=count($connection->execute($sql)->fetchAll('assoc')); 
	$data= $connection->execute($sql." limit $start,$per_page")->fetchAll('assoc');
	$this->set('currentpage',$cur_page);
	$this->set('total',$count);
	$this->set('results',$data);
	$this->set('locid', $locid);
	$this->set('unitid', $unitid);
	if($per_page*$pg >=$count) { $last=$count;} else { $last=$per_page*$pg;}
	$this->set('status',$start+1 ." to ". $last." out of ".$count);
	}
	//else {throw new NotFoundException(__('Invalid Property'));}
	$this->layout='ajax';
	}

    
}
