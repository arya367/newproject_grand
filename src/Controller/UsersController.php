<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

   
	
	public function login()
    {    //print_r($this->request);
       if ($this->request->is('post')) {  
		 
		   $validator= new Validator();
		   
		   $validator
		   ->requirePresence('username')
		   ->notEmpty('ussername','username should not be left blank.')
		   ->requirePresence('password')
		   ->notEmpty('password','password should not be left blank.');
		   
		   $errors = $validator->errors($this->request->data());
         if (!empty($errors)) { 
         $this->Flash->error('username and password both are mandatory.');
	    $this->redirect('/admin/');
		 }
		else {
	$username=$this->request->data['username'];
    $password=md5($this->request->data['password']);
		$query=$this->Users->find('all')->where(['username' => $username,'password'=>$password]);
		$countuser = $query->count();
		if($countuser===0)
	   {
		$this->Flash->error('invalid user');
		$this->redirect('/admin/');
		}
		else
		{ 
		$data = $query->first(); 
		
		$session = $this->request->session();
		$session->write('USERNAME', $data->username); 
		$session->write('ROLE', $data->role); 
		$session->write('NAME', $data->name);
		
		$this->Flash->success('You have successfully logged in.Welcome to your dashboard.');
		return $this->redirect('/admin/users/welcome/');
			}
		
			//return $this->redirect('/admin/users/');
			
               }
		
		}
		
	   $this->layout='login';
    }
	
}
