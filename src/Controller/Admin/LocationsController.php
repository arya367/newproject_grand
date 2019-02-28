<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 */
class LocationsController extends AppController
{

   
   public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('Upload');
    }
   
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('locations', $this->paginate($this->Locations));
        $this->set('_serialize', ['locations']);
		
    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $location = $this->Locations->get($id, [
           // 'contain' => ['Pages', 'Properties']
        ]);
        $this->set('location', $location);
        $this->set('_serialize', ['location']);
		$_SESSION["Username"] = "Kanhaiya";
		//Session::write('Username', 'Kanhaiya');
		//echo $_SESSION["Username"];
		
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $location = $this->Locations->newEntity($this->request->data);
		
        if ($this->request->is('post')) {
		
			$errors=$location->errors();
			//print_r($errors); 
			
			$destinationorig = realpath('../webroot/img/location/orig/') . '/';
	        $destinationthumb ='';
			$resultval="" ;
			
			if($this->request->data['photo']['size']!=0 and empty($errors)){
			$file = $this->request->data['photo'];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,162,76); 
			$this->request->data['photo']=$resultval;}
			
            
			//print_r($this->request->data);
			
			$location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                $this->Flash->success('The location has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The location could not be saved. Please, try again.');
            }
        }
        $this->set(compact('location'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
           
			$location = $this->Locations->patchEntity($location, $this->request->data);
			$errors=$location->errors();
			//print_r($errors); exit;
			
			$destinationorig  = realpath('../webroot/img/location/orig/') . '/';
	        $destinationthumb = '';
			$resultval="" ;
			if($this->request->data['photonew']['size']!=0  and empty($errors)){
			@unlink($destinationorig.$this->request->data['photo']);
			$file = $this->request->data['photonew'];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,162,76); 
			$this->request->data['photo']=$resultval;}
			 $location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                $this->Flash->success('The location has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The location could not be saved. Please, try again.');
            }
        }
        $this->set(compact('location'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Locations->get($id);
		$destinationorig = realpath('../webroot/img/location/orig/') . '/';

		
        if ($this->Locations->delete($location)) {
		if(@file_exists($destinationorig.$location['photo'])){
		@unlink($destinationorig.$location['photo']);
		}
		
            $this->Flash->success('The location has been deleted.');
        } else {
            $this->Flash->error('The location could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
