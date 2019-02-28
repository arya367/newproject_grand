<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Authors Controller
 *
 * @property \App\Model\Table\AuthorsTable $Authors
 */
class AuthorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('authors', $this->paginate($this->Authors));
        $this->set('_serialize', ['authors']);
    }

    /**
     * View method
     *
     * @param string|null $id Author id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $author = $this->Authors->get($id, [
            'contain' => ['Blogs']
        ]);
        $this->set('author', $author);
        $this->set('_serialize', ['author']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {    
        $author = $this->Authors->newEntity();
        if ($this->request->is('post')) {
			
			$this->loadComponent('Upload');
           
			
			$destinationorig = realpath('../webroot/img/author/orig/') . '/';
	        $destinationthumb =realpath('../webroot/img/author/thumb/') . '/';
			$resultval="" ;
			$file = $this->request->data['photo'];
			if($file['name']!=""){ 
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,162,76); }
			$this->request->data['photo']=$resultval;
			 $author = $this->Authors->patchEntity($author, $this->request->data);
            if ($this->Authors->save($author)) {
                $this->Flash->success('The author has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The author could not be saved. Please, try again.');
            }
        }
        $this->set(compact('author'));
        $this->set('_serialize', ['author']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Author id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $author = $this->Authors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			$this->loadComponent('Upload');
			
			$destinationorig  = realpath('../webroot/img/author/orig/') . '/';
	        $destinationthumb = realpath('../webroot/img/author/thumb/') . '/';
			$resultval="" ;
			if($this->request->data['photonew']['size']!=0){
			@unlink($destinationorig.$this->request->data['photo']);
			@unlink($destinationthumb.$this->request->data['photo']);
			$file = $this->request->data['photonew'];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,162,76); 
			$this->request->data['photo']=$resultval;}
			
            $author = $this->Authors->patchEntity($author, $this->request->data);
            if ($this->Authors->save($author)) {
                $this->Flash->success('The author has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The author could not be saved. Please, try again.');
            }
        }
        $this->set(compact('author'));
        $this->set('_serialize', ['author']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Author id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $author = $this->Authors->get($id);
        if ($this->Authors->delete($author)) {
            $this->Flash->success('The author has been deleted.');
        } else {
            $this->Flash->error('The author could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
