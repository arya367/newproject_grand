<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TagRelations Controller
 *
 * @property \App\Model\Table\TagRelationsTable $TagRelations
 */
class TagRelationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Blogs']
        ];
        $this->set('tagRelations', $this->paginate($this->TagRelations));
        $this->set('_serialize', ['tagRelations']);
    }

    /**
     * View method
     *
     * @param string|null $id Tag Relation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tagRelation = $this->TagRelations->get($id, [
            'contain' => ['Tags', 'Blogs']
        ]);
        $this->set('tagRelation', $tagRelation);
        $this->set('_serialize', ['tagRelation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tagRelation = $this->TagRelations->newEntity();
        if ($this->request->is('post')) {
            $tagRelation = $this->TagRelations->patchEntity($tagRelation, $this->request->data);
            if ($this->TagRelations->save($tagRelation)) {
                $this->Flash->success('The tag relation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tag relation could not be saved. Please, try again.');
            }
        }
        $tags = $this->TagRelations->Tags->find('list', ['limit' => 200]);
        $blogs = $this->TagRelations->Blogs->find('list', ['limit' => 200]);
        $this->set(compact('tagRelation', 'tags', 'blogs'));
        $this->set('_serialize', ['tagRelation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag Relation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tagRelation = $this->TagRelations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagRelation = $this->TagRelations->patchEntity($tagRelation, $this->request->data);
            if ($this->TagRelations->save($tagRelation)) {
                $this->Flash->success('The tag relation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The tag relation could not be saved. Please, try again.');
            }
        }
        $tags = $this->TagRelations->Tags->find('list', ['limit' => 200]);
        $blogs = $this->TagRelations->Blogs->find('list', ['limit' => 200]);
        $this->set(compact('tagRelation', 'tags', 'blogs'));
        $this->set('_serialize', ['tagRelation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag Relation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tagRelation = $this->TagRelations->get($id);
        if ($this->TagRelations->delete($tagRelation)) {
            $this->Flash->success('The tag relation has been deleted.');
        } else {
            $this->Flash->error('The tag relation could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
