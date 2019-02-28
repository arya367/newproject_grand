<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;

/**
 * Builders Controller
 *
 * @property \App\Model\Table\BuildersTable $Builders
 */
class BuildersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {   
	
	   $connection = ConnectionManager::get('default');
       $mainurl=rtrim($this->request->url,"/"); 
			if(isset($this->request->query['page']) and !filter_var($this->request->query['page'], FILTER_VALIDATE_INT) || $this->request->query['page']==1){
			return $this->redirect(SITE_PATH.'builder/'); exit; }
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
			$count = $connection->execute("select count(*) as total from builders where status='active'")->fetchAll('assoc');
			if($count[0]['total']==0) {throw new NotFoundException(__('Page not found on the server'));}
			// throw new NotFoundException('Page not found on the server'); exit;
			
			$builder=$connection->execute("select * from builders where status='active' order by navid asc  limit $start,$per_page")->fetchAll('assoc');
			$pagedata=$connection->execute("select * from pages where url_display='builder'")->fetchAll('assoc');
			
			
			
	        $this->set('title', $pagedata[0]['title']);
			$this->set('description', $pagedata[0]['description']);
			$this->set('seo_title', $pagedata[0]['meta_title']);
			$this->set('seo_description', $pagedata[0]['meta_description']);
			$this->set('seo_keyword', $pagedata[0]['meta_keyword']);
			$this->set('result', $builder);
			$this->set('table','builder');
			$this->set('total',$count[0]['total']);
			$this->set('currentpage',$cur_page);
			$this->set('paginglink','null');

			
			if(!isset($this->request->query['page'])){
			$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
			$this->set('canonical', SITE_PATH.'builder/');
			}
			else{
			$this->set('robots','<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">');
			$this->set('canonical',SITE_PATH.'builder/?page='.$this->request->query['page']);
			}
	        //debug($this->Builder);
            $this->layout='builder';
    }

    /**
     * View method
     *
     * @param string|null $id Builder id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    { 
            $connection = ConnectionManager::get('default');
            if(isset($this->request->query['page']) and !filter_var($this->request->query['page'], FILTER_VALIDATE_INT) || $this->request->query['page']==1){ 
			return $this->redirect(SITE_PATH.'builder/'.$this->request->params['pass'][0]."/"); exit; }
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
			$param=$this->request->params['pass'][0];
			
			if(isset($this->request->params['pass'][1])){ $this->redirect(SITE_PATH.'builder/'.$this->request->params['pass'][0]."/"); }
			
			$builder = $connection->execute("select * from builders where status=:status and url=:url",['status'=>'active','url'=>$param])->fetchAll('assoc');
			$count=count($builder);
			if($count==0) {throw new NotFoundException(__('Page not found on the server'));}
		
			
			
			$builderid=$builder[0]['id'];
			$total = $connection->execute("select count(*) as total from properties where builder_id=:builder_id",['builder_id'=>$builderid])->fetchAll('assoc');
			$property = $connection->execute("select pro.name,pro.url,pro.heading3,pro.small_description,pro.area,pro.property_image,pro.property_image_alt_tag,pro.price,pro.small_info,pro.property_subtype_id,pro.availability,pro.location_text,sec.url as sectorurl,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl from properties as pro join property_types as ptype on pro.property_type_id=ptype.id  left join builders as build  on pro.builder_id=build.id left join locations as locat on pro.location_id=locat.id left join sectors as sec on pro.sector_id=sec.id where pro.status=:status and  pro.builder_id=:builder_id order by pro.builderwise_priority asc  limit $start,$per_page",['status'=>'active','builder_id'=>$builderid])->fetchAll('assoc');
			
			$this->set('content', $builder);
			if(!isset($this->request->query['page'])){
			$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
			$this->set('canonical', SITE_PATH.'builder/'.$this->request->params['pass'][0].'/');
			}
			else{
			$this->set('robots','<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">');
			$this->set('canonical',SITE_PATH.'builder/'.$this->request->params['pass'][0].'/?page='.$this->request->query['page']);
			}
			
			
			
			$this->set('title', $builder[0]['heading']);
			$this->set('seo_title', $builder[0]['seo_title']);
			$this->set('seo_description', $builder[0]['seo_description']);
			$this->set('seo_keyword', $builder[0]['seo_keyword']);
			$this->set('results', $property);
			$this->set('table','builder');
			$this->set('total',$total[0]['total']);
			$this->set('currentpage',$cur_page);
			$this->set('paginglink',$param);
			$this->set('builderid',$builderid);
			
			$this->layout='builder-list';
		
		
		
	
	}
	
	
	
	public function searchByBuilder($search=null,$search2=null,$pages=null) {
	
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
		    //$arr=array('0'=>'1','1'=>'2','2'=>'3','3'=>'4','4'=>'5');	
	        //echo serialize($arr);
	list($min,$max,$lid,$pid,$spid,$bhk)=@explode(',',$search);
	$sql="select properties.name,properties.heading3,properties.location_text,properties.availability,properties.url,properties.small_description,properties.price,properties.area,properties.property_image,properties.property_image_alt_tag,properties.small_info,properties.property_subtype_id,locat.name as locatname,locat.url as locaturl,ptype.name as ptypename,build.name as buildname,sec.url as sectorurl ";
	
	if($min!=0 || $max!=0){$sql.=" , pricem.price ";}
	
    $sql.=" from properties as properties join locations as locat on properties.location_id=locat.id join property_types as ptype on properties.property_type_id=ptype.id  join builders as build  on properties.builder_id=build.id  join sectors as sec on properties.sector_id=sec.id";
	if($min!=0 || $max!=0){$sql.=" join price_management as pricem on properties.id=pricem.property_id ";}
	 
	 $sql.=" where  1 ";
	
	if($lid){ $sql.=" and  properties.location_id='".$lid."'";}
	if($pid){ $sql.=" and  properties.property_type_id='".$pid."'";}
	if($spid){ $sql.=" and   properties.property_subtype_id like '%\"".$spid."\"%'";}
	if($bhk) { $sql.=" and  properties.bhk like '%\"".$bhk."\"%' ";}
	if($min!=0 || $max!=0){ 
	if($min!=0 and $max!=0){$sql.=" and ( pricem.price >".$min." and  pricem.price <=".$max.")";}
	else if($min==0 and $max!=0){$sql.=" and   pricem.price <=".$max."";}
	else if($min!=0 and $max==0){$sql.=" and   pricem.price >=".$min."";}
	else{}
	}
	$sql.=" and properties.builder_id='".$search2."'  and properties.status='active'  ";
	if($min!=0 || $max!=0){$sql.=" group by pricem.property_id   ";}
	$sql.="  order by properties.builderwise_priority asc  ";
	$count=count($connection->execute($sql)->fetchAll('assoc')); 
	$data= $connection->execute($sql." limit $start,$per_page")->fetchAll('assoc');
	

	$this->set('currentpage',$cur_page);
	$this->set('total',$count);
	$this->set('builderid',$search2);
	
	$this->set('results',$data);
    if($per_page*$pg >=$count) { $last=$count;} else { $last=$per_page*$pg;}
	$this->set('status',$start+1 ." to ". $last." out of ".$count);
	}
	//else {throw new NotFoundException(__('Invalid Property'));}
	$this->layout='ajax';
	}
}
