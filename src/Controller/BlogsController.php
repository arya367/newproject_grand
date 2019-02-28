<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 */
class BlogsController extends AppController
{

    
    public function index()
    {  
		
		
		if(isset($this->request->query['page']) and !filter_var($this->request->query['page'], FILTER_VALIDATE_INT) || $this->request->query['page']==1){ return $this->redirect(SITE_PATH.'post/'); }
		else if(isset($this->request->query['page'])){$page = $this->request->query['page']; }
		else{$page = 1;}
		$cur_page = $page;
		$page -= 1;
		$per_page = 6;
		$start = $page * $per_page;
		$connection = ConnectionManager::get('default');
		$count = $connection->execute('select count(*) as total from blogs where status=:status',["status"=>"active"])->fetchAll('assoc');
		if ($count[0]['total']==0) {throw new NotFoundException('Page not found on the server'); exit;}
		if(isset($this->request->params['pass'][1])){ $this->redirect(SITE_PATH.'post/'.$this->request->params['pass'][0]."/"); }
		
		$blog= $connection->execute("select b.id,b.name,b.image,b.more_images,b.cat,b.url,b.short_post,b.post,b.created,a.name as aname,a.user_name as ausername,a.id as auserid from  blogs as b left join authors as a on b.author_id=a.id where b.status='active' order by b.id desc limit $start,$per_page")->fetchAll('assoc');
		//print_r($blog); exit; 
		$this->set('news', $blog);
		$this->set('table','post');
		$this->set('total',$count[0]['total']);
		$this->set('currentpage',$cur_page);
		$cats=array("news"=>"News","project-reviews"=>"Project Reviews","market-trends"=>"Market Trends","user-guide"=>"User Guide");
		$this->set('cat',$cats);
		$this->set('seo_title','Hcorealestate Market Updates');
		$this->set('paginglink','null');
		if(!isset($this->request->query['page'])){
		$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
		$this->set('canonical', SITE_PATH.'post/');
		}
		else{
		$this->set('robots','<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">');
		$this->set('canonical',SITE_PATH.'post/?page='.$this->request->query['page']);
		}
	   if ($this->request->is('post')) {
	  
	  $this->loadComponent('Mail');
	  $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	  $phone=trim($this->request->data['phone']);
	  $states="";
	  $projectname="Blog Page";
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
	  $this->Mail->sendMail(addslashes($this->request->data['name']),addslashes($this->request->data['email']),addslashes($this->request->data['phone']),addslashes($this->request->data['comment']),$this->request->data['country'],"Enquiry From Blog",$states);
	  
	   $this->Mail->sendToRemoteServer("yoonewprojects.com","Enquiry From Blog",addslashes($this->request->data['name']),addslashes($this->request->data['phone']),addslashes($this->request->data['email']),$this->request->data['country'],$states,addslashes($this->request->data['comment']));
	   
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
	  $sql="select * from blogs order by id desc limit 5";
	$homepress=$connection->execute($sql)->fetchAll('assoc');
	$sql1="select * from properties order by id desc limit 5";
	$projects=$connection->execute($sql1)->fetchAll('assoc');
       $this->set('homepress',$homepress);
	   $this->set('projects',$projects);
        $this->layout='blog-list';
    }
	
	 public function category()
    { 
	$condition='';  
	//print_r($this->request->params); exit;
	$arrayCategory=array('author_id'=>'author','cat'=>'category');
	$category=$this->request->params['category'];
	$categoryKey= array_search ($category, $arrayCategory);
	$pass=$this->request->params['url'];
	if(!in_array($category,$arrayCategory) || !isset($this->request->params['url'])){ throw new NotFoundException('Page not found on the server'); exit;}
	
	if(isset($this->request->query['page']) and !filter_var($this->request->query['page'], FILTER_VALIDATE_INT) || $this->request->query['page']==1){ 
	return $this->redirect(SITE_PATH.'post/'.$category.'/'.$pass.'/'); }
	
	else if(isset($this->request->query['page'])){ $page = $this->request->query['page']; }
	else{$page = 1;}
	$cur_page = $page;
	$page -= 1;
	$per_page = 6;
	$start = $page * $per_page;
	
	
	$connection = ConnectionManager::get('default');
	
	if($categoryKey=='cat'){$condition.=' and b.cat="'.$pass.'"';} else { $condition.=' and a.user_name="'.$pass.'"';}
	$count = $connection->execute("select count(*) as total from blogs as b join authors as a on b.author_id=a.id  where b.status='active' $condition")->fetchAll('assoc');
	
	if ($count[0]['total']==0) { throw new NotFoundException('Page not found on the server'); exit;}
	
	//if(isset($this->request->params['pass'][1])){ $this->redirect(SITE_PATH.'post/'.$this->request->params['pass'][0]."/"); }
	
	$blog= $connection->execute("select b.id,b.name,b.image,b.cat,b.url,b.short_post,b.post,b.created,a.name as aname,a.user_name as ausername,a.id as auserid from  blogs as b left join authors as a on b.author_id=a.id  where b.status='active'  $condition order by b.id desc  limit $start,$per_page")->fetchAll('assoc');
	//print_r($blog); exit; 
	$this->set('news', $blog);
	$this->set('table','post');
	$this->set('total',$count[0]['total']);
	$this->set('currentpage',$cur_page);
	$cats=array("news"=>"News","project-reviews"=>"Project Reviews","market-trends"=>"Market Trends","user-guide"=>"User Guide");
	$this->set('cat',$cats);
	$this->set('seo_title','Hcorealestate Market Updates');
	$this->set('paginglink',$category.'/'.$pass);
	if(!isset($this->request->query['page'])){
	$this->set('robots','<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">');
	$this->set('canonical', SITE_PATH.'post/'.$category.'/'.$pass.'/');
	}
	else{
	$this->set('robots','<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">');
	$this->set('canonical',SITE_PATH.'post/'.$category.'/'.$pass.'/?page='.$this->request->query['page']);
	}

	$this->layout='blog-list';
    }

    
    public function view($id = null)
    { 
     $connection = ConnectionManager::get('default'); 
	// $blogs= TableRegistry::get('Blogs');  
	 $pass=$this->request->params['url'];
    
	    $data = $connection->execute("select b.*,a.name as aname,a.user_name as ausername from blogs as b join authors as a on b.author_id=a.id where b.url=:url",['url'=>$pass])->fetchAll('assoc');
		
		if (count($data)==0) { throw new NotFoundException('Page not found on the server'); exit; }
		
	

	$this->set('blog',$data);
	$this->set('seo_title',$data[0]['seo_title']);
	$this->set('seo_keyword',$data[0]['seo_keyword']);
	$this->set('seo_description',$data[0]['seo_description']);
	$this->set('canonical', SITE_PATH.'post/'.$data[0]['url']."/");
	//$this->set('blog_id',$blog[0]['id']);
	
	$cu_blog_id =($data[0]['id']);
	$pre_blog_id = $cu_blog_id;
	$pre2_blog_id = ($cu_blog_id-2);
	$next_blog_id = ($cu_blog_id+1);
	//print_r($pre_blog_id);
	//die();
	$data1 = $connection->execute("select url,name from blogs where id < '$pre_blog_id' order by id desc")->fetchAll('assoc');
    //$this->set('blog1',$data1);
	//print_r($data1[0]['url']);
	
	$this->set('blog1',$data1);
	
	$data2 = $connection->execute("select url,name from blogs where id > '$pre_blog_id'")->fetchAll('assoc');
	$auth = $connection->execute("select about_user from authors where user_name='admin'")->fetchAll('assoc');
	$sql="select * from blogs order by id desc limit 5";
	$homepress=$connection->execute($sql)->fetchAll('assoc');
	$sql1="select * from properties order by id desc limit 5";
	$projects=$connection->execute($sql1)->fetchAll('assoc');
	$this->set('blog2',$data2);
	$this->set('auth',$auth);
	$this->set('homepress',$homepress);
	$this->set('projects',$projects);
	
	//print_r($blog1[0]['url']);
	//die();
	  if ($this->request->is('post')) {
	  
	  $this->loadComponent('Mail');
	  $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	  $phone=trim($this->request->data['phone']);
	  $states="";
	  $projectname="Blog Page";
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
	  $this->Mail->sendMail(addslashes($this->request->data['name']),addslashes($this->request->data['email']),addslashes($this->request->data['phone']),addslashes($this->request->data['comment']),$this->request->data['country'],"Enquiry From Blog",$states);
	  
	   $this->Mail->sendToRemoteServer("yoonewprojects.com","Enquiry From Blog",addslashes($this->request->data['name']),addslashes($this->request->data['phone']),addslashes($this->request->data['email']),$this->request->data['country'],$states,addslashes($this->request->data['comment']));
	   
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
	$this->layout='blog-view';
    }

    
}
