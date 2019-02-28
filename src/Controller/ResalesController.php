<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Exception\NotFoundException;

/**
 * Resales Controller
 *
 * @property \App\Model\Table\ResalesTable $Resales
 */
class ResalesController extends AppController
{

    public function unitInfo($val = null)
    {   $this->layout='ajax';
	    $this->autoRender = false;
		if ($this->request->is('ajax')) {
			$value=base64_decode($val);
			
			
	if(isset($value) and $value!='') {
	    $connection = ConnectionManager::get('default');
		$rows = array();
	    $resaledata = $connection->execute("select r.*,s.name as subtype from resales as r left join property_subtypes as s on r.property_subtype_id=s.id where r.id=:id",['id'=>$value])->fetchAll('assoc');
        echo json_encode($resaledata);
		
	}
		} 
	else {
		echo "404 page not found";
		}
	
    }
	
	
	public function sendinfo()
    {   $this->layout='ajax';
	    $this->autoRender = false;
		$connection = ConnectionManager::get('default');
		$resaleid=$this->request->data['resale-id'];
		$dataexist = $connection->execute("select count(*) as total from resales where id=:id",['id'=>$resaleid])->fetchAll('assoc');
		
		if ($this->request->is('ajax') and $dataexist[0]['total']!=0) {
	 	
	  $this->loadComponent('Mail');
	  $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	  
	  $phone=trim($this->request->data['resale-phone']);
	  
	  $projectname="Resale-id : ".$this->request->data['resale-id'];
	  $this->set('name', $this->request->data['resale-name']);
	  if(strlen(trim($this->request->data['resale-name'])) == 0 ) { echo 'NAME SHOULD NOT BE LEFT BLANK'; exit;}
	  else if(strlen(trim($this->request->data['resale-email'])) == 0 ) { echo 'EMAIL SHOULD NOT BE LEFT BLANK'; exit;}
	  else if(!filter_var(trim($this->request->data['resale-email']), FILTER_VALIDATE_EMAIL)) { echo 'EMAIL ID IS NOT VALID'; exit;}
	  
	  else if(strlen(trim($this->request->data['resale-country'])) == 0 || trim($this->request->data['resale-country'])==0) { echo 'COUNTRY SHOULD NOT BE LEFT BLANK'; exit;}
	  
	  
	  else if(!preg_match($regex,$phone)){ echo 'Invalid phone number '; exit;}
	  else if(!filter_var(trim($this->request->data['resale-email']), FILTER_VALIDATE_EMAIL)) { echo 'EMAIL ID IS NOT VALID'; exit;}
	  //else if(trim($this->request->data['country']) == 0 ) { $this->Session->setFlash(__('PLEASE SELECT COUNTRY')); }
	  else if(strlen(trim($this->request->data['resale-comment'])) == 0 ) { echo 'COMMENT SHOULD NOT BE LEFT BLANK'; exit;}
	  
	    else if(strpos($this->request->data['resale-comment'],"https")!==false || strpos($this->request->data['resale-comment'],"www")!==false || strpos($this->request->data['resale-comment'],"/")!==false) { echo 'PLEASE ENTER A VALID MESSAGE'; exit;}
	  
	  else{ 
	  $enqdata=array('name' => $this->request->data['resale-name'],'email' => $this->request->data['resale-email'],'phone' => $this->request->data['resale-phone'],'project' => "Resale Id",'comment' => $this->request->data['resale-comment'],'posted_date' => date("Y-m-d H:i:s"));
	  $this->Mail->sendMail(addslashes($this->request->data['resale-name']),addslashes($this->request->data['resale-email']),addslashes($this->request->data['resale-phone']),addslashes($this->request->data['resale-comment']),$this->request->data['resale-country'],addslashes($projectname),'');
	  
	   $this->Mail->sendToRemoteServer("HCOREALESTATES.COM",$projectname,addslashes($this->request->data['resale-name']),addslashes($this->request->data['resale-phone']),addslashes($this->request->data['resale-email']),$this->request->data['resale-country'],'null',addslashes($this->request->data['resale-comment']));
	   
	   $savedata=$connection->insert('enqueries',$enqdata);
	  
	  if($savedata){
	  echo 1; exit ;
	  //return $this->redirect($this->referer());
	  /*echo '<script>window.location.href="'.SITE_PATH.'thank-you/"</script>';*/
	 // return $this->redirect(SITE_PATH.'thank-you/');
	  }
	  else
	  {
	  //debug($this->Enquery->invalidFields());
	  //exit;
	  echo '!! PLEASE TRY AGAIN !!'; exit;
	  //return $this->redirect($this->referer());
	  
	  }
	  
	  }
		} 
	else {
		echo "Data Not Found.Please try again";
		}
	
    }
}
