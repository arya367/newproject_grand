<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 */
class BlogsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Authors'],
			'order'=>['id'=>'desc']
        ];
        $this->set('blogs', $this->paginate($this->Blogs));
        $this->set('_serialize', ['blogs']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => ['Authors', 'TagRelations']
        ]);
        $this->set('blog', $blog);
        $this->set('_serialize', ['blog']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blog = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
           
			
			$this->loadComponent('Upload');
			$destinationorig  = realpath('../webroot/img/blogs/orig/') . '/';
			$destinationthumb = realpath('../webroot/img/blogs/') . '/';
			$resultval="" ;
			$file = $this->request->data['image'];
			if($file['name']!=""){ 
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,275,320); }
			$this->request->data['image']=$resultval;
			
			 $blog = $this->Blogs->patchEntity($blog, $this->request->data);
			
            if ($this->Blogs->save($blog)) {
                $this->Flash->success('The blog has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blog could not be saved. Please, try again.');
            }
        }
        $authors = $this->Blogs->Authors->find('list', ['limit' => 200]);
        $this->set(compact('blog', 'authors'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$this->loadComponent('Upload');
			$destinationorig  = realpath('../webroot/img/blogs/orig/') . '/';
			$destinationthumb = realpath('../webroot/img/blogs/') . '/';
			$resultval="" ;
			if($this->request->data['imagenew']['size']!=0){
			@unlink($destinationorig.$this->request->data['image']);
			//@unlink($destinationthumb.$this->request->data['image']);
			$file = $this->request->data['imagenew'];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,800,320); 
			$this->request->data['image']=$resultval;}
			
			
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);
            if ($this->Blogs->save($blog)) {
                $this->Flash->success('The blog has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blog could not be saved. Please, try again.');
				return $this->redirect(['action' => 'edit',$id]);
            }
        }
		
        $authors = $this->Blogs->Authors->find('list', ['limit' => 200]);
        $this->set(compact('blog', 'authors'));
        $this->set('_serialize', ['blog']);
    }
	
	public function uploadImage($id) {
		
 $this->layout='ajax';
 $blog = $this->Blogs->get($id, ['contain' => [],'fields'=>['more_images','id']]);		
 if ($this->request->is(['patch', 'post', 'put'])) {
 $origpath  = realpath('../webroot/img/blogs/') . '/';
 $thumbpath = "";
 $resultimage='';


if(isset($this->request->data['image']) and $this->request->data['image'][0]!=0){ 
 
$this->loadComponent('Upload');
			for($i=0;$i<count($_FILES['image']['name']);$i++){
			$overimage_name=$_FILES['image']['name'][$i];
			$overimage_source =$_FILES['image']['tmp_name'][$i];
			$overimage_type=$_FILES['image']['type'][$i];
			$resultval = $this->Upload->uploadMultipleImg($overimage_name,$overimage_source,$origpath,$thumbpath,159,130); 
			$resultimage.="##".$resultval;
			}
			 $this->request->data['more_images']=$this->request->data['more_images'].$resultimage; 
			 //$blog->more_images= $resultimage;
			 $blog = $this->Blogs->patchEntity($blog, $this->request->data);
         
	         if ($this->Blogs->save($blog)) {
            // Set a session flash message and redirect.
            $this->Flash->success('Image Saved!');
			 $this->redirect(['action' => 'uploadImage', $id]);
        }
		else {
			
			$this->Flash->error('Image not Saved.Pleas try again!');
             $this->redirect(['action' => 'uploadImage', $id]);
			
			}
			
	}
	else {
			
			$this->Flash->error('Image not Saved.Pleas try again!');
            return $this->redirect(['action' => 'uploadImage', $id]);
			
			}
			        
	
			
	}
	$this->set(compact('blog'));
	$this->set('_serialize', ['blog']);

    
	}

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success('The blog has been deleted.');
        } else {
            $this->Flash->error('The blog could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
