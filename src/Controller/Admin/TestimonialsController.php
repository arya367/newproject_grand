<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 */
class TestimonialsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
       $this->set('testimonials', $this->paginate($this->Testimonials));
       $this->set('_serialize', ['testimonials']);
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
        $testimonial = $this->Testimonials->get($id, [
            'contain' => ['Testimonials', 'TagRelations']
        ]);
        $this->set('testimonial', $testimonial);
        $this->set('_serialize', ['testimonial']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testimonial = $this->Testimonials->newEntity();
        if ($this->request->is('post')) {
           
			
			$this->loadComponent('Upload');
			$destinationorig  = realpath('../webroot/img/blogs/orig/') . '/';
			$destinationthumb = realpath('../webroot/img/blogs/') . '/';
			$resultval="" ;
			$file = $this->request->data['image'];
			if($file['name']!=""){ 
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,157,102); }
			$this->request->data['image']=$resultval;
			
			 $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->data);
			
            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success('The blog has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The blog could not be saved. Please, try again.');
            }
        }
        //$authors = $this->Testimonials->Authors->find('list', ['limit' => 200]);
        //$this->set(compact('blog', 'authors'));
       // $this->set('_serialize', ['blog']);
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
        $testimonial = $this->Testimonials->get($id, [
            'contain' => []
			
        ]);
		//print_r($testimonial);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$this->loadComponent('Upload');
			$destinationorig  = realpath('../webroot/img/blogs/orig/') . '/';
			$destinationthumb = realpath('../webroot/img/blogs/') . '/';
			$resultval="" ;
			if($this->request->data['imagenew']['size']!=0){
			@unlink($destinationorig.$this->request->data['image']);
			//@unlink($destinationthumb.$this->request->data['image']);
			$file = $this->request->data['imagenew'];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,157,102); 
			$this->request->data['image']=$resultval;}
			
			
            $testimonial = $this->Testimonials->patchEntity($testimonial, $this->request->data);
            if ($this->Testimonials->save($testimonial)) {
                $this->Flash->success('The Testimonial has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The Testimonial could not be saved. Please, try again.');
				return $this->redirect(['action' => 'edit',$id]);
            }
        }
		
        $testimonials = $this->Testimonials->find('list', ['limit' => 200]);
        $this->set(compact('testimonial', 'testimonial'));
        $this->set('_serialize', ['testimonial']);
    }
	
	public function uploadImage($id) {
		
 $this->layout='ajax';
 $blog = $this->Testimonials->get($id, ['contain' => [],'fields'=>['more_images','id']]);		
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
			 $blog = $this->Testimonials->patchEntity($blog, $this->request->data);
         
	         if ($this->Testimonials->save($testimonial)) {
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
	$this->set(compact('testimonial'));
	$this->set('_serialize', ['testimonial']);

    
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
        $testimonial = $this->Testimonials->get($id);
        if ($this->Testimonials->delete($testimonial)) {
            $this->Flash->success('The blog has been deleted.');
        } else {
            $this->Flash->error('The blog could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
