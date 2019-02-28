<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
/**
 * Subscribes Controller
 *
 * @property \App\Model\Table\SubscribesTable $Subscribes
 */
class SubscribesController extends AppController
{

    public function send($email=null)
    {
        
		$this->layout='ajax';
		$this->autoRender=false;
		if ($this->request->is('ajax') and isset($email)) {
			
			   $validemail=filter_var(trim($email), FILTER_VALIDATE_EMAIL); 
			   $query = $this->Subscribes->find('all', ['conditions' => ['Subscribes.email =' => $validemail]]);
               $number = $query->count();
			   if(!$validemail){ echo "0##Invalid email id"; exit;}
               else if($validemail and $number==0){
			   $this->loadComponent('Mail');
			   $subscription = $this->Subscribes->newEntity();
			   $subscription->email = $validemail;
			   $this->Subscribes->save($subscription);
			   $this->Mail->sendSubscriptionMail($validemail);
			   echo "1##".$email; exit;
			   }
			   else{
			   echo "0##Email id already exist.Please try another."; exit; 
			   }
			   
		  
		   
    }
	else
	{
		throw new NotFoundException(__('Page not found on the server'));
		}
	}
}
