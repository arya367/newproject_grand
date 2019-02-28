<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;
/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
{

   
	 public function display() {   
	    $this->layout='index';
		//$this->loadModel('Properties');
		//$this->loadModel('Blogs');
		 $connection = ConnectionManager::get('default');
	   $data = $this->Pages->find('all', [
       'conditions' => ['url_display'=>'index','status'=>'active']])->toArray();
	   
	    $projects= TableRegistry::get('Properties');
		$blogs= TableRegistry::get('Blogs');
		$testimonials= TableRegistry::get('Testimonials');
	    //$query = $projects->find()->select(['name','url'])->where(['status'=>'active'])->limit('5');
		
		//print_r($query);
		/*$query = $projects->find()->select(['name','location_text','price','url','property_image','Banners.photo'])->join(['table' => 'banners','alias' => 'Banners','type' => 'LEFT','conditions' => 'Properties.id=Banners.property_id'])->where(['Properties.status'=>'active'])->limit(8);*/
		
		
		$hot = $projects->find()->select(['name','heading3','location_text','price','url','property_image','locat.name'])->where(['Properties.status'=>'active','Properties.recommended'=>'Y'])->join(['table' => 'locations','alias' => 'locat','type' => 'LEFT','conditions' => 'Properties.location_id=locat.id'])->order(['Properties.recommended_priority'=>'asc'])->limit(8);
		
		
		
		$month = $projects->find()->select(['Properties.name','Properties.heading3','Properties.location_text','Properties.price','Properties.url','Properties.small_info','Properties.project_of_the_month_banner','Locations.name'])->join(['table' => 'locations','alias' => 'Locations','type' => 'LEFT','conditions' => 'Properties.location_id=Locations.id'])->where(['Properties.status'=>'active','Properties.project_of_the_month'=>'Y'])->order('Properties.id desc')->limit(2);
		
	
		
	   
		//print_r($test);
	    $fromprojects=$projects->find()->select(['name','id'])->where(['Properties.status'=>'active'])->order(['Properties.id'=>'desc']);
	   /* $actionablesubvention=$projects->find()->select(['name','url'])->where(['Properties.status'=>'active','Properties.subvention'=>'Y'])->order(['Properties.subvention_priority'=>'asc'])->limit(6);
	    $actionablemonthlyRental=$projects->find()->select(['name','url'])->where(['Properties.status'=>'active','Properties.monthlyRental'=>'Y'])->order(['Properties.monthlyRental_priority'=>'asc'])->limit(6);*/
		
		$footerblog = $blogs->find()->select(['name','url'])->where(['Blogs.status'=>'active'])->order(['Blogs.id'=>'desc'])->limit(5);
		$sql="select * from blogs order by id desc limit 3";
		$homepress=$connection->execute($sql)->fetchAll('assoc');
		//print_r($homepress);
		//$homepress = $blogs->find()->select(['name','url','short_post','image'])->where(['Blogs.status'=>'active'])->order(['Blogs.id'=>'desc'])->limit(6);
		$test=$testimonials->find()->select(['name','image','location','post'])->order(['id'=>'desc']);
		
		//print_r($homepress);
		
	    //debug($homepress);
		
		if ($this->request->is('post')) {
	  
	  $this->loadComponent('Mail');
	  $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	  $phone=trim($this->request->data['phone']);
	  $states="";
	  $projectname=trim($this->request->data['pname']);
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
		$query = $connection->execute("select name,url from properties where status='active' order by id desc limit 5")->fetchAll('assoc');
	    $blog = $connection->execute("select name,url from blogs where status='active' order by id desc limit 5")->fetchAll('assoc');
	   $this->set('pages', $data);
	   $this->set('hot', $hot);
	   $this->set('month', $month);
	   $this->set('fromprojects', $fromprojects);
	   $this->set('query', $query);
	   $this->set('blog', $blog);
	  /* $this->set('actionablesubvention', $actionablesubvention);
	   $this->set('actionablemonthlyRental', $actionablemonthlyRental);*/
	   $this->set('footerblog', $footerblog);
	   $this->set('homepress', $homepress);
	   $this->set('test', $test);
	   $this->set('title', $data[0]['meta_title']);
	   $this->set('seo_description', $data[0]['meta_description']);
	   $this->set('description', $data[0]['description']);
	   $this->set('canonical', SITE_PATH);
	   
	   
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
		
		
    }
	
	 public function search() {
		$connection = ConnectionManager::get('default');
		$this->loadModel('Locations');
		$this->loadModel('PropertySubtypes');
		$this->layout='search';
		$data = $connection->execute("select * from pages where url_display='search'")->fetchAll('assoc');
		if (count($data)===0) { throw new NotFoundException('Page not found on the server'); exit; }	
			
		$this->set('content', $data);
		$this->set('seo_title', $data[0]['meta_title']);
		$this->set('keyword', $data[0]['meta_keyword']);
		$this->set('seo_description', $data[0]['meta_description']);
		$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
		$this->set('canonical', SITE_PATH."search/");
		$subtypes=$this->PropertySubtypes->find('list',['fields'=>['name','id']])->toArray();
		$locations=$this->Locations->find('list')->toArray();
		$type=array('residential'=>1,'commercial'=>2);
		$this->set('alllocations', $locations);
		$this->set('subtypes', $subtypes);
		$params='';$sql='';$pages='';$min='';$max='';$lid='';$bid='';$pid='';$spid='';$bhk='';$pr='';
		
		
		
		if(isset($this->request->query['page']))
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
		
	if(isset($this->request->query['pr']) and ($this->request->query['pr']!='') and (!isset($this->request->query['bid']))) { 
	$pr=trim(str_replace(' ','|',$this->request->query['pr']));
	//$pr=trim(addslashes($this->request->query['pr']));
	$params.="pr=$pr&";}
	if(isset($this->request->query['min']) and ($this->request->query['min']!=0)) { $min=$this->request->query['min'];$params.="min=$min&";}
	if(isset($this->request->query['max']) and ($this->request->query['max']!=0)) { $max=$this->request->query['max'];$params.="max=$max&";}
	if(isset($this->request->query['bid']) and ($this->request->query['bid']!='')) { $bid=$this->request->query['bid'];$params.="bid=$bid&";}
	if(isset($this->request->query['loc']) and ($this->request->query['loc']!='')) { $lid=$this->request->query['loc'];$params.="loc=$lid&";}
	if(isset($this->request->query['type']) and ($this->request->query['type']!='')) { $pid=$this->request->query['type'];$params.="type=$pid&";}
	if(isset($this->request->query['subtype']) and ($this->request->query['subtype']!='')) { $spid=$this->request->query['subtype'];$params.="subtype=$spid";}
	if(isset($this->request->query['beds'])) { $bhk=$this->request->query['beds'];}
      
	 // print_r($subtypes);	
	  //print_r(array_search($spid,$subtypes));
	  
	  
		 $sql="select properties.name,properties.heading3,properties.location_text,properties.availability,properties.url,properties.small_description,properties.price,properties.area,properties.property_image,properties.small_info,properties.property_subtype_id,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl,sec.url as sectorurl  ";
		
		
		
		//if($min!=0 || $max!=0){$sql.=" , max(pricem.price) as maxprice , min(pricem.price) as minprice";}
		if($min!=0 || $max!=0){$sql.=" , pricem.price as prprice ";}
		$sql.=" from properties as properties join locations as locat on properties.location_id=locat.id join sectors as sec on properties.sector_id=sec.id join property_types as ptype on properties.property_type_id=ptype.id  join builders as build  on properties.builder_id=build.id ";
		
		if($min!=0 || $max!=0){$sql.=" left join price_management as pricem on properties.id=pricem.property_id ";}
		
		$sql.="where  1 ";
		if($pr!=''){$sql.=" and ( properties.name rlike '".$pr."' or build.name like '%".$pr."%' or sec.name like '%".$pr."%' or locat.name like '%".$pr."%' ) ";}
		if($bid){ $sql.=" and  properties.builder_id='".$bid."'";}
		if($lid){ $sql.=" and  properties.location_id='".array_search($lid,$locations)."'";}
		if($pid){ $sql.=" and  properties.property_type_id='".$type[$pid]."'";}
		if($spid){ $sql.=" and   properties.property_subtype_id like '%\"".$spid."\"%'";}
		if($bhk) { $sql.=" and  properties.bhk like '%\"".$bhk."\"%' ";}
		if($min!=0 || $max!=0){ 
		if($min!=0 and $max!=0){$sql.=" and ( pricem.price >".$min." and  pricem.price <=".$max.")";}
		else if($min==0 and $max!=0){$sql.=" and   pricem.price <=".$max."";}
		else if($min!=0 and $max==0){$sql.=" and   pricem.price >=".$min."";}
		else{}
		}
		$sql.="  and properties.status='active' ";
		if($min!=0 || $max!=0){$sql.=" group by pricem.property_id";}
		$count=count($connection->execute($sql));
		$data=$connection->execute($sql." order by properties.budgetmin asc limit $start,$per_page");
		//echo $sql; exit;
		$this->set('total',$count);
		$this->set('currentpage',$cur_page);
		$this->set('table','search');
		$this->set('params',$params);
		$this->set('results',$data);
		$this->set('paginglink','');
		}
		
	 public function view() {
		
		$connection = ConnectionManager::get('default');
		$this->layout='page';
		$countcond='';
		$pageurl=trim($this->request->pass[0]);
		$data = $connection->execute("select * from pages where url_display='".$pageurl."' and status='active'")->fetchAll('assoc');
		if (count($data)===0) { throw new NotFoundException('Page not found on the server'); exit; }	
			
		$this->set('content', $data);
		$this->set('seo_title', $data[0]['meta_title']);
		$this->set('keyword', $data[0]['meta_keyword']);
		$this->set('seo_description', $data[0]['meta_description']);
		$orderby=@explode("_",$data['0']['searchby']);
	    $priority=$orderby[0]."_priority";
	
		if(!isset($this->request->query['page'])){
		$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
		$this->set('canonical', SITE_PATH."p/$pageurl/");
		}
		else{
		$this->set('robots','<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">');
		$this->set('canonical',SITE_PATH."p/$pageurl/?page=".$this->request->query['page']);
		}
		
		if(isset($this->request->query['page']) and !filter_var($this->request->query['page'], FILTER_VALIDATE_INT) || $this->request->query['page']==1){ echo SITE_PATH.'p/'.$this->request->params['pass'][0]."/";
	return $this->redirect(SITE_PATH.'p/'.$this->request->params['pass'][0]."/");  exit;}
			else if(isset($this->request->query['page'])){ $page = $this->request->query['page']; }
			else{ $page = 1; }
		$cur_page = $page;
		$page -= 1;
		$per_page = 6;
		$start = $page * $per_page;
		
		
	  
		$order='';
		$filterelement='';
		$ajaxelement='';
		$searchby='';
		$param=$this->request->params['pass'][0];
		//if($data['0']['location_id']!=0){ $countcond.=" and pro.location_id=".$data['0']['location_id'];}
		if($data['0']['searchtype']!='') {
		if($data['0']['searchtype']=='type'){ 
		
		$filterelement='search-for-propertylist';
		$ajaxelement='properties/searchPropertylist/'; 
		$countcond.=" and  pro.".$data['0']['searchby']."='Y'"; $orderby=' order by pro.$priority asc';
		$searchby=$data['0']['searchtype']."-".$data['0']['searchby'];
		}
		else if($data['0']['searchtype']=='property_subtype_id')
		{ 
		$filterelement='search_subtype_id';
		$ajaxelement='properties/searchPropertylist/';
		$countcond.=" and   pro.property_subtype_id like '%\"".$data['0']['searchby']."\"%'";
		$searchby=$data['0']['searchtype']."-".$data['0']['searchby'];
		}
		else
		{ 
		throw new NotFoundException(__('404 NOT FOUND')); }
		}
		
		$countq = $connection->execute("select count(*) as total from properties as pro  where pro.status='active'  $countcond " )->fetchAll('assoc');
		$count=$countq[0]['total'];
		//if(!is_numeric($this->request->query['page'])){ $this->redirect(SITE_PATH); } 
		if (!$count) {throw new NotFoundException(__('404 NOT FOUND'));}
		
		if(isset($this->request->params['pass'][1])){ $this->redirect(SITE_PATH.'p/$pageurl/'.$this->request->params['pass'][0]."/"); }
		
		
		
		$property=$connection->execute("select pro.name,pro.url,pro.heading3,pro.small_description,pro.area,pro.property_image,pro.property_image_alt_tag,pro.price,pro.small_info,pro.property_subtype_id,pro.availability,pro.location_text,sec.url as sectorurl,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl from properties as pro join property_types as ptype on pro.property_type_id=ptype.id  join builders as build  on pro.builder_id=build.id join locations as locat on pro.location_id=locat.id join sectors as sec on pro.sector_id=sec.id  where pro.status='active' $countcond  $order  limit $start,$per_page")->fetchAll('assoc');
		//$locationphoto=$property[0]['location']['photo'];
		$this->set('results', $property);
		$this->set('total',$count);
		$this->set('currentpage',$cur_page);
		$this->set('countcond',base64_encode($countcond));
		$this->set('order',base64_encode($order));
		$this->set('table','p');
		$this->set('paginglink',$this->request->params['pass'][0]);
		$this->set('searchby',$searchby);
		$this->set('pageurl',$pageurl);
		$this->set('filterelement',$filterelement);
		$this->set('ajaxelement',$ajaxelement);
		
		
		}
		
	 public function searchProp($search=null,$pages=null,$countcond=null,$order=null) {
		 
		
	     if ($this->request->is('ajax')) {
			 $countcond=base64_decode($countcond);
			 $order=base64_decode($order);
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
	$sql="select pro.name,pro.heading3,pro.location_text,pro.availability,pro.url,pro.small_description,pro.price,pro.area,pro.property_image,pro.property_image_alt_tag,pro.small_info,pro.property_subtype_id,ptype.name as ptypename,build.name as buildname,locat.name as locatname,locat.url as locaturl,sec.url as sectorurl ";
	if($min!=0 || $max!=0){$sql.=" , pricem.price ";}
	$sql.=" from properties as pro left join locations as locat on pro.location_id=locat.id left join sectors as sec on pro.sector_id=sec.id  left join property_types as ptype on pro.property_type_id=ptype.id  left join builders as build  on pro.builder_id=build.id     ";
	
	
	if($min!=0 || $max!=0){$sql.=" left join price_management as pricem on pro.id=pricem.property_id ";}
	 
	$sql.="where  1 ";
	  
	  
	//
	if($loc){ $sql.=" and  pro.location_id='".$loc."'";}
	if($bid){ $sql.=" and  pro.builder_id='".$bid."'";}
	if($spid){ $sql.=" and  pro.property_subtype_id like '%\"".$spid."\"%'";}
	if($bhk) { $sql.=" and  pro.bhk like '%\"".$bhk."\"%' ";}
	if($min!=0 || $max!=0){ 
	if($min!=0 and $max!=0){$sql.=" and ( pricem.price >".$min." and  pricem.price <=".$max.")";}
	else if($min==0 and $max!=0){$sql.=" and   pricem.price <=".$max."";}
	else if($min!=0 and $max==0){$sql.=" and   pricem.price >=".$min."";}
	else{}
	}
	
	$sql.="  and pro.status='active' $countcond ";
	
	if($min!=0 || $max!=0){$sql.=" group by pricem.property_id ";}
	 //echo $sql;  exit;
	$count=count($connection->execute($sql)->fetchAll('assoc'));  
	$data= $connection->execute($sql." limit $start,$per_page")->fetchAll('assoc');
	$this->set('currentpage',$cur_page);
	$this->set('total',$count);
	$this->set('results',$data);
	$this->set('countcond',base64_encode($countcond));
	$this->set('order',base64_encode($order));
	if($per_page*$pg >=$count) { $last=$count;} else { $last=$per_page*$pg;}
	$this->set('status',$start+1 ." to ". $last." out of ".$count);
	 }
	//else {throw new NotFoundException(__('Invalid Property'));}
	$this->layout='ajax';
	}
	
	 public function contactus() {
		$connection = ConnectionManager::get('default');
		$blogs= TableRegistry::get('Blogs');
		$projects= TableRegistry::get('Properties');
		$this->layout='contact-us';
		if ($this->request->is('post')) {
	  
	  $this->loadComponent('Mail');
	  $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	  $phone=trim($this->request->data['phone']);
	  $states="";
	  $projectname=trim($this->request->data['pname']);
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
		$data = $connection->execute("select * from pages where url_display='contact-us' and status!='active'")->fetchAll('assoc');
		$this->set('pages', $data);
		$this->set('title', $data['0']['title']);
		$this->set('seo_title', $data['0']['meta_title']);
		$this->set('seo_keyword', $data['0']['meta_keyword']);
		$this->set('seo_description', $data['0']['meta_description']);
		$this->set('canonical', SITE_PATH."contact-us/");
		$blog = $blogs->find()->select(['name','url'])->where(['Blogs.status'=>'active'])->order(['Blogs.id'=>'desc'])->limit(5);
		$query = $projects->find()->select(['name','url'])->where(['status'=>'active'])->limit('5');
		$this->set('blog', $blog);
		$this->set('query', $query);
	}
	
	public function aboutus() {
		$connection = ConnectionManager::get('default');
		$this->layout='about-us';
	
		$data = $connection->execute("select * from pages where url_display='about-us' and status!='active'")->fetchAll('assoc');
		$this->set('pages', $data);
		$this->set('title', $data['0']['title']);
		$this->set('seo_title', $data['0']['meta_title']);
		$this->set('seo_keyword', $data['0']['meta_keyword']);
		$this->set('seo_description', $data['0']['meta_description']);
		$this->set('canonical', SITE_PATH."about-us/");
	}
	
	public function disclaimer() {
		$connection = ConnectionManager::get('default');
		$this->layout='disclaimer';
	
		$data = $connection->execute("select * from pages where url_display='disclaimer' and status!='active'")->fetchAll('assoc');
		$this->set('pages', $data);
		$this->set('title', $data['0']['title']);
		$this->set('seo_title', $data['0']['meta_title']);
		$this->set('seo_keyword', $data['0']['meta_keyword']);
		$this->set('seo_description', $data['0']['meta_description']);
		$this->set('canonical', SITE_PATH."disclaimer/");
		$query = $connection->execute("select name,url from properties where status='active' order by id desc limit 5")->fetchAll('assoc');
	    $blog = $connection->execute("select name,url from blogs where status='active' order by id desc limit 5")->fetchAll('assoc');
		$this->set('query', $query);
	   $this->set('blog', $blog);
	}
	
	
	public function nri() {
		$connection = ConnectionManager::get('default');
		$this->layout='nri';
	
		$data = $connection->execute("select * from pages where url_display='nri-real-estate-investment' and status!='active'")->fetchAll('assoc');
		$this->set('pages', $data);
		$this->set('title', $data['0']['title']);
		$this->set('seo_title', $data['0']['meta_title']);
		$this->set('seo_keyword', $data['0']['meta_keyword']);
		$this->set('seo_description', $data['0']['meta_description']);
		$this->set('canonical', SITE_PATH."nri-real-estate-investment/");
	}
	
	public function sitemap() {
		$connection = ConnectionManager::get('default');
		$this->layout='sitemaps';
	
		$data = $connection->execute("select * from pages where url_display='sitemaps' and status!='active'")->fetchAll('assoc');
		$this->set('pages', $data);
		$this->set('title', $data['0']['title']);
		$this->set('seo_title', $data['0']['meta_title']);
		$this->set('seo_keyword', $data['0']['meta_keyword']);
		$this->set('seo_description', $data['0']['meta_description']);
		$this->set('canonical', SITE_PATH."sitemaps/");
	}
	
	public function thankYou() {
		
		$projects= TableRegistry::get('Properties');
		$blogs= TableRegistry::get('Blogs');
		//$this->autoRender = false;
		$this->layout='thankyou';
		$this->set('canonical', SITE_PATH."thank-you/");
		$query = $projects->find()->select(['name','url'])->where(['status'=>'active'])->limit('5');
		$blog = $blogs->find()->select(['name','url'])->where(['Blogs.status'=>'active'])->order(['Blogs.id'=>'desc'])->limit(5);
		$this->set('query', $query);
	   $this->set('blog', $blog);
	}
	
 /*public function disclaimerhome() {
		if ($this->request->is('ajax')) {
	$this->layout='ajax';
    $this->autoRender = false;
	
	  echo '<div class="dis_heading">DISCLAIMER</div>
<p><strong>Note:</strong> This website is in the process of being updated. By accessing this website, the viewer confirms that the information including brochures and marketing collaterals on this website are solely for informational purposes only and the viewer has not relied on this information for making any booking/purchase in any project of the Company. Nothing on this website, constitutes advertising, marketing, booking, selling or an offer for sale, or invitation to purchase a unit in any project by the Company. The Company is not liable for any consequence of any action taken by the viewer relying on such material/ information on this website.</p>';
	}
	}*/
		

		
	
}
