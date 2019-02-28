<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PropertyGalleries Controller
 *
 * @property \App\Model\Table\PropertyGalleriesTable $PropertyGalleries
 */
class PropertyGalleriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    { 
	
	$condition=array();
       
		if(isset($_REQUEST['pid']) and $_REQUEST['pid']!='') 
		{
			$condition['property_id']=$_REQUEST['pid'];
			
			
			}
		if(isset($_REQUEST['type']) and $_REQUEST['type']!='') 
		{
			$condition['type']=$_REQUEST['type'];
			
			}
				
		
		/*$this->paginate = [
            'contain' => ['Properties'],
        ];*/
		
		//debug($this->PropertyGalleries->find()->where($condition));
		//exit;
		//$this->paginate($this->PropertyGalleries->find()->where($condition))
		
        $this->set('propertyGalleries', $this->paginate($this->PropertyGalleries->find()->where($condition)));
        $this->set('_serialize', ['propertyGalleries']);
    }

    /**
     * View method
     *
     * @param string|null $id Property Gallery id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyGallery = $this->PropertyGalleries->get($id, [
            'contain' => ['Properties']
        ]);
        $this->set('propertyGallery', $propertyGallery);
        $this->set('_serialize', ['propertyGallery']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
        if ($this->request->is('post')) {
		 $this->loadComponent('Upload');
		 
		 	
		$origpath  = realpath('../webroot/img/property/gallery/orig/') . '/';
	    $thumbpath = realpath('../webroot/img/property/gallery/thumb/') . '/';
		
		
		if(isset($_FILES['image']['name']) and $_FILES['image']['size'][0]!=0){
			for($i=0;$i<count($_FILES['image']['name']);$i++){
			 $propertyGallery = $this->PropertyGalleries->newEntity();
			$overimage_name=$_FILES['image']['name'][$i];
			$overimage_source =$_FILES['image']['tmp_name'][$i];
			$overimage_type=$_FILES['image']['type'][$i];
			$resultval = $this->Upload->uploadMultipleImg($overimage_name,$overimage_source,$origpath,$thumbpath,159,130); 
			$this->request->data['image']=$resultval;
			$this->request->data['created']=date('Y-m-d');
			$propertyGallery = $this->PropertyGalleries->patchEntity($propertyGallery, $this->request->data);
			$this->PropertyGalleries->save($propertyGallery);
			}
			   $this->Flash->success('The property gallery has been saved.');
               return $this->redirect(['action' => 'index']);
			
			}
             else {
                $this->Flash->error('The property gallery could not be saved. Please, try again.');
            }
        }
		$propertyGallery = $this->PropertyGalleries->newEntity();
        //$properties = $this->PropertyGalleries->Properties->find('list');
        $this->set(compact('propertyGallery'));
        $this->set('_serialize', ['propertyGallery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Gallery id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyGallery = $this->PropertyGalleries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$this->loadComponent('Upload');
			$origpath  = realpath('../webroot/img/property/gallery/orig/') . '/';
	        $thumbpath = realpath('../webroot/img/property/gallery/thumb/') . '/';
			$resultval="" ;
			if($this->request->data['photonew']['size']!=0){
			@unlink($origpath.$this->request->data['image']);
			@unlink($thumbpath.$this->request->data['image']);
			$file = $this->request->data['photonew'];
			$resultval = $this->Upload->uploadimg($file,$origpath,$thumbpath,159,130); 
			$this->request->data['image']=$resultval;
			}
			
            $propertyGallery = $this->PropertyGalleries->patchEntity($propertyGallery, $this->request->data);
            if ($this->PropertyGalleries->save($propertyGallery)) {
                $this->Flash->success('The property gallery has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property gallery could not be saved. Please, try again.');
            }
        }
        $properties = $this->PropertyGalleries->Properties->find('list', ['limit' => 200]);
        $this->set(compact('propertyGallery', 'properties'));
        $this->set('_serialize', ['propertyGallery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Gallery id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyGallery = $this->PropertyGalleries->get($id);
		
		$origpath  = realpath('../webroot/img/property/gallery/orig/') . '/';
	    $thumbpath = realpath('../webroot/img/property/gallery/thumb/') . '/';
		if(@file_exists($origpath.$propertyGallery['image'])){
		@unlink($origpath.$propertyGallery['image']);
		@unlink($thumbpath.$propertyGallery['image']);
		}
		
        if ($this->PropertyGalleries->delete($propertyGallery)) {
            $this->Flash->success('The property gallery has been deleted.');
        } else {
            $this->Flash->error('The property gallery could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function multidelete() {
		$this->autoRender = false;
		if(!empty($this->request->data['photo_multi_delete'])) {
		foreach ($this->request->data['photo_multi_delete'] as $key=>$value):
		$propertyGallery = $this->PropertyGalleries->get($value);

		$origpath  = realpath('../webroot/img/property/gallery/orig/') . '/';
	    $thumbpath = realpath('../webroot/img/property/gallery/thumb/') . '/';
		
		if(@file_exists($origpath.$propertyGallery['image'])){
		@unlink($origpath.$propertyGallery['image']);
		@unlink($thumbpath.$propertyGallery['image']);
		$this->PropertyGalleries->delete($propertyGallery);
		}
		endforeach;
		$this->Flash->success('The property gallery has been deleted.');
		$this->redirect($this->request->data['referer']);
		}
		else
		{
		$this->Flash->error('The property gallery could not be deleted. Please, try again.');
		$this->redirect($this->request->data['referer']);
		
		}
		}
}
