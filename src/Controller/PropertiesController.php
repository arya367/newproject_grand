<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;
use App\View\Helper;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 */
 
class PropertiesController extends AppController
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
			return $this->redirect(SITE_PATH.'project/'); exit; }
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
			
			$pagedata=$connection->execute("select * from pages where url_display='project' and status='active'")->fetchAll('assoc');
			if(empty($pagedata)) { throw new NotFoundException('Page not found on the server'); exit;}
			//$count = $connection->execute("select count(*) as total from properties where status='active'")->fetchAll('assoc');
			//if($count[0]['total']==0) {throw new NotFoundException(__('Page not found on the server'));}
			// throw new NotFoundException('Page not found on the server'); exit;
			
			$count = $connection->execute("select count(*) as total from properties where status='active'")->fetchAll('assoc');
			
			$property = $connection->execute("select pro.name,pro.reraid ,pro.bhk,pro.url,pro.heading3,pro.small_description,pro.area,pro.property_image,pro.property_image_alt_tag,pro.price,pro.small_info,pro.propertype_sublocation_id,pro.property_subtype_id,pro.availability,pro.location_text,sec.url as sectorurl,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl from properties as pro join property_types as ptype on pro.property_type_id=ptype.id  join builders as build  on pro.builder_id=build.id join locations as locat on pro.location_id=locat.id join sectors as sec on pro.sector_id=sec.id where pro.status=:status order by pro.builderwise_priority asc  limit $start,$per_page",['status'=>'active'])->fetchAll('assoc');
			
			
			$bhkunc=@unserialize($property[0]['bhk']);
	if($bhkunc){ $bhk=implode(",",$bhkunc); $unittypes = $connection->execute('select name from units as bhk  where id in('.$bhk.')')->fetchAll('assoc'); $this->set('unittypes',$unittypes);}
			
	        $this->set('title', $pagedata[0]['title']);
			$this->set('description', $pagedata[0]['description']);
			$this->set('seo_title', $pagedata[0]['meta_title']);
			$this->set('seo_description', $pagedata[0]['meta_description']);
			$this->set('seo_keyword', $pagedata[0]['meta_keyword']);
			$this->set('table','project');
			$this->set('total',$count[0]['total']);
			$this->set('currentpage',$cur_page);
			$this->set('paginglink','null');
			$this->set('results', $property);
			$this->set('content', $pagedata);

			
			if(!isset($this->request->query['page'])){
			$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
			$this->set('canonical', SITE_PATH.'project/');
			}
			else{
			$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
			$this->set('canonical',SITE_PATH.'project/?page='.$this->request->query['page']);
			}
		    $query = $connection->execute("select name,url from properties where status='active' order by id desc limit 5")->fetchAll('assoc');
		    $blog = $connection->execute("select name,url from blogs where status='active' order by id desc limit 5")->fetchAll('assoc');
	        
	        $this->set('query',$query);
	        $this->set('blog',$blog);	
			// print_r($query);
		    $this->layout='project-list';
			
			if ($this->request->is('post')) {
	  
	  $this->loadComponent('Mail');
	  $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	  $phone=trim($this->request->data['phone']);
	  $projectname=trim($this->request->data['pname']);
	  $states="";
	  $this->set('name', $this->request->data['name']);
	  if(strlen(trim($this->request->data['name'])) == 0 ) { $this->Flash->frontError('NAME SHOULD NOT BE LEFT BLANK');}
	  else if(strlen(trim($this->request->data['email'])) == 0 ) { $this->Flash->frontError('EMAIL SHOULD NOT BE LEFT BLANK');}
	  else if(!filter_var(trim($this->request->data['email']), FILTER_VALIDATE_EMAIL)) { $this->Flash->error('EMAIL ID IS NOT VALID');}
	  
	  else if(strlen(trim($this->request->data['country'])) == 0 ) { $this->Flash->error('COUNTRY SHOULD NOT BE LEFT BLANK');}
	  
	  
	  else if(!preg_match($regex,$phone)){ $this->Flash->error('Invalid phone number ');}
	  else if(!filter_var(trim($this->request->data['email']), FILTER_VALIDATE_EMAIL)) { $this->Flash->frontError('EMAIL ID IS NOT VALID');}
	  //else if(trim($this->request->data['country']) == 0 ) { $this->Session->setFlash(__('PLEASE SELECT COUNTRY')); }
	  else if(strlen(trim($this->request->data['comment'])) == 0 ) { $this->Flash->frontError('COMMENT SHOULD NOT BE LEFT BLANK');}
	  
	    else if(strpos($this->request->data['comment'],"https")!==false || strpos($this->request->data['comment'],"www")!==false || strpos($this->request->data['comment'],"/")!==false) { $this->Flash->frontError('PLEASE ENTER A VALID MESSAGE');}
	  
	  else{ 
	  $enqdata=array('name' => $this->request->data['name'],'email' => $this->request->data['email'],'phone' => $this->request->data['phone'],'project' => $projectname,'comment' => $this->request->data['comment'],'posted_date' => date("Y-m-d H:i:s"));
	  $this->Mail->sendMail(addslashes($this->request->data['name']),addslashes($this->request->data['email']),addslashes($this->request->data['phone']),addslashes($this->request->data['comment']),$this->request->data['country'],addslashes($projectname),$states);
	  
	   $this->Mail->sendToRemoteServer("yoonewprojects.com",addslashes($projectname),addslashes($this->request->data['name']),addslashes($this->request->data['phone']),addslashes($this->request->data['email']),$this->request->data['country'],$states,addslashes($this->request->data['comment']));
	   
	   $savedata=$connection->insert('enqueries',$enqdata);
	  
	  if($savedata){
	  //$this->Flash->frontSuccess('!! YOUR MESSAGE HAS BEEN SENT SUCCESSFULLY !!');
	  return $this->redirect(SITE_PATH.'thank-you/');
	  //return $this->redirect($this->referer());
	  /*echo '<script>window.location.href="'.SITE_PATH.'thank-you/"</script>';*/
	 // return $this->redirect(SITE_PATH.'thank-you/');
	  }
	  else
	  {
	  //debug($this->Enquery->invalidFields());
	  //exit;
	  $this->Flash->frontError('!! PLEASE TRY AGAIN !!');
	  return $this->redirect($this->referer());
	  
	  }
	  
	  }
	  }
		
		}

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
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
	

	list($min,$max,$loc,$bid,$spid,$bhk)=@explode(',',$search);
	$sql="select properties.name,properties.heading3,properties.location_text,properties.availability,properties.url,properties.small_description,properties.price,properties.area,properties.property_image,properties.property_image_alt_tag,properties.small_info,properties.property_subtype_id,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl,sec.url as sectorurl ";
	if($min!=0 || $max!=0){$sql.=" , pricem.price ";}
	$sql.=" from properties as properties join locations as locat on properties.location_id=locat.id join sectors as sec on properties.sector_id=sec.id join property_types as ptype on properties.property_type_id=ptype.id  join builders as build  on properties.builder_id=build.id     ";
	
	
	if($min!=0 || $max!=0){$sql.=" join price_management as pricem on properties.id=pricem.property_id ";}
	 
	  $sql.="where  1 ";
	  
	  
	//
	if($loc){ $sql.=" and  properties.location_id='".$loc."'";}
	if($bid){ $sql.=" and  properties.builder_id='".$bid."'";}
	if($spid){ $sql.=" and  properties.property_subtype_id like '%\"".$spid."\"%'";}
	if($bhk) { $sql.=" and  properties.bhk like '%\"".$bhk."\"%' ";}
	if($min!=0 || $max!=0){ 
	if($min!=0 and $max!=0){$sql.=" and ( pricem.price >".$min." and  pricem.price <=".$max.")";}
	else if($min==0 and $max!=0){$sql.=" and   pricem.price <=".$max."";}
	else if($min!=0 and $max==0){$sql.=" and   pricem.price >=".$min."";}
	else{}
	}
	
	$sql.="  and properties.status='active'";
	
	if($min!=0 || $max!=0){$sql.=" group by pricem.property_id";}
	$sql.="  order by properties.builderwise_priority asc  ";
	$count=count($connection->execute($sql)->fetchAll('assoc')); 
	$data= $connection->execute($sql." limit $start,$per_page")->fetchAll('assoc');
	$this->set('currentpage',$cur_page);
	$this->set('total',$count);
	$this->set('results',$data);
	if($per_page*$pg >=$count) { $last=$count;} else { $last=$per_page*$pg;}
	$this->set('status',$start+1 ." to ". $last." out of ".$count);
	}
	//else {throw new NotFoundException(__('Invalid Property'));}
	$this->layout='ajax';
	}
	
	 
    public function view($id = null) { 
	
	 
	  $connection = ConnectionManager::get('default');
	    
        $regex ="";
		
		$param=$this->request->params['pass'][0];
		$count=$connection->execute("select id from properties where url=:url",['url'=>$param])->fetchAll('assoc');
	
		if ($count[0]['id']=='') {throw new NotFoundException(__('404 NOT FOUND'));}
		
		
		
		if(isset($this->request->params['pass'][2])){ return $this->redirect(SITE_PATH.'project/'.$param."/"); }
		
		
		$sql="select prop.id,prop.reraid ,prop.name,prop.heading3,prop.builder_id,prop.location_id,prop.property_type_id,prop.propertype_sublocation_id,prop.property_subtype_id,prop.tabs,prop.seo_title,prop.seo_description,prop.open_graph_status,prop.seo_keyword,prop.bhk,prop.update_date,prop.location_text,prop.price,prop.availability,prop.property_logo,prop.open_graph_tags,prop.overview_heading,prop.overview,prop.area,prop.tower_building,prop.area,prop.site_area,prop.amenities,prop.price,prop.offer_payment_plan,prop.project_status,prop.completion,prop.specification_heading,prop.specification,prop.pricelist_heading,prop.price_list_desc,prop.location_heading,prop.location_detail,prop.location_image,prop.location_alt_tag,prop.keyplan_heading,prop.keyplan_image,prop.keyplan_alt_tag,prop.master_heading,prop.master_image,prop.master_alt_tag,prop.master_image,prop.numbering_heading,prop.numbering_image,prop.numbering_alt_tag,prop.site_heading,prop.site_image,prop.site_alt_tag,prop.gallery_heading,prop.youtube_url,prop.ebrochure_pdf,prop.application_pdf,prop.latitude,prop.longitude,prop.sector_id,prop.specification_title,prop.specification_description,prop.location_title,prop.location_description,prop.pricelist_title,prop.pricelist_description,prop.masterplan_title,prop.masterplan_description,prop.siteplan_title,prop.siteplan_description,prop.floorplan_title,prop.floorplan_description,prop.gallery_title,prop.gallery_description,buildername.name as buildername,buildername.url as builderurl,buildername.id as builderid,sec.url as sectorurl,sec.name as sectorname,locationnamee.name as locationname,locationnamee.url as locationurl,locationnamee.id as locationid,locationnamee.id as locationid,propertytypename.name as ptypename,propertytypename.url as ptypeurl,propertysubtypename.name as psubtypename from properties as prop LEFT join builders as   buildername on prop.builder_id=buildername.id  LEFT join locations as locationnamee on prop.location_id=locationnamee.id  LEFT join property_types as propertytypename on prop.property_type_id=propertytypename.id  LEFT join property_subtypes as propertysubtypename on prop.property_subtype_id=propertysubtypename.id LEFT join sectors as sec on prop.sector_id=sec.id  where prop.url=:url";
		
		 
		
	    $projects=$connection->execute($sql,['url'=>$param])->fetchAll('assoc');
		//print_r($projects);
		//die();
		$banners=$connection->execute("select * from banners where property_id=:propid order by id asc limit 0,1",['propid'=> $projects[0]['id']])->fetchAll('assoc');
		
		
		if(!isset($this->request->params['pass'][1])){
		$this->set('canonical', SITE_PATH.'project/'.$this->request->params['pass'][0].'/');
		$this->set('follow', 'INDEX, FOLLOW');
		
		$amenities=@unserialize($projects[0]['amenities']);
		if($amenities){ $ameniti=implode(",",$amenities); $allamenities = $connection->execute('select name,class from amenities as amenities  where id in('.$ameniti.')')->fetchAll('assoc'); $this->set('allamenities',$allamenities);}
		
		
		$connectivity = $connection->execute('select conn.name,amm.class as ammclass from connectivity as conn join amenities as amm on conn.amenity_id=amm.id   where conn.property_id =:prid',['prid'=>$projects[0]['id']])->fetchAll('assoc'); 
		$this->set('connectivity',$connectivity);
		
		$resales = $connection->execute('select res.bhk_type,res.id,res.size_name,res.type_size,res.booking_rate,res.booking_size_name,res.premium_demand,res.demand_size_name,res.person_name,res.phone,res.email,res.price,res.total_booking_price,res.total_demand_price from resales as res  where res.property_id =:prid and res.status=:status',['prid'=>$projects[0]['id'],'status'=>'active'])->fetchAll('assoc'); 
		$this->set('resales',$resales);
		
		$locationlink=$connection->execute('select url from propertype_locations where location_id=:locid and property_type_id=:ptid',['locid'=>$projects[0]['locationid'],'ptid'=>$projects[0]['property_type_id']])->fetchAll('assoc');
		
		$this->set('locationlink', $locationlink[0]['url']);
		
		if(isset($projects[0]['sector_id'])) {
		$sublocationlink=$connection->execute('select url from sectors where id=:secid and location_id=:locid and status=:stat',['secid'=>$projects[0]['sector_id'],'locid'=>$projects[0]['locationid'],'stat'=>'active'])->fetchAll('assoc');}


if(isset($sublocationlink[0]['url'])) {
	
	$this->set('sublocationlink','<a href="'.SITE_PATH.'location/'.$projects[0]['locationurl'].'/'.$sublocationlink[0]['url'].'/">'.$projects[0]['location_text'].' ('.ucwords($projects[0]['locationname']).') '.'</a>');}
	else {
			
			$this->set('sublocationlink', $projects[0]['location_text'].' ( '.ucwords($projects[0]['locationname']).' ) '); 
			
			}
		}
		else{
		$this->set('canonical', SITE_PATH.'project/'.$this->request->params['pass'][0].'/'.$this->request->params['pass'][1].'/');
		$this->set('follow', 'INDEX, FOLLOW');
		}
		
		$this->set('title', $projects[0]['name']);
		
		if($this->request->params['pass'][1]=="specifications"){
			//echo $this->request->params['pass'][1];
		$this->set('seo_title', $projects[0]['specification_title']);
		$this->set('seo_description', $projects[0]['specification_description']);
			
			}
		else if($this->request->params['pass'][1]=='price-list'){
			//echo $this->request->params['pass'][1];
		$this->set('seo_title', $projects[0]['pricelist_title']);
		$this->set('seo_description', $projects[0]['pricelist_description']);
			
			}
		else if($this->request->params['pass'][1]=='location-map'){
			//echo $this->request->params['pass'][1];
		$this->set('seo_title', $projects[0]['location_title']);
		$this->set('seo_description', $projects[0]['location_description']);
			
			}
		else if($this->request->params['pass'][1]=='master-plan'){
			//echo $this->request->params['pass'][1];
		$this->set('seo_title', $projects[0]['masterplan_title']);
		$this->set('seo_description', $projects[0]['masterplan_description']);
			
			}
	   else if($this->request->params['pass'][1]=='floor-plan'){
			//echo $this->request->params['pass'][1];
		$this->set('seo_title', $projects[0]['floorplan_title']);
		$this->set('seo_description', $projects[0]['floorplan_description']);
			
			}
		else if($this->request->params['pass'][1]=='gallery'){
			//echo $this->request->params['pass'][1];
		$this->set('seo_title', $projects[0]['gallery_title']);
		$this->set('seo_description', $projects[0]['gallery_description']);
			
			}
			else {
		$this->set('seo_title', $projects[0]['seo_title']);
		$this->set('seo_description', $projects[0]['seo_description']);
				} 
		
		$this->set('seo_keyword', $projects[0]['seo_keyword']);
		if($projects[0]['open_graph_status']=='active'){$this->set('open_graph_tags', $projects[0]['open_graph_tags']);}else{$this->set('open_graph_tags','');}
		$this->set('projects', $projects);
		$this->set('url', $param);
		//$property_id=$projects[0]['id'];
		//$builder_id=$projects[0]['builder_id'];
		//$location_id=$projects[0]['location_id'];
		//$property_type_id=$projects[0]['property_type_id'];
		//$property_subtype_id=$projects[0]['property_subtype_id'];
		// prop.id,prop.name,prop.builder_id,prop.location_id,prop.property_type_id,prop.property_subtype_id,prop.tabs,prop.seo_title,prop.seo_description,prop.open_graph_status,prop.bhk
		
		$unserilize=@unserialize($projects[0]['tabs']);
		$tabsid=@implode(",",$unserilize);
        $singleTabName=0;
	if(!empty($tabsid)){$alltabs=$connection->execute("select tab.name,tab.id,tab.url,tab.catid from property_tabs as tab where tab.id in($tabsid)  order by tab.priority asc")->fetchAll('assoc');  $this->set('alltabs', $alltabs);
	
	     //print_r($alltabs);
		 //die();
	if(isset($this->request->params['pass'][1])){$singleTabName=$connection->execute("select name,id,url,catid from property_tabs as singletab where status='active' and url='".$this->request->params['pass'][1]."'")->fetchAll('assoc');
	}}
	
	if(!empty($alltabs) and isset($this->request->params['pass'][1])) {
		$array=array();
		foreach($alltabs as $testtab)
		{       
                        $array[]=$testtab['id'];
			//array_push($array,$testtab['id']);
			}
		
		if(empty($singleTabName)) { throw new NotFoundException(__('404 NOT FOUND'));}
		else if(in_array($singleTabName[0]['id'],$array)===false){ throw new NotFoundException(__('404 NOT FOUND'));}
		//echo $singleTabName[0]['singletab']['id'];
		
		}
	
	//if(empty($tabsid) and isset($this->request->params['pass'][1])) { throw new NotFoundException(__('404 NOT FOUND')); }
	//if(!empty($tabsid) and isset($this->request->params['pass'][1]) and  empty($singleTabName)) { throw new NotFoundException(__('404 NOT FOUND'));}
	if(count($singleTabName)!=0){ $tabname=$singleTabName['0']['name'];}else {  $tabname='Overview';}
	$this->set('tabname', $tabname);
	
	$bhkunc=@unserialize($projects[0]['bhk']);
	if($bhkunc){ $bhk=implode(",",$bhkunc); $unittypes = $connection->execute('select name from units as bhk  where id in('.$bhk.')')->fetchAll('assoc'); $this->set('unittypes',$unittypes);}
	
	$bannerurls = $connection->execute('select type from property_galleries  where property_id =:prid group by type order by type desc',['prid'=>$projects[0]['id']])->fetchAll('assoc'); 
		$this->set('bannerurls',$bannerurls);
	 
	 $ebrochure_pdf=array();$application_pdf=array();$pdf=array();
	 //$this->loadComponent('Pagination');
	 /*if($projects[0]['ebrochure_pdf']!=''){ $ebrochure_pdf=@unserialize($projects[0]['ebrochure_pdf']); }
	 if($projects[0]['application_pdf']!=''){ $application_pdf=@unserialize($projects[0]['application_pdf']);}
	 if(!empty($ebrochure_pdf) || !empty($application_pdf)) {$pdf=@array_merge($ebrochure_pdf,$application_pdf);}*/
	 $this->set('pdf',$pdf);
	 
	 
	  $property_subtype_id=@unserialize($projects[0]['property_subtype_id']); if($property_subtype_id){ $ides=implode(",",$property_subtype_id); $subtypedata = $connection->execute("select name from property_subtypes as subtype  where id in(".$ides.")")->fetchAll('assoc'); }  $data2='';  foreach($subtypedata as $key2=>$value2){ $data2.=$value2['name'].', '; } 
	  $this->set('psubtypename',$data2); 
	  $this->set('banners',$banners);
		
		
		
	  if ($this->request->is('post')) {
	  
	  $this->loadComponent('Mail');
	  $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	  $phone=trim($this->request->data['phone']);
	  $projectname=trim($this->request->data['pname']);
	  $states="";
	  $this->set('name', $this->request->data['name']);
	  if(strlen(trim($this->request->data['name'])) == 0 ) { $this->Flash->frontError('NAME SHOULD NOT BE LEFT BLANK');}
	  else if(strlen(trim($this->request->data['email'])) == 0 ) { $this->Flash->frontError('EMAIL SHOULD NOT BE LEFT BLANK');}
	  else if(!filter_var(trim($this->request->data['email']), FILTER_VALIDATE_EMAIL)) { $this->Flash->error('EMAIL ID IS NOT VALID');}
	  
	  else if(strlen(trim($this->request->data['country'])) == 0 ) { $this->Flash->error('COUNTRY SHOULD NOT BE LEFT BLANK');}
	  
	  
	  else if(!preg_match($regex,$phone)){ $this->Flash->error('Invalid phone number ');}
	  else if(!filter_var(trim($this->request->data['email']), FILTER_VALIDATE_EMAIL)) { $this->Flash->frontError('EMAIL ID IS NOT VALID');}
	  //else if(trim($this->request->data['country']) == 0 ) { $this->Session->setFlash(__('PLEASE SELECT COUNTRY')); }
	  else if(strlen(trim($this->request->data['comment'])) == 0 ) { $this->Flash->frontError('COMMENT SHOULD NOT BE LEFT BLANK');}
	  
	    else if(strpos($this->request->data['comment'],"https")!==false || strpos($this->request->data['comment'],"www")!==false || strpos($this->request->data['comment'],"/")!==false) { $this->Flash->frontError('PLEASE ENTER A VALID MESSAGE');}
	  
	  else{ 
	  $enqdata=array('name' => $this->request->data['name'],'email' => $this->request->data['email'],'phone' => $this->request->data['phone'],'project' => $projectname,'comment' => $this->request->data['comment'],'posted_date' => date("Y-m-d H:i:s"));
	  $this->Mail->sendMail(addslashes($this->request->data['name']),addslashes($this->request->data['email']),addslashes($this->request->data['phone']),addslashes($this->request->data['comment']),$this->request->data['country'],addslashes($projectname),$states);
	  
	   $this->Mail->sendToRemoteServer("yoonewprojects.com",addslashes($projectname),addslashes($this->request->data['name']),addslashes($this->request->data['phone']),addslashes($this->request->data['email']),$this->request->data['country'],$states,addslashes($this->request->data['comment']));
	   
	   $savedata=$connection->insert('enqueries',$enqdata);
	  
	  if($savedata){
	  //$this->Flash->frontSuccess('!! YOUR MESSAGE HAS BEEN SENT SUCCESSFULLY !!');
	  return $this->redirect(SITE_PATH.'thank-you/');
	  //return $this->redirect($this->referer());
	  /*echo '<script>window.location.href="'.SITE_PATH.'thank-you/"</script>';*/
	 // return $this->redirect(SITE_PATH.'thank-you/');
	  }
	  else
	  {
	  //debug($this->Enquery->invalidFields());
	  //exit;
	  $this->Flash->frontError('!! PLEASE TRY AGAIN !!');
	  return $this->redirect($this->referer());
	  
	  }
	  
	  }
	  }
		
		//print_r($projects); exit;\
	
	$os=array('specifications','price-list');
    if(!isset($this->request->params['pass'][1])) { $this->layout='project'; }
	else if(isset($this->request->params['pass'][1]) and in_array($this->request->params['pass'][1],$os)) { $this->layout='project';}
	else{$this->layout='project-for-images';}
		$query = $connection->execute("select name,url from properties where status='active' order by id desc limit 5")->fetchAll('assoc');
		$blog = $connection->execute("select name,url from blogs where status='active' order by id desc limit 5")->fetchAll('assoc');
	
	$this->set('query', $query);
	$this->set('blog', $blog);	
	 
    }

  
    public function autosuggest() {
	
	$this->layout='ajax';
	if ($this->request->is('ajax')) {
	$connection = ConnectionManager::get('default');
	$this->autoRender = false;
	$response='';
	//$this->request->params['pass'][0]
	$param=trim($this->request->query['term']);
	if($param!='') {
	$prop=$connection->execute("SELECT name ,url  FROM properties  WHERE (name like '%".$param."%' || heading3 like '%".$param."%') and status='active' order by id desc")->fetchAll('assoc');
	$loc=$connection->execute("SELECT name ,url  FROM propertype_locations   WHERE name like '%".$param."%' order by id desc")->fetchAll('assoc');
	$build=$connection->execute("SELECT name ,url  FROM builders   WHERE name like '%".$param."%' order by id desc")->fetchAll('assoc');
	
	$sec=$connection->execute("SELECT s.name secname ,s.url as securl,l.url as locurl,l.name as locname  FROM sectors as s join locations as l on s.location_id=l.id   WHERE s.name like '%".$param."%' and s.status!='deactive' order by s.id desc")->fetchAll('assoc');
	
	$subloc=$connection->execute("SELECT subloc.name sublocname ,subloc.url as sublocurl,l.url as locurl,l.name as locname  FROM propertype_sublocations as subloc join locations as l on subloc.location_id=l.id   WHERE subloc.name like '%".$param."%' and subloc.url!='' order by subloc.id desc")->fetchAll('assoc');
	
	$unitbyloc=$connection->execute("SELECT unitbyloc.name unitbylocname ,unitbyloc.url as unitbylocurl,l.url as locurl,l.name as locname  FROM unitbylocations as unitbyloc join locations as l on unitbyloc.location_id=l.id  WHERE unitbyloc.name like '%".$param."%' and unitbyloc.url!='' order by unitbyloc.id desc")->fetchAll('assoc');

	foreach($build as $key=>$value){
	$row['label']=stripslashes(trim($value['name']));
	$row['value']=SITE_PATH.'builder/'.trim($value['url']);
	$row['type']='Builder';
	$row_set[] = $row;
	} 
	
	foreach($prop as $key=>$value){
	$row['label']=stripslashes(trim($value['name']));
	$row['value']=SITE_PATH.'project/'.trim($value['url']);
	$row['type']='Project';
	$row_set[] = $row;
	}
	
	foreach($loc as $key=>$value){
	$row['label']=stripslashes(trim($value['name']));
	$row['value']=SITE_PATH.'property/'.trim($value['url']);
	$row['type']='Location';
	$row_set[] = $row;
	}
	 
	if(!empty($sec)) { foreach($sec as $key2=>$value2){
	$row['label']=stripslashes(trim($value2['secname']).'-'.trim($value2['locname']));
	$row['value']=SITE_PATH.'location/'.trim($value2['locurl']).'/'.trim($value2['securl']);
	$row['type']='Sectors';
	$row_set[] = $row;
	} }
	
	if(!empty($subloc)) { foreach($subloc as $key2=>$value2){
	$row['label']=stripslashes(trim($value2['sublocname']).'-'.trim($value2['locname']));
	$row['value']=SITE_PATH.'sublocation/'.trim($value2['locurl']).'/'.trim($value2['sublocurl']);
	$row['type']='Sublocation';
	$row_set[] = $row;
	} }
	
	if(!empty($unitbyloc)) { foreach($unitbyloc as $key2=>$value2){
	$row['label']=stripslashes(trim($value2['unitbylocname']));
	$row['value']=SITE_PATH.'unit/'.trim($value2['locurl']).'/'.trim($value2['unitbylocurl']);
	$row['type']='Units';
	$row_set[] = $row;
	} }
	
	echo json_encode($row_set);
	}
	}
	else { throw new NotFoundException(__('404 NOT FOUND')); }
	}
	
	
  
   
}
