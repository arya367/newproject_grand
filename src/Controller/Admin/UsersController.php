<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {  
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
		
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			
			
			$this->request->data['password_enc']=$this->request->data['password'];
			$password_enc=md5($this->request->data['password']);
			$this->request->data['password']=$password_enc;
			
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
		
		
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$this->request->data['password_enc']=$this->request->data['password_enc'];
			$password_enc=md5($this->request->data['password_enc']);
			$this->request->data['password']=$password_enc;
			
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
		 $connection = ConnectionManager::get('default');
	   $menuheader=$connection->execute("select name,action,id,controller,menuheader_id from menus as headers where 1 group by controller")->fetchAll('assoc');
	   $this->set('menuheaders',$menuheader);
       $this->set(compact('user'));
       $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {   
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index/']);
    }
	
	function welcome() { 
		$this->set('title','');
	
		}
		
		function notAuthorized() { 
		$this->set('title','UnAuthorized');
		$this->Flash->error('You are not authorized.');
		}
		
		
		function logout() {
	// delete the user session
	session_destroy(); 
	// redirect to posts index page
	$this->Flash->success('You have successfully logged out.');
	return $this->redirect('/admin/');
}

  public function checkSession() {
	$this->Flash->success('Login first if you are valid user.');  
	echo "<script>window.location.href='".SITE_PATH."admin';</script>";
	
  }
  
  
  function menusonheader($id) {
		$result=$connection->execute("select name,action,id,controller from menus  where  controller='$id'  order by id")->fetchAll('assoc');;
		return $result;
	}
	
	function menusonaction($action) {
	   
		$result=$connection->execute("select name,action,id,controller from menus  where  menuheader_id='$action' and status='active'  and action!='welcome' order by id")->fetchAll('assoc');
		return $result;
	}
	
	function menusheader($id) {
	
		$result=$connection->execute("select name,action from menuheaders as head  where   id='$id' and status='active' order by navid")->fetchAll('assoc');
		return $result;
	}
	
	 function redirectThis()
    {   
	  
			$this->Flash->error('You are not authorized.');
			echo "<script>window.location.href='".SITE_PATH."admin/users/welcome/';</script>"; exit;
			//@header('location:admin/users/welcome/');
			//return $this->redirect('/welcome/');
		
    }
	
}
