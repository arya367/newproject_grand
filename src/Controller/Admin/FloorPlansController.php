<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * FloorPlans Controller
 *
 * @property \App\Model\Table\FloorPlansTable $FloorPlans
 */
class FloorPlansController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $pid='';
		if(isset($_REQUEST['pid']) and $_REQUEST['pid']!='') 
		{
			$pid=$_REQUEST['pid'];
			
			
			}
		
		if($pid!=''){ $this->paginate = [
            'contain' => ['Properties', 'FloorCategories', 'FloorSubcategories'],
			'conditions'=>['property_id'=>$_REQUEST['pid']],
			'order'=>['id'=>'desc']
        ]; } else { $this->paginate = [
            'contain' => ['Properties', 'FloorCategories'],
			'order'=>['id'=>'desc']
        ];}
		
        $this->set('floorPlans', $this->paginate($this->FloorPlans));
        $this->set('_serialize', ['floorPlans']);
    }

    /**
     * View method
     *
     * @param string|null $id Floor Plan id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $floorPlan = $this->FloorPlans->get($id, [
            'contain' => ['Properties', 'FloorCategories', 'FloorSubcategories']
        ]);
        $this->set('floorPlan', $floorPlan);
        $this->set('_serialize', ['floorPlan']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $floorPlan='';
          if ($this->request->is('post')) {
			$this->loadComponent('Upload');
			if(!empty($this->request->data['photo'])) {
			foreach( $this->request->data['photo'] as $key=>$value)
			{
			$floorPlan = $this->FloorPlans->newEntity();
			
			$destinationorig  = realpath('../webroot/img/property/floor/orig/') . '/';
			$destinationthumb = realpath('../webroot/img/property/floor/thumb/') . '/';
			$resultval="" ;
			$file = $this->request->data['photo'][$key];
			if($file['name']!=""){ 
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,200,230); 
			
			
		   $floorPlan->property_id = $this->request->data['property_id'];
		   $floorPlan->floor_category_id = $this->request->data['floor_category_id'];
		   $floorPlan->name = $this->request->data['name'][$key];
		   $floorPlan->photo = $resultval;
		   $floorPlan->carpet = $this->request->data['carpet'][$key];
		   $floorPlan->saleable = $this->request->data['saleable'][$key];
		   $floorPlan->balcony = $this->request->data['balcony'][$key];
		   $floorPlan->floor_subcategory_id = $this->request->data['floor_subcategory_id'];
		   $this->FloorPlans->save($floorPlan);
			}
			}
			}
			  $this->Flash->success('The floor plan has been saved.');
              return $this->redirect(['action' => 'index']);
               
				
        }
        $properties = $this->FloorPlans->Properties->find('list');
        $floorCategories = $this->FloorPlans->FloorCategories->find('list');
        $floorSubcategories = $this->FloorPlans->FloorSubcategories->find('list')->order(['id' => 'ASC']);
        $this->set(compact('floorPlan', 'properties', 'floorCategories', 'floorSubcategories'));
        $this->set('_serialize', ['floorPlan']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor Plan id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $floorPlan = $this->FloorPlans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$this->loadComponent('Upload');
			$destinationorig  = realpath('../webroot/img/property/floor/orig/') . '/';
	        $destinationthumb = realpath('../webroot/img/property/floor/thumb/') . '/';
			$resultval="" ;
			if($this->request->data['photonew']['size']!=0)
			{
			@unlink($destinationorig.$this->request->data['photo']);
			@unlink($destinationthumb.$this->request->data['photo']);
			$file = $this->request->data['photonew'];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,200,230); 
			$this->request->data['FloorPlan']['photo']=$resultval;
			$floorPlan->photo = $resultval;
			}
			
		   $floorPlan->property_id = $this->request->data['property_id'];
		   $floorPlan->floor_category_id = $this->request->data['floor_category_id'];
		   $floorPlan->name = $this->request->data['name'];
		   
		   $floorPlan->floor_subcategory_id = $this->request->data['floor_subcategory_id'];
			
            //$floorPlan = $this->FloorPlans->patchEntity($floorPlan, $this->request->data);
			
            if ($this->FloorPlans->save($floorPlan)) {
                $this->Flash->success('The floor plan has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The floor plan could not be saved. Please, try again.');
            }
        }
        $properties = $this->FloorPlans->Properties->find('list');
        $floorCategories = $this->FloorPlans->FloorCategories->find('list');
        $floorSubcategories = $this->FloorPlans->FloorSubcategories->find('list');
        $this->set(compact('floorPlan', 'properties', 'floorCategories', 'floorSubcategories'));
        $this->set('_serialize', ['floorPlan']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor Plan id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $floorPlan = $this->FloorPlans->get($id);
		
		
		$destinationorig = realpath('../webroot/img/property/floor/orig/') . '/';
		$destinationthumb = realpath('../webroot/img/property/floor/thumb/') . '/';
		
        if ($this->FloorPlans->delete($floorPlan)) {
			if(@file_exists($destinationorig.$floorPlan['photo'])){
		    @unlink($destinationorig.$floorPlan['photo']);
			@unlink($destinationthumb.$floorPlan['photo']);
			}
            $this->Flash->success('The floor plan has been deleted.');
        } else {
            $this->Flash->error('The floor plan could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function multidelete() {
		$this->autoRender = false;
		if(!empty($this->request->data['photo_multi_delete'])) {
		foreach ($this->request->data['photo_multi_delete'] as $key=>$value):
		
		$floorPlan = $this->FloorPlans->get($value);
		
		//$dataphoto = $this->FloorPlan->findById($this->FloorPlans->get($id));
		
		$origpath  = realpath('../webroot/img/property/floor/orig/') . '/';
	    $thumbpath = realpath('../webroot/img/property/floor/thumb/') . '/';
		$this->FloorPlans->delete($floorPlan);
		if(@file_exists($origpath.$floorPlan['photo'])){
		@unlink($origpath.$floorPlan['photo']);
		@unlink($thumbpath.$floorPlan['photo']);
		}
		endforeach;
		$this->Flash->success('The floor plan has been deleted.');
		$this->redirect($this->request['data']['referer']);
		}
		else
		{
		$this->Flash->error('The floor plan could not be deleted. Please, try again.');
		
		}
		}
		
	public function search($search=null) {
   
	$this->layout='ajax';
	
	$property=$this->FloorPlans->find()->select(['Properties.name','Properties.id','Properties.posted_date','Properties.status'])->where(['Properties.name like '=>'%'.$search.'%']);
	
	//debug($prop); exit;
	 $this->set(compact('property'));
	}
	
	
}
